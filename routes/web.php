<?php

use Illuminate\Support\Facades\Route;


//Controllers
use App\Http\Controllers\ClientsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');

// });
Route::get('/clientes/cadastrar', [ClientsController::class,'index']);//->name('clientes.cadastrar');
Route::post('/clientes/save', 'ClientsController@cadastrar');//->name('clientes.save');
Route::get('/clientes/todos', [ClientsController::class,'lista']);//->name('clientes.todos');
Route::post('/cliente/editar', 'ClientsController@editar');//->name('clientes.editar');
Route::post('/cliente/saveeditar', 'ClientsController@saveEditar');//->name('clientes.saveEdit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
