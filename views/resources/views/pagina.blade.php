<html>
<head>
  <title></title>
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>

  @alerta(['tipo'=>'danger', 'titulo' => 'Erro Fatal'])
    <strong>Erro: </strong> Sua mensagem de erro.
  @endalerta

  @alerta(['tipo'=>'warning', 'titulo' => 'Erro Quase Fatal'])
    <strong>Erro: </strong> Sua mensagem de erro.
  @endalerta

  @alerta(['tipo'=>'success', 'titulo' => 'Erro Quase Fatal'])
    <strong>Erro: </strong> Sua mensagem de erro.
  @endalerta

  @alerta(['tipo'=>'primary', 'titulo' => 'Erro Quase Fatal'])
    <strong>Erro: </strong> Sua mensagem de erro.
  @endalerta

  @alerta(['tipo'=>'secondary', 'titulo' => 'Erro Quase Fatal'])
    <strong>Erro: </strong> Sua mensagem de erro.
  @endalerta

  @alerta(['tipo'=>'info', 'titulo' => 'Erro Quase Fatal'])
    <strong>Erro: </strong> Sua mensagem de erro.
  @endalerta

  <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>
