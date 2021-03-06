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
    return view('welcome');
});
//Aula 24
Route::get('/nome', 'MeuControlador@getNome');

//Aula 25
Route::get('/idade', 'MeuControlador@getIdade');

Route::get('/multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');

Route::get('/nomes/{id}', 'MeuControlador@getNomeByID');

//Aula 26

Route::resource('/cliente', 'ClienteControlador');

//Aula 27

Route::post('cliente/requisitar', 'ClienteControlador@requisitar');
