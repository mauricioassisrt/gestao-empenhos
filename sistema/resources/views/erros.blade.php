@extends('adminapp')

@section('content')

<section class="content">
    <div class="error-page">
        <h3 class="headline text-yellow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 404</font></font></h3>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Falhou! </font><font style="vertical-align: inherit;">Página não encontrada.</font></font></h3>

            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Não foi possivel excluir o produto pois tem dados associados a ele!
                </font></font></p>

        </div>
        <!-- /.error-content -->
    </div>
</section>

@endsection
