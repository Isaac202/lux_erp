<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Controllers
use App\Http\Controllers\ApiClientsController;


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
Route::post('/clientes/cadastrar', [ApiClientsController::class,'create']); 
Route::get('/clientes/listar', [ApiClientsController::class,'readall']);
Route::get('/clientes/cliente/{id}', [ApiClientsController::class,'readonly']);
Route::post('/clientes/atualizar', [ApiClientsController::class,'update']);
Route::post('/clientes/excluir', [ApiClientsController::class,'delete']);
Route::post('/clientes/apagar', [ApiClientsController::class,'falsedelete']);