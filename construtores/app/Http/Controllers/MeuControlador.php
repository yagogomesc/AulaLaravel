<?php
//Aula 24
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function getNome(){

      return "Jose da Silva";

    }

    public function getIdade(){

      return "25 anos";

    }

    public function multiplicar($n1, $n2){

        return $n1*$n2;

    }

    public function getNomeByID($id){
      $v = ["Mario", "Edson", "Roberto", "Jean"];


    }
}
