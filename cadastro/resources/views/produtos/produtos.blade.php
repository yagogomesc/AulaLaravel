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
        <button class="btn btn-primary btn-sm" role="button" onClick="novoProduto()">Novo produto</a>
      </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="form-horizontal" id="formProduto">
            <div class="modal-header">
              <h5 class="modal-title">Novo produto</h5>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id" class="form-control">
              <div class="form-group">
                <label for="nomeProduto" class="control-label">Nome do Produto</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="nomeProduto" placeholder="Nome do produto">
                </div>
              </div>

              <div class="form-group">
                <label for="precoProduto" class="control-label">Preço do Produto</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="precoProduto" placeholder="Preço do produto">
                </div>
              </div>

              <div class="form-group">
                <label for="quantidadeProduto" class="control-label">Quantidade do Produto</label>
                <div class="input-group">
                  <input type="number" class="form-control" id="quantidadeProduto" placeholder="Quantidade do produto">
                </div>
              </div>

              <div class="form-group">
                <label for="categoriaProduto" class="control-label">Categoria</label>
                <div class="input-group">
                  <select type="text" class="form-control" id="categoriaProduto">

                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <button type="cancel" class="btn btn-sencondary" data-dissmiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
@endsection

@section('javascript')
  <script type="text/javascript">
      function novoProduto(){
        $('#nomeProduto').val('');
        $('#precoProduto').val('');
        $('#quantidadeProduto').val('');
        $('#departamentoProduto').val('');
        $('#dlgProdutos').modal('show');
      }
      function carregarCategorias(){
        $.getJSON('/AulaLaravel/cadastro/public/api/categorias', function(data) {
          console.log(data);

          for(i=0; i<data.length;i++){
            opcao = '<option value="' + data[i].id + '">' +
            data[i].nome + '</option>';
            $('#categoriaProduto').append(opcao);
          }
        });
      }

      $(function(){
        carregarCategorias();
      });
  </script>
@endsection
