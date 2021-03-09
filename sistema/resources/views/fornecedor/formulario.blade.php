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


            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))
                {!! Form::model($fornecedor, ['method' => 'PATCH', 'url' => 'fornecedor/update/' . $fornecedor->id]) !!}
            @else
                {!! Form::open(['url' => 'fornecedor/insert']) !!}
            @endif
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" id="nome_fornecedor" placeholder="Digite o nome ."
                    name="nome_fornecedor" @if (Request::is('*/editar/*')) value="{{ $fornecedor->nome_fornecedor }}" @endif required>

            </div>
            <div class="form-group">
                <label>Sigla</label>
                <input type="text" class="form-control" placeholder="PR" id="sigla" name="cnpj" @if (Request::is('*/editar/*')) value="{{ $fornecedor->cnpj }}" @endif required>

            </div>
        </div>
        <div class="card-footer clearfix">

            <a href="{{ url('/fornecedor') }}" class="btn btn-primary">

                <i class="fas fa-arrow-left"></i> Voltar </a>

            @if (Request::is('*/editar/*'))
                <button type="submit" class="btn btn-success"> <i class=" fas fa-pen-alt"></i> Alterar</button>
            @else
                <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Salvar</button>
            @endif

        </div>
        {!! Form::close() !!}
    </div>
    </div>
    </div>


@section('rodape')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                url: "{{ url('fornecedors/carregaSenha') }}",
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
