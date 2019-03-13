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
      echo "<h1>Ola, $nome! ($i)</h1>";
  }
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/nomesemregra/{nome?}', function($nome=null){
  if(isset($nome)){
      echo "<h1>Ola, $nome!</h1>";
  }else{
    echo "Você não passou um nome!";
  }
});

//Coloca as rotas dentro de app, organizando de forma hierarquica as paginas dentro de uma principal
Route::prefix('app')->group(function(){

    Route::get("/", function(){
        return "Pagina principal do app";
    });
    Route::get("profile", function(){
        return "Pagina profile";
    });
    Route::get("about", function(){
        return "Meu about";
    });


});
