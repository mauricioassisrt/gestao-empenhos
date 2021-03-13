@php
//GET DADOS DA EMPRESA E CARREGA EM TODAS AS PAGINAS
use App\Empresa;
$empresa= Empresa::all();
@endphp
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $empresa[0]->nome_fantasia }}</title>
    <link rel="shortcut icon" href="/img/nautilus_logo.png">
    <link rel="stylesheet" href="/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="/css/app.css">
  </head>
  <body class="hold-transition login-page">

      @yield('content')


  </body>
</html>
