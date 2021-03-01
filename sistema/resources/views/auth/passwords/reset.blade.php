@extends('layouts.auth')
@php
//GET DADOS DA EMPRESA E CARREGA EM TODAS AS PAGINAS
use App\Empresa;
$empresa= Empresa::all();
@endphp
<!-- Main Content -->
@section('content')

    <!-- /.login-box -->
    <div class="card">
        <div class="card-body login-card-body">

            <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">

                {{ csrf_field() }}
                <!--          <img src="{{ url('https://img.icons8.com/cotton/2x/workers-male.png') }}" alt="" class="img_login"/>-->

                <div class="login-logo ">
                    <img src="{{ $empresa[0]->foto_caminho }}" alt="" class="img_login" width="120px" height="30%" />
                    <h5>

                        <br />
                        <span class="brand-text font-weight-bold">{{ $empresa[0]->nome_fantasia }} </span>
                    </h5>
                </div>

                <hr />

                <h3 style="text-align:center">{{ __('Recuperação de senha ') }}</h3>



                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">


                    <div class="col-md-12">
                        <label for="email">{{ __('E-Mail ') }}</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email" value="{{ $email ?? old('email') }}" required autofocus readonly>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">


                    <div class="col-md-12">
                        <label for="password">{{ __('Senha') }}</label>
                        <input id="password" type="password"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                            required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">


                    <div class="col-md-12">
                        <label for="password-confirm">{{ __('Confirme a senha') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>
                </div>

                <hr />
        </div>
        <div class="card-footer clearfix">
            <a href="{{ url('/login') }}" class="btn btn-primary">

                <i class="fas fa-arrow-left"></i> Voltar </a>
            <button type="submit" class="btn btn-success">
                {{ __('Mudar senha') }}
            </button>
        </div>

        </form>


    </div>

    </form>
    </div>



@endsection
