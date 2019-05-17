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
