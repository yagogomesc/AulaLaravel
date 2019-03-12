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

Route::get('/nome/{nome}/{sobrenome}', function($nome, $sn){
    return "<h1>Ola $nome $sn!</h1>";
});

Route::get('/repetir/{nome}/{n}', function ($nome, $n){
  for($i=0; $i<$n; $i++){
      echo "<h1>Ola, $nome!</h1>";
  }
});

Route::get('/nomecomregra/{nome}/{n}', function($nome, $n){
  for($i=0; $i<$n; $i++){
      echo "<h1>Ola, $nome!</h1>";
  }
})->where('n', '[0-9]+');
