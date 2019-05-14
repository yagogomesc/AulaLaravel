<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;

class ControllerProduto extends Controller
{

    public function indexView()
    {
        return view('produtos.produtos');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produto::all();
        return $products->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categoria::all();
        return view('produtos.novoproduto', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Produto();
        $product->nome = $request->input('nomeProduto');
        $product->estoque = $request->input('estoqueProduto');
        $product->preco = $request->input('precoProduto');
        $product->categoria_id = $request->input('categoriaProduto');
        $product->save();
        return json_encode($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $prod = Produto::find($id);
      if(isset($prod)):
          return json_encode($prod);
      endif;
      return response('Produto não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Produto::find($id);
        if(isset($prod)):
            $product->nome = $request->input('nomeProduto');
            $product->estoque = $request->input('estoqueProduto');
            $product->preco = $request->input('precoProduto');
            $product->categoria_id = $request->input('categoriaProduto');
            $product->save();
            return json_encode($prod);
        endif;
        return response('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Produto::find($id);
        if(isset($prod)):
          $prod->delete();
          return response('OK', 200);
        endif;
        return response('Produto não encontrado', 404);
    }
}
