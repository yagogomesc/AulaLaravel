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

use Illuminate\Http\Request;

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

Route::redirect('/aqui', '/ola', 301);

Route::view('/hello', 'hello');
//Aula 16
Route::view('/viewnome', 'hellonome',
            ['nome' =>'Yago', 'sobrenome'=>'Gomes']);

Route::get('/hellonome/{nome}/{sobrenome}', function($nome, $sn){
      return view('hellonome',
                  ['nome' => $nome,
                  'sobrenome'=> $sn]);
});

//Aula 17

//Aula 18 - rest client

Route::get('/rest/hello', function(){
    return "Hello (GET)";
});

Route::post('/rest/hello', function(){
    return "Hello (POST)";
});

Route::delete('/rest/hello', function(){
    return "Hello (DELETE)";
});

Route::put('/rest/hello', function(){
    return "Hello (PUT)";
});

Route::patch('/rest/hello', function(){
    return "Hello (PATCH)";
});

Route::options('/rest/hello', function(){
    return "Hello (OPTIONS)";
});

//Aula 19

Route::post('/rest/imprimir', function(Request $req){
  $nome = $req->input('nome');
  $idade = $req->input('idade');
    return "Hello $nome ($idade)!! (POST)";
});
