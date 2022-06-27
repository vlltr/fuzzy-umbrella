<?php

namespace App\Traits;

trait ResponseTrait
{
    /**
     * Get the response code and body.
     *
     * @param  \Illuminate\Http\Client\Response $response
     * @return \Illuminate\Http\Client\Response $response
     */
    public function handleResponse($response)
    {
        switch ($response->status()) {
            case 401:
                return response()->json(['message' => 'Unauthorized'], 401);
                break;

            case 200:
                return $response;
                break;

            case 404:
                return response()->json(['message' => 'Data Not Found'], 404);
                break;

            case 500:
                return response()->json([
                    'message' => 'Client Error Server',
                ], 500);
                break;
            default:
                return response()->json($response->json(), $response->status());
        }
    }
}
