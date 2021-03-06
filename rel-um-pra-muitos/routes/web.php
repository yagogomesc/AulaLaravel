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

use App\Produto;
use App\Categoria;

Route::get('/categorias', function () {
    $cat = Categoria::all();

    foreach($cat as $c){

        echo "<p>" . $c->id . " - " . $c->nome . "</p>";

    }
});

Route::get('/produtos', function () {
    $prod = Produto::all();

    echo "<table>";
    echo "<thead><tr><td>Nome</td>
    <td>Estoque</td>
    <td>Preco</td>
    <td>Categoria</td></tr></thead>";

    foreach($prod as $p){
        echo "<tr>";
        echo "<td>" . $p->nome . "</td>";
        echo "<td>" . $p->estoque . "</td>";
        echo "<td>" . $p->preco . "</td>";
        echo "<td>" . $p->categoria->nome . "</td>";
        echo "</tr>";

    }
});

Route::get('/categoriasprodutos', function () {
    $cat = Categoria::all();

    foreach($cat as $c){

        echo "<p>" . $c->id . " - " . $c->nome . "</p>";
        $produtos = $c->produtos;
        if(count($produtos) > 0){
          echo "<ul>";
          foreach ($produtos as $p){
              echo "<li>" . $p->nome . "</li>";
          }
          echo "</ul>";
        }

    }
});

Route::get('/categoriasprodutos/json', function () {
    $cats = Categoria::with('produtos')->get();

    return $cats->toJson();
});

Route::get('/adicionarproduto', function(){

    $cat = Categoria::find(1);

    $p = new Produto();
    $p->nome = "Meu novo produto";
    $p->estoque = 50;
    $p->preco = 300;
    $p->categoria()->associate($cat);
    $p->save();

    return $p->toJson();

});

Route::get('/removercat', function(){

    $p = Produto::find(7);
    $p->categoria()->dissociate();
    $p->save();

    return $p->toJson();

});

Route::get('/adicionarproduto/{catid}', function($catid){

    $cat = Categoria::with('produtos')->find($catid);

    $p = new Produto();
    $p->nome = "Meu novo produto louco";
    $p->estoque = 20;
    $p->preco = 500;

    if(isset($cat)){
        $cat->produtos()->save($p);
    }

    $cat->load('produtos');

    return $cat->toJson();

});
