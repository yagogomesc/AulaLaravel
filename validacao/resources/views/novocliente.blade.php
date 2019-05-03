<html>
<head>
  <title>Cadastro de Cliente</title>
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <style>
    body{padding-top: 20px}
  </style>
</head>
<body>
    <main role="main">
      <div class="row">
        <div class="container col-md-8 offset-md-2">
          <div class="card border">
            <div class="card-header">
              <div class="card-title">
                Cadastro de Cliente
              </div>
            </div>

            <div class="card-body">
              <form action="/cliente" method="POST">
                  @csrf
                <div class="form-group">
                  <label for="nome">Nome do cliente</label>
                  <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do cliente">
                </div>
                <div class="form-group">
                  <label for="idade">Idade do cliente</label>
                  <input type="number" id="idade" name="idade" class="form-control" placeholder="Idade do cliente">
                </div>
                <div class="form-group">
                  <label for="endereco">Endereço do cliente</label>
                  <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço do cliente">
                </div>
                <div class="form-group">
                  <label for="email">E-mail do cliente</label>
                  <input type="text" id="email" name="email" class="form-control" placeholder="E-mail do cliente">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
              </form>
            </div>

          </div>
        </div>
      </div>
    </main>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>
