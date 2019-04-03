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

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});
//Aula 55
Route::get('categorias', function(){
    $cats = DB::table('categorias')->get();

    foreach($cats as $c){

      echo "Id: " . $c->id . "; ";
      echo "Nome: ". $c->nome . "<br/>";

    }
    echo "<hr>";

    $nomes = DB::table('categorias')->pluck('nome');
    foreach($nomes as $nome){
      echo "$nome <br>";
    }
    echo "<hr>";

    $cats = DB::table('categorias')->where('id', 3)->get();

    foreach($cats as $c){

      echo "Id: " . $c->id . "; ";
      echo "Nome: ". $c->nome . "<br/>";

    }

    echo "<hr>";

    $cat = DB::table('categorias')->where('id', 2)->first();

      echo "Id: " . $cat->id . "; ";
      echo "Nome: ". $cat->nome . "<br/>";
//Aula 57
    echo "<p>Retorna um array utilizando like</p>";

    $cats = DB::table('categorias')->where('nome', 'like', 'p%')->get();

    foreach($cats as $cat){

      echo "Id: " . $cat->id . "; ";
      echo "Nome: ". $cat->nome . "<br/>";

    }

    echo "<p>Sentenças Logicas</p>";

    $cats = DB::table('categorias')->where('id', 1)->orWhere('id', 2)->get();

    foreach($cats as $cat){

      echo "Id: " . $cat->id . "; ";
      echo "Nome: ". $cat->nome . "<br/>";

    }

    echo "<p>Intervalos</p>";

    $cats = DB::table('categorias')->whereBetween('id', [1, 2])->get();

    foreach($cats as $cat){

      echo "Id: " . $cat->id . "; ";
      echo "Nome: ". $cat->nome . "<br/>";

    }

    echo "<p>Intervalos</p>";

    $cats = DB::table('categorias')->whereNotBetween('id', [1, 2])->get();

    foreach($cats as $cat){

      echo "Id: " . $cat->id . "; ";
      echo "Nome: ". $cat->nome . "<br/>";

    }

    echo "<p>Conjuntos</p>";

    $cats = DB::table('categorias')->whereIn('id', [1, 3, 4])->get();

    foreach($cats as $cat){

      echo "Id: " . $cat->id . "; ";
      echo "Nome: ". $cat->nome . "<br/>";

    }

    echo "<p>Intervalos</p>";

    $cats = DB::table('categorias')->whereNotIn('id', [1, 3, 4])->get();

    foreach($cats as $cat){

      echo "Id: " . $cat->id . "; ";
      echo "Nome: ". $cat->nome . "<br/>";

    }

    echo "<p>Sentenças Logicas</p>";

    $cats = DB::table('categorias')->where([
        ['id', 1],
        ['nome', 'roupa']
      ])->get();

    foreach($cats as $cat){

      echo "Id: " . $cat->id . "; ";
      echo "Nome: ". $cat->nome . "<br/>";

    }

    echo "<p>Ordenando por nome</p>";

    $cats = DB::table('categorias')->OrderBy('nome')->get();

    foreach($cats as $cat){

      echo "Id: " . $cat->id . "; ";
      echo "Nome: ". $cat->nome . "<br/>";

    }

    echo "<p>Ordenando por nome decrescente</p>";

    $cats = DB::table('categorias')->OrderBy('nome', 'desc')->get();

    foreach($cats as $cat){

      echo "Id: " . $cat->id . "; ";
      echo "Nome: ". $cat->nome . "<br/>";

    }

});
