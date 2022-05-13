<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandlerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/placas',  [HandlerController::class, 'cardIdentifier']);
Route::get('/centros',  [HandlerController::class, 'costCenter']);
Route::get('/creditos',  [HandlerController::class, 'credits']);
Route::get('/productos',  [HandlerController::class, 'products']);
Route::get('/precios',  [HandlerController::class, 'prices']);
Route::get('/clientes',  [HandlerController::class, 'clients']);
Route::get('/stock',  [HandlerController::class, 'stock']);
Route::get('/documentos',  [HandlerController::class, 'documentStatus']);
