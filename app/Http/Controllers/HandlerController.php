<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Traits\ResponseTrait;
class HandlerController extends Controller
{
    use ResponseTrait;

    public function cardIdentifier()
    {
        return $this->handleResponse(Http::sap()->get('/zapis/ZAPI_PLACAS?sap-client=400'));
    }

    public function costCenter(Request $request)
    {
        $request->validate([
            'sociedad' => 'required|string|max:5',
        ]);

        $response = $this->handleResponse(Http::sap()->get('/zapis/zapi_cebe?sap-client=400&P_SOC=' . $request->sociedad));

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

    public function historic(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'cliente' => 'required|numeric',
        ]);

        return $this->handleResponse(Http::sap()->get("/ZAPIS/ZHISTORICOSAP?ORG=2000&FECHA={$request->fecha}&CLIENTE={$request->cliente}"));
    }

}
