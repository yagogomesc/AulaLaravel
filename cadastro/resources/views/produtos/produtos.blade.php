@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
      <div class="card-body">
        <h5 class="card-title">Produtos</h5>
@if(count($products) > 0)
        <table class="table table-ordered table-hover">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nome do produto</th>
              <th>Estoque</th>
              <th>Preço</th>
              <th>Categoria</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
              <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->nome}}</td>
                <td>{{$product->estoque}}</td>
                <td>{{$product->preco}}</td>
                <td>{{$product->categoria_id}}</td>
                <td>
                  <a href="/AulaLaravel/cadastro/public/produtos/editar/{{$product->id}}" class="btn btn-primary btn-sm">
                    Editar
                  </a>
                  <a href="/AulaLaravel/cadastro/public/produtos/apagar/{{$product->id}}" class="btn btn-danger btn-sm">
                    Apagar
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
@endif
      </div>
      <div class="card-footer">
        <a href="/AulaLaravel/cadastro/public/produtos/novo" class="btn btn-primary btn-sm" role="button">Novo produto</a>
      </div>
    </div>
@endsection
