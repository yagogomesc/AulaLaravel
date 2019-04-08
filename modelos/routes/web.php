<?php

use App\Categoria;

Route::get('/', function () {
    $categorias = Categoria::all();
    foreach($categorias as $c){
        echo "id: " . $c->id.", ";
        echo "nome: " . $c->nome."<br>";
    }
});
//Aula 65
Route::get('/inserir/{nome}', function($nome){
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();
    return redirect('/');
});
//aula 66
Route::get('/categoria/{id}', function($id){
    $cat = Categoria::findOrFail($id);
    if(isset($cat)):
      echo "id: " . $cat->id.", ";
      echo "nome: " . $cat->nome."<br>";
    else:
      echo "<h1>Categoria não encontrada</h1>";
    endif;
    //return redirect('/');
});
