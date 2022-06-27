<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ValidateToken
{
    /**
     * Validate Token to Api security
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        
        if (!$token) {
            abort(401, "Token no found");
        }

        $response = Http::withToken($token)->get(config('services.security.url') . 'data');

        if ($response->status() === 404) {
            abort(404, "check api connection");
        }

        if ($response->status() >= 500) {
            abort(500, "Server Error");
        }

        if (!$response->successful()) {
            abort(401, "Unauthorized");
        }

        return $next($request);
    }
}
