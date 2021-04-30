@php
//GET DADOS DA EMPRESA E CARREGA EM TODAS AS PAGINAS
use App\Empresa;
$empresa= Empresa::all();
@endphp
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ $empresa[0]->nome_fantasia }}</title>
    <link rel="shortcut icon" href="{{ asset('img/nautilus_logo.png') }}" type="image/png" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body class="login-page">

      @yield('content')


  </body>
</html>
