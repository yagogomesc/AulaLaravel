<html>
<head>
  <title></title>
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>

  @component('components.meucomponente',['tipo'=>'danger', 'titulo' => 'Erro Fatal'])
    <strong>Erro: </strong> Sua mensagem de erro.
  @endcomponent

  @component('components.meucomponente',['tipo'=>'warning', 'titulo' => 'Erro Quase Fatal'])
    <strong>Erro: </strong> Sua mensagem de erro.
  @endcomponent

  <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>
