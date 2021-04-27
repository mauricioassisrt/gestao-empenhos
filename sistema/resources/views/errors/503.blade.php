<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ambiente de homologação </title>
    <meta charset="utf-8">

    <link rel="shortcut icon" href="{{ url('https://img.icons8.com/cotton/2x/workers-male.png') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<section class="content">
    <div class="error-page">
        <h2 class="headline text-danger">500</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Servidor indisponivel no momento </h3>

          <p>
            Entre em contato com o administrador do sistema
          </p>

          {{ $th->getMessage() }}
        </div>
      </div>
</section>

</body>
</html>
