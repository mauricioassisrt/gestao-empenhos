@php
//GET DADOS DA EMPRESA E CARREGA EM TODAS AS PAGINAS
use App\Empresa;
$empresa = Empresa::all();
@endphp
@extends('layouts.auth')

<!-- Main Content -->
@section('content')

    <!-- /.login-box -->
    <div class="card">
        <div class="card-body login-card-body col-sm-12">

            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                {{ csrf_field() }}
                <div class="login-logo ">
                    <img src="/{{  $empresa[0]->foto_caminho  }}" alt="" class="img_login" width="120px" height="30%" />
                    <h5>

                        <br />
                        <span class="brand-text font-weight-bold">{{ $empresa[0]->nome_fantasia }} </span>
                    </h5>
                </div>

                <hr />
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        E-mail enviado com sucesso!! <br>
                        caso não encontrar nenhum e-mail na caixa de entrada,<br> favor verificar no span(lixo eletrônico)!
                    </div>
                @endif
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">


                    <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('E-Mail Cadastrado') }}</label>


                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                        name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    </div>
                    <div class="social-auth-links text-center mb-12">
                        <button type="submit" class="btn btn-block btn-success">
                            <i class="fas fa-envelope"></i>   {{ __('Recuperar E-mail') }}
                        </button>
                        <a href="{{ url('/login') }}" class="btn btn-block btn-primary">

                            <i class="fas fa-arrow-left"></i> Voltar </a>

                    </div>

                </div>
            </form>
        </div>



    @endsection
