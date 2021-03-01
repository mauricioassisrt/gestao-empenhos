@extends('adminapp')

@section('content')

<section class="content">

    <div class="error-page">
        <h2 class="headline text-red"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">500</font></font></h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-red"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Opa! </font><font style="vertical-align: inherit;">Você ainda não possui acesso a essa função !.</font></font></h3>

            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Vamos trabalhar para consertar isso imediatamente. </font><font style="vertical-align: inherit;">Enquanto isso, você pode </font></font><a href="{{url('/dashboard')}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">retornar ao painel</font></font></a><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> ou tentar usar o formulário de pesquisa.
                </font></font></p>

            <form class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">

                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- /.input-group -->
            </form>
        </div>
    </div>
    <!-- /.error-page -->

</section>

@endsection
