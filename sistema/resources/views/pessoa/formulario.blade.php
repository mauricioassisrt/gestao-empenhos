@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href=" {{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- toast CSS-->
    <link rel="stylesheet" href=" {{ asset('css/toastr.min.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">

            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))

                {!! Form::model($pessoa, ['method' => 'PATCH', 'url' => 'pessoas/update/' . $pessoa->id, 'enctype' => 'multipart/form-data']) !!}

            @else
                <form action="{{ url('pessoas/insert') }}" method="post" enctype="multipart/form-data">

            @endif
            <div class="row">

                <div class="image col-sm-3 text-center">


                    @if (Request::is('*/editar/*'))
                        <img @if (Request::is('*/editar/*')) src="/{{ $pessoa->foto_pessoa }}" @endif
                            class="brand-image img-circle elevation-3" alt="User Image" width="60px" height="60px">
                    @else
                        @csrf
                        <img src="/../img/empresa/empresa.png " class="brand-image img-circle elevation-3"
                            alt="Insira uma imagem" width="40px" height="40px">
                    @endif
                    <div class="form-group">
                        <label for="exampleInputFile">FOTO </label>
                        <div class="input-group" width="2px">
                            <input type="file" name="foto_pessoa" id="" required> <br>
                        </div>
                    </div>
                </div>


                <div class="col-sm-9">

                    <div class="row">
                        <div class="col-sm-3 ">
                            <label>Nome completo</label>
                            <input type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $pessoa->name }}" @endif required>

                        </div>
                        <div class="col-sm-3 ">
                            <!-- Date -->
                            <div class="form-group">
                                <label>Data de nascimento :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="data_nascimento" placeholder="dia-mes-ano"
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask
                                        @if (Request::is('*/editar/*')) value="{{ date('d/m/Y', strtotime($pessoa->data_nascimento)) }}" @endif>
                                </div>
                            </div>

                            <!-- /.form group -->
                        </div>
                        <div class="col-sm-3">
                            <label>Sexo</label>
                            <select class="custom-select " name="sexo">
                                <option @if (Request::is('*/editar/*')) value="{{ $pessoa->sexo }}" >{{ $pessoa->sexo }} @endif </option>
                                <option value="Feminino">Feminino </option>
                                <option value="Masculino">Masculino </option>
                                <option value="Prefiro não informar">Prefiro não informar</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label>Contato </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" name="celular"
                                    data-inputmask="'mask': ['(99) 9 9999-9999 ']" data-mask="" inputmode="text" @if (Request::is('*/editar/*')) value="{{ $pessoa->celular }}" @endif>
                            </div>
                        </div>
                        {{-- <input type="hidden" name="user_id" value="" /> --}}
                    </div>

                    <hr>
                    <div class="  callout callout-success ">
                        <h5><b>Atenção !!!</b> </h5>

                        <p> As informações a seguir são recorrentes ao login de acesso ao sistema deste modo preste grande
                            atenção !</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">

                            <label>E-mail: <b class="text-danger">*</b></label></label>
                            <input type="email" class="form-control" placeholder="Digite o e-mail do usuario." name="email"
                                @if (Request::is('*/editar/*')) value="{{ $pessoa->users->email }}" id="email" @endif id="enviarEmail" required>

                        </div>
                        @if (Request::is('*/editar/*'))

                            <input type="hidden" name="pessoa_id" id="pessoa_id" @if (Request::is('*/editar/*')) value="{{ $pessoa->id }}" @endif>

                            <input type="hidden" name="user_id" id="user_id" @if (Request::is('*/editar/*')) value="{{ $pessoa->users->id }}" @endif>
                            @can('Edit_user_logado')
                                <div class="col-sm-3">
                                    <label>Senha Anterior :<b class="text-danger">*</b></label></label>
                                    <input type="password" name="senha_antiga" id="enviarSenha" class="form-control senhaAntiga"
                                        placeholder="Digite cadastrada anteriormente ." required>

                                </div>
                            @endcan
                            <div class="col-sm-3 senhas" style="display: none">
                                <label>Nova senha :<b class="text-danger">*</b></label></label>
                                <input type="password" class="form-control " id="password" name="password" required
                                    placeholder="Nova senha.">

                            </div>
                            <div class="col-sm-3 senhas" style="display: none">
                                <label>Repita a senha :<b class="text-danger">*</b></label></label>
                                <input type="password" class="form-control  verificaSenha" id="password-confirm"
                                    name="password-confirm" required placeholder="Comfirme a senha.">

                            </div>
                        @else
                            <div class="col-sm-4 senhas" style="display: none">
                                <label>Senha :<b class="text-danger">*</b></label></label>
                                <input type="password" class="form-control" placeholder="Digite a senha do usuario."
                                    id="password" name="password" required>

                            </div>
                            <div class="col-sm-4 senhas" style="display: none">
                                <label>Repita a senha :<b class="text-danger">*</b></label></label>
                                <input type="password" class="form-control  verificaSenha" id="password-confirm"
                                    name="password-confirm" required placeholder="Comfirme a senha.">

                            </div>

                        @endif

                    </div>

                </div>
            </div>

        </div>

        <div class="card-footer clearfix">
            @can('pessoa_view')
                <a href="{{ url('/pessoas') }}" class="btn btn-primary">

                    <i class="fas fa-arrow-left"></i> Voltar </a>
            @endcan

            @if (Request::is('*/editar/*'))

                <button type="submit" class="btn btn-success" id="botaoSalvarUser" style="display:none"> <i
                        class=" fas fa-pen-alt"></i> Alterar</button>

            @else
                <button type="submit" class="btn btn-success" id="botaoSalvarUser" style="display:none"> <i
                        class=" fas fa-save"></i> Salvar</button>
            @endif

        </div>
        {!! Form::close() !!}
    </div>


@section('rodape')

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script> --}}
    <!-- CALENDARIo-->
    <script src=" {{ asset('js/moment.min.js') }}"></script>
    <script src=" {{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- mask de telefone -->
    <script src=" {{ asset('js/jquery.inputmask.min.js') }}"></script>

    <!-- TOAST SWEETALERT -->
    <script src=" {{ asset('js/sweetalert2.all.js') }}"></script>
    <script src=" {{ asset('js/toastr.min.js') }}"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <!-- Modulo usuarios-->
    <script src=" {{ asset('js/modulos/pessoa-cadastro.js') }}"></script>

    <script>
        //verifica o envio de senha
        $('#enviarSenha').blur(function(e) {
            //CSRF TOKEN
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                //passo o endereco da API
                url: "{{ url('pessoas/carregaSenha') }}",
                //define-se o metodo do tipo post
                method: "POST",
                //passa os parametros que serão enviados via API ID do usuario que está sendo editado, senha antiga digitada, e email
                // o email e a senha será enviado e comparado com os inseridos no database
                data: {
                    user_id: $("#user_id").val(),
                    senha_antiga: $(".senhaAntiga").val(),
                    email: $("#email").val(),
                },
                //caso resulte sucesso, exibe os  input para digitar senha, caso contrario não libera o acesso
                success: function(result) {
                    if (result.success === 'success') {
                        toastr.success(
                            'Email validado, digite uma nova senha para acesso ao sistema !!!!');
                        $(".senhas").show();
                    } else {
                        $(".senhas").hide();
                        toastr.error('Email inválido ou senha anterior incorreta !!!!');
                    }
                }
            });
        });
        //envio de email
        $('#enviarEmail').blur(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('pessoas/carregaSenha') }}",
                method: "POST",
                data: {
                    email: $("#enviarEmail").val(),
                },
                success: function(result) {
                    if (result.success) {
                        toastr.success(result.data);
                        $(".senhas").show();
                    } else {
                        toastr.error(result.data);
                        $(".senhas").hide();
                    }
                }
            });
        });

    </script>
@endsection

@endsection
