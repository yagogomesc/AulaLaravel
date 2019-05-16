<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
          ['nome' => 'Camiseta Polo', 'preco' => 100,
            'estoque' => 4, 'categoria_id' => 1]);
        DB::table('produtos')->insert(
          ['nome' => 'Calça Jeans', 'preco' => 120,
            'estoque' => 1, 'categoria_id' => 1]);
        DB::table('produtos')->insert(
          ['nome' => 'Camiseta Manga Longa', 'preco' => 34,
            'estoque' => 2, 'categoria_id' => 1]);
        DB::table('produtos')->insert(
          ['nome' => 'PC games', 'preco' => 56,
            'estoque' => 5, 'categoria_id' => 2]);
        DB::table('produtos')->insert(
          ['nome' => 'Impressora', 'preco' => 72,
            'estoque' => 4, 'categoria_id' => 6]);
        DB::table('produtos')->insert(
          ['nome' => 'Guarda Roupa', 'preco' => 500,
            'estoque' => 10, 'categoria_id' => 4]);
    }
}
