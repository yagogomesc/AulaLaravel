<?php

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
    return view('index');
});

//Rotas categorias
Route::get('/categorias', 'ControllerCategoria@index');

Route::get('/categorias/novo', 'ControllerCategoria@create');

Route::post('/categorias', 'ControllerCategoria@store');

Route::get('/categorias/editar/{id}', 'ControllerCategoria@edit');

Route::get('/categorias/apagar/{id}', 'ControllerCategoria@destroy');

Route::post('/categorias/{id}', 'ControllerCategoria@update');

//Rotas Produtos
Route::get('/produtos', 'ControllerProduto@indexView');

Route::get('/produtos/novo', 'ControllerProduto@create');

Route::post('/produtos', 'ControllerProduto@store');
