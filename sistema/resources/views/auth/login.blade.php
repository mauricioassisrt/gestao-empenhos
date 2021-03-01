@extends('layouts.auth')

@php
//GET DADOS DA EMPRESA E CARREGA EM TODAS AS PAGINAS
use App\Empresa;
$empresa= Empresa::all();
@endphp
@section('content')

    <!-- /.login-box -->

    <div class="card">
        <div class="card-body login-card-body col-sm-12">
            <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}" class="">
                {{ csrf_field() }}

                <div class="login-logo ">
                    <img src="{{  $empresa[0]->foto_caminho  }}" alt="" class="img_login" width="120px" height="30%" />
                    <h5>

                        <br />
                        <span class="brand-text font-weight-bold">{{ $empresa[0]->nome_fantasia }} </span>
                    </h5>
                    <hr />
                    <h6 class="font-weight-light">Faça login para iniciar sua sessão</h6>
                    <hr />

                </div>


                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                        <div
                            class="alert alert-danger alert-dismissible form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Atenção !</h5>
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <div class="icon-addon addon-lg">
                        <label for="">Nome de Usuário</label>
                        <input type="email" id="email" class="form-control" placeholder="Email" required="" autofocus=""
                            name="email" value="{{ old('email') }}">

                        <hr />


                    </div>
                    <div class="icon-addon addon-lg">

                        <label for="">Senha</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Senha"
                            required="">

                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <hr />
                <button class="btn btn-lg btn-success btn-block" type="submit"> <i class="fas fa-sign-in-alt"></i>
                    Entrar</button>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Esqueceu a senha?') }}
                </a>


            </form>

        </div>
    </div>

    <!-- /container -->

    <!-- jQuery 3 -->
    <!--<script src="../../bower_components/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap 3.3.7 -->
    <!--<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>-->
    <!-- iCheck -->
    <!--<script src="../../plugins/iCheck/icheck.min.js"></script>-->
    <!--<script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
        </script>-->

@endsection
