@extends('layout.app', ["current" => "produtos"])

@section('body')

<div class="card border">
  <div class="card-body">
    <form action="/AulaLaravel/cadastro/public/produtos" method="POST">
      @csrf
        <div class="form-group">
          <label for="nomeProduto">Nome do produto</label>
            <input type="text" name="nomeProduto" id="nomeProduto" class="form-control" placeholder="Produto">
        </div>
        <div class="form-group">
          <label for="estoqueProduto">Estoque</label>
            <input type="text" name="estoqueProduto" id="estoqueProduto" class="form-control" placeholder="Estoque">
        </div>
        <div class="form-group">
          <label for="precoProduto">Valor</label>
            <input type="text" name="precoProduto" id="precoProduto" class="form-control" placeholder="Preço">
        </div>
        <div class="form-group">
          <label for="categoriaProduto">Categoria</label>
          <select class="form-control" name="categoriaProduto" id="categoriaProduto">
            <option selected></option>
            @foreach($cats as $cat)
              <option value="{{$cat->id}}">{{$cat->nome}}</option>
            @endforeach
          </select>
        </div>


      <button class="btn btn-primary btn-sm" type="submit">Salvar</button>
      <button class="btn btn-danger btn-sm" type="reset">Cancelar</button>
    </form>
  </div>
</div>

@endsection
