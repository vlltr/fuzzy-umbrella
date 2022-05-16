<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HandlerController extends Controller
{
    public function handleSAPResponse($response)
    {
        switch ($response->status()) {
            case 401:
                return response()->json(['message' => 'Unauthorized'], 401);
                break;

            case 200:
                return $response;
                break;

            case 500:
                return response()->json([
                    'message' => 'Client Error Server',
                ], 500);
                break;
        }
    }
    public function cardIdentifier()
    {
        return $this->handleSAPResponse(Http::sap()->get('/zapis/ZAPI_PLACAS?sap-client=400'));
    }

    public function costCenter(Request $request)
    {
        $request->validate([
            'sociedad' => 'required|string|max:5',
        ]);

        $response = $this->handleSAPResponse(Http::sap()->get('/zapis/zapi_cebe?sap-client=400&P_SOC=' . $request->sociedad));
        
        return $response->collect()->isEmpty() ? response()->json([], 204) : $response->collect();
    }

    public function credits()
    {
        return Http::sap()->get('/ZWS_ECOM/ZCREDITOS');
    }

    public function products()
    {
        return Http::sap()->get('/ZWS_ECOM/ZPRODUCTOS');
    }

    public function prices()
    {
        return Http::sap()->get('/ZWS_ECOM/ZPRECIOS');
    }

    public function clients()
    {
        return Http::sap()->get('/ZWS_ECOM/ZCLIENTES');
    }

    public function stock()
    {
        return Http::sap()->get('/ZWS_ECOM/ZSTOCK');
    }

    public function documentStatus()
    {
        return Http::sap()->get('/ZWS_ECOM/ZESTADOCU');
    }
}
