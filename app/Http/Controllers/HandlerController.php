<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HandlerController extends Controller
{
    public function cardIdentifier(){
        return Http::sap()->get('/zapis/ZAPI_PLACAS?sap-client=400');
    }

    public function costCenter(Request $request){
        return Http::sap()->get('/zapis/zapi_cebe?sap-client=400&P_SOC='. $request->sociedad);
    }

    public function credits(){
        return Http::sap()->get('/ZWS_ECOM/ZCREDITOS');
    }

    public function products(){
        return Http::sap()->get('/ZWS_ECOM/ZPRODUCTOS');
    }

    public function prices(){
        return Http::sap()->get('/ZWS_ECOM/ZPRECIOS');
    }

    public function clients(){
        return Http::sap()->get('/ZWS_ECOM/ZCLIENTES');
    }

    public function stock(){
        return Http::sap()->get('/ZWS_ECOM/ZSTOCK');
    }

    public function documentStatus(){
        return Http::sap()->get('/ZWS_ECOM/ZESTADOCU');
    }
}
