@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
      <div class="card-body">
        <h5 class="card-title">Produtos</h5>
        <table class="table table-ordered table-hover" id="tabelaProdutos">
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
          </tbody>
        </table>
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

      function carregarProdutos(){
        $.getJSON('/AulaLaravel/cadastro/public/api/produtos', function(produtos){
          for(i=0;i<produtos.length;i++){
            linha = montarLinha(produtos[i]);
            $('#tabelaProdutos>tbody').append(linha);
          }
        });
      }

      function montarLinha(p){

          var linha = "<tr>" +
              "<td>" + p.id + "</td>" +
              "<td>" + p.nome + "</td>" +
              "<td>" + p.estoque + "</td>" +
              "<td>" + p.preco + "</td>" +
              "<td>" + p.categoria_id + "</td>" +
              "<td>" +
                  '<button class="btn btn-sm btn-primary"> Editar</button>' +
                  '<button class="btn btn-sm btn-danger"> Editar</button>' +
              "</td>" +
              "</tr>";
          return linha;
      }

      $(function(){
        carregarCategorias();
        carregarProdutos();
      });
  </script>
@endsection
