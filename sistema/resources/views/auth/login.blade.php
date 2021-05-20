@extends('layouts.auth')


@section('content')

    <!-- /.login-box -->

    <div class="login-box">
        <div class="login-card-body col-md-12">
            <form class="form-signin" role="form" method="POST" action="{{ route('login') }}" class="">
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
                            Usuário ou senha incorretos !!
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


@endsection
