@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href="/css/tempusdominus-bootstrap-4.min.css">
    <!-- toast CSS-->
    <link rel="stylesheet" href="/css/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">

            @if (Request::is('*/editar/*'))
                 {{--  'enctype'=> 'multipart/form-data' serve para upload de arquivos  --}}
                {!! Form::model($fornecedor, ['method' => 'PATCH', 'url' => 'fornecedors/update/' . $fornecedor->id, ] ) !!}

            @else
                <form action="{{ url('fornecedors/insert') }}" method="post">

            @endif
            <div class="row">

                <div class="col-sm-9">
                        <div class="col-sm-3 ">
                            <label>Nome da Empresa </label>
                            <input type="text" name="name" class=" form-control form-control-border"  @if (Request::is('*/editar/*'))
                            value="{{ $fornecedor->name  }}" @endif required>
                        </div>
                        <div class="col-sm-3 ">
                            <!-- Date -->
                            <div class="form-group">
                                <label>Data de nascimento :</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="data_nascimento" placeholder="dia-mes-ano" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask  @if (Request::is('*/editar/*'))
                                    value="{{ date('d/m/Y', strtotime($fornecedor->data_nascimento )) }}" @endif>
                                  </div>
                            </div>

                            <!-- /.form group -->
                        </div>
                        <div class="col-sm-3">
                            <label>Sexo</label>
                            <select class="custom-select " name="sexo">
                                <option   @if(Request::is('*/editar/*')) value="{{$fornecedor->sexo}}" >{{$fornecedor->sexo}} @endif </option>
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
                                <input type="text" class="form-control" name="celular" data-inputmask="'mask': ['(99) 9 9999-9999 ']" data-mask="" inputmode="text"  @if (Request::is('*/editar/*'))
                                value="{{ $fornecedor->celular  }}" @endif>
                            </div>
                        </div>
                        {{-- <input type="hidden" name="user_id" value="" />
                        --}}

                    <hr>
                    <div class="  callout callout-success ">
                        <h5><b>Atenção !!!</b> </h5>

                        <p> As informações a seguir são recorrentes ao login de acesso ao sistema deste modo preste grande
                            atenção !</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">

                            <label>E-mail: <b class="text-danger">*</b></label></label>
                            <input type="email" class="form-control" placeholder="Digite o e-mail do usuario."
                                name="email" @if (Request::is('*/editar/*'))
                            value="{{ $fornecedor->users->email  }}" id="email" @endif id="enviarEmail" required>

                        </div>
                        @if(Request::is('*/editar/*'))

                        <input type="hidden" name="fornecedor_id" id="fornecedor_id" @if (Request::is('*/editar/*'))
                        value="{{ $fornecedor->id }}" @endif >

                        <input type="hidden" name="user_id" id="user_id" @if (Request::is('*/editar/*'))
                        value="{{ $fornecedor->users->id }}" @endif >
                        @can('Edit_user_logado')
                        <div class="col-sm-3">
                            <label>Senha Anterior  :<b class="text-danger">*</b></label></label>
                            <input type="password" name="senha_antiga"  id="enviarSenha"  class="form-control senhaAntiga" placeholder="Digite cadastrada anteriormente ."
                                   required>

                        </div>
                        @endcan
                        <div class="col-sm-3 senhas" style="display: none">
                            <label>Nova senha :<b class="text-danger">*</b></label></label>
                            <input type="password" class="form-control " id="password" name="password"
                                required placeholder="Nova senha.">

                        </div>
                        <div class="col-sm-3 senhas" style="display: none">
                            <label>Repita a senha :<b class="text-danger">*</b></label></label>
                            <input type="password" class="form-control  verificaSenha" id="password-confirm" name="password-confirm"
                                required placeholder="Comfirme a senha." >

                        </div>
                        @else
                        <div class="col-sm-4 senhas" style="display: none">
                            <label>Senha :<b class="text-danger">*</b></label></label>
                            <input type="password" class="form-control" placeholder="Digite a senha do usuario."
                                id="password" name="password"  required>

                        </div>
                        <div class="col-sm-4 senhas" style="display: none">
                            <label>Repita a senha :<b class="text-danger">*</b></label></label>
                            <input type="password" class="form-control  verificaSenha" id="password-confirm" name="password-confirm"
                                required placeholder="Comfirme a senha.">

                        </div>

                        @endif

                    </div>

                </div>
            </div>

        </div>

        <div class="card-footer clearfix">
            @can('fornecedor_view')
                <a href="{{ url('/fornecedors') }}" class="btn btn-primary">

                    <i class="fas fa-arrow-left"></i> Voltar </a>
            @endcan

            @if (Request::is('*/editar/*'))

                    <button type="submit" class="btn btn-success"  id="botaoSalvarUser" style="display:none"> <i class=" fas fa-pen-alt"></i> Alterar</button>

            @else
                <button type="submit" class="btn btn-success" id="botaoSalvarUser" style="display:none"> <i class=" fas fa-save"></i> Salvar</button>
            @endif

        </div>
        {!! Form::close() !!}
    </div>


@section('rodape')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <!-- CALENDARIo-->
    <script src="/js/moment.min.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- mask de telefone -->
    <script src="/js/jquery.inputmask.min.js"></script>

    <!-- TOAST SWEETALERT -->
    <script src="/js/sweetalert2.all.js"></script>
    <script src="/js/toastr.min.js"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <!-- Modulo usuarios-->
    <script src="/js/modulos/fornecedor-cadastro.js"></script>

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
                url: "{{ url('fornecedors/carregaSenha') }}",
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
                success: function (result) {
                    if(result.success === 'success'){
                        toastr.success('Email validado, digite uma nova senha para acesso ao sistema !!!!');
                        $(".senhas").show();
                    }else{
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
            url: "{{ url('fornecedors/carregaSenha') }}",
            method: "POST",
            data: {
                email: $("#enviarEmail").val(),
            },
            success: function (result) {
                if(result.success){
                    toastr.success(result.data);
                    $(".senhas").show();
                }else{
                    toastr.error(result.data);
                    $(".senhas").hide();
                }
            }
        });
        });
    </script>
@endsection

@endsection
