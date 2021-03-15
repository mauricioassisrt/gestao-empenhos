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
        <h3 class="headline text-yellow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 404</font></font></h3>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Opa! </font><font style="vertical-align: inherit;">Página não encontrada.</font></font></h3>

            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Não foi possível encontrar a página que você estava procurando. </font><font style="vertical-align: inherit;">Enquanto isso, você pode </font></font><a href="{{url('/dashboard')}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">retornar ao painel</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ou tentar usar o formulário de pesquisa.
                </font></font></p>

        </div>
        <!-- /.error-content -->
    </div>
</section>

</body>
</html>
