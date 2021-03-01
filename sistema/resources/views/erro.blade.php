@extends('adminapp')

@section('content')

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

@endsection
