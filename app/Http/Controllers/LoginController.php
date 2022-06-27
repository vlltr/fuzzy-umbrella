<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Traits\ResponseTrait;


class LoginController extends Controller
{
    use ResponseTrait;

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $response = Http::post(config('services.security.url') . 'credentials', [
            "usuario" => $request->username,
            "password" => $request->password,
        ]);

        return $this->handleResponse($response);
    }
}
