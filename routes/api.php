<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandlerController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(HandlerController::class)->group(function () {
    Route::get('/placas', 'cardIdentifier');
    Route::get('/centros', 'costCenter');
    Route::get('/historico', 'historic');

    Route::middleware(['validate.token'])->group(function () {
        Route::get('/creditos', 'credits');
        Route::get('/productos', 'products');
        Route::get('/precios', 'prices');
        Route::get('/clientes', 'clients');
        Route::get('/stock', 'stock');
        Route::get('/documentos', 'documentStatus');
    });
});

Route::post('login', [LoginController::class, 'login']);
