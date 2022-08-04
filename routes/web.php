<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AnimaisController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ARController;

use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('login');
});
Route::get('/logado', function () {
    return view('index');
});
Route::get('/mapa', function () {
    return view('mapa');
});


Route::resource('animais', AnimaisController::class);
Route::resource('clientes', ARController::class);
Route::resource('agenda', AgendaController::class);
