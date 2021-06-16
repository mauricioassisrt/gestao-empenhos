@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href=" {{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- toast CSS-->
    <link rel="stylesheet" href=" {{ asset('css/toastr.min.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style type="text/css">
        input[type='file'] {
            display: none
        }

        .input-wrapper label {
            background-color: #3498db;
            border-radius: 5px;
            color: #fff;
            margin: 10px;
            padding: 6px 20px
        }

        .input-wrapper label:hover {
            background-color: #2980b9
        }

    </style>
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">
            @if (Session::has('message'))
                <p>{{ Session::get('message') }}</p>
            @endif
            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))

                {!! Form::model($pessoa, ['method' => 'PATCH', 'url' => 'pessoas/update/' . $pessoa->id, 'enctype' => 'multipart/form-data']) !!}

            @else
                <form action="{{ route('importar.insert') }}" method="post" enctype="multipart/form-data">

            @endif
            @csrf

            <div class="row">
                <div class="col-sm-6 ">
                    <div class='input-wrapper'>
                        <label for='arquivo'>
                            <i class="fas fa-upload"></i> Arquivo
                        </label>
                        <input id='arquivo' type='file' accept="application/xls" name='arquivo' />
                        <span id='arquivo_label'></span>
                    </div>




                </div>
                <div class="col-sm-6 ">

                    <div class='input-wrapper'>
                        <a href="{{ route('export.categoria') }}">
                            <label for='export'>
                                <i class="fas fa-upload"></i> Exportar excel
                            </label>


                        </a>
                    </div>




                </div>
            </div>

        </div>

        <div class="card-footer clearfix">
            <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Salvar</button>
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
