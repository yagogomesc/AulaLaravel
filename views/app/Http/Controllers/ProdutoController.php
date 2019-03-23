<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar(){

      $produtos = [
          "Notebook Asus i7",
          "Mouse e teclado Microsoft",
          "Monitor 21 - Samsung",
          "Impressora HP",
          "Disco SSD 512 GB"
      ];
      
      return view('produtos', compact('produtos'));

    }
}
