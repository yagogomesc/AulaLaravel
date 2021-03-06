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
});
//Aula 67
Route::get('/atualizar/{id}/{nome}', function($id, $nome){
    $cat = Categoria::find($id);
    if(isset($cat)):
      $cat->nome = $nome;
      $cat->save();
      return redirect('/');
    else:
      echo "<h1>Categoria não encontrada</h1>";
    endif;
    //return redirect('/');
});

Route::get('/remover/{id}', function($id){
    $cat = Categoria::find($id);
    if(isset($cat)):
      $cat->delete();
      return redirect('/');
    else:
      echo "<h1>Categoria não encontrada</h1>";
    endif;
    //return redirect('/');
});
//Aula 68
Route::get('/categoriapornome/{nome}', function($nome){
    $categorias = Categoria::where('nome', $nome)->get();
    foreach($categorias as $c):
      echo "id: " . $c->id . ", " ;
      echo "nome: " . $c->nome . "<br>";
    endforeach;
});

Route::get('/categoriaidmaiorque/{id}', function($id){
    $categorias = Categoria::where('id', '>=', $id)->get();
    foreach($categorias as $c):
      echo "id: " . $c->id . ", " ;
      echo "nome: " . $c->nome . "<br>";
    endforeach;

    $count = Categoria::where('id', '>=',$id)->count();
    echo "<h1>Count: $count</h1>";
    $max = Categoria::where('id', '>=',$id)->max('id');
    echo "<h1>Count: $max</h1>";
});

Route::get('/ids123', function(){
    $categorias = Categoria::find([1,2,3]);
    foreach($categorias as $c):
      echo "id: " . $c->id . ", " ;
      echo "nome: " . $c->nome . "<br>";
    endforeach;
});

Route::get('/todas', function () {
    $categorias = Categoria::withTrashed()->get();
    foreach($categorias as $c){
        echo "id: " . $c->id.", ";
        echo "nome: " . $c->nome;
        if($c->trashed()):
          echo '(apagado)<br>';
        else:
          echo '<br>';
        endif;
    }
});

Route::get('/ver/{id}', function($id){
    //$cat = Categoria::withTrashed()->find($id);
    $cat = Categoria::withTrashed()->where('id', $id)->get()->first();
    if(isset($cat)):
      echo "id: " . $cat->id.", ";
      echo "nome: " . $cat->nome."<br>";
    else:
      echo "<h1>Categoria não encontrada</h1>";
    endif;
});

Route::get('/somenteapagadas', function () {
    $categorias = Categoria::onlyTrashed()->get();
    foreach($categorias as $c){
        echo "id: " . $c->id.", ";
        echo "nome: " . $c->nome;
        if($c->trashed()):
          echo '(apagado)<br>';
        else:
          echo '<br>';
        endif;
    }
});
//Aula 72 - Restaurando soft deletes
Route::get('/restaurar/{id}', function($id){
    $cat = Categoria::withTrashed()->find($id);
    if(isset($cat)):
      $cat->restore();
      echo "Categoria Restaurada: " . $cat->id.", ";
      echo "<a href=\"/\">Listar todas</a>";
    else:
      echo "<h1>Categoria não encontrada</h1>";
    endif;
});
//Aula 73 - apagar permanente
Route::get('/apagarpermanente/{id}', function($id){
    $cat = Categoria::withTrashed()->find($id);
    if(isset($cat)):
      $cat->forceDelete();
      return redirect('/todas');
    else:
      echo "<h1>Categoria não encontrada</h1>";
    endif;
});
