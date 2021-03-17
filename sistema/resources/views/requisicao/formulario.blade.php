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

                {!! Form::model($requisicao, ['method' => 'PATCH', 'url' => 'requisicao/update/' . $requisicao->id, 'enctype' => 'multipart/form-data']) !!}

            @else
                <form action="{{ url('requisicao/insert') }}" method="post" enctype="multipart/form-data">

            @endif

            <div class="col-sm-12">

                <div class="row">
                    <div class="col-sm-1 ">
                        <label>Código</label>
                        <input type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->id }}" @endif disabled>

                    </div>
                    <div class="col-sm-2">
                        <label>Requisição</label>
                        <input type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->numero_requisicao }}" @endif disabled>

                    </div>
                    <div class="col-sm-9">

                        <label>Pessoa e suas unidades </label>
                        <select name="fornecedor_id" class="form-control select2" style="width: 100%;">

                            @foreach ($pessoa_unidades as $pessoa_unidade)

                                <option value="{{ $pessoa_unidade->id }}">
                                    Unidade {{ $pessoa_unidade->unidade->nome }} Pessoa
                                    {{ $pessoa_unidade->pessoa->nome }}
                                </option>

                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Fonte dos recursos </label>
                        <select name="fonte_recurso" class="form-control select2">
                            <option @if (Request::is('*/editar/*')) value="{{ $requisicao->fonte_recurso }}" >{{ $requisicao->fonte_recurso }} @endif </option>
                            <option value="Recurso Livre">Recurso Livre </option>
                            <option value="Fonte Vinculada ">Fonte Vinculada </option>
                            <option value="Outra fonte "> Outra Fonte </option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label>Fornecedor </label>
                        <select name="fornecedor_id" class="form-control select2" style="width: 100%;">

                            @foreach ($fornecedors as $fornecedor)
                                <option value="{{ $fornecedor->id }}">
                                    {{ $fornecedor->nome_fornecedor }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    {{-- <div class="col-sm-3">
                        <label>Pessoa e suas unidades </label>
                        <select name="fornecedor_id" class="form-control select2" style="width: 100%;">

                            @foreach ($pessoa_unidades as $pessoa_unidade)

                                <option value="{{ $pessoa_unidade->id }}">
                                    Unidade {{ $pessoa_unidade->unidade->nome }} Pessoa
                                    {{ $pessoa_unidade->pessoa->nome }}
                                </option>

                            @endforeach
                        </select>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Justificativa </label>
                        <textarea class="form-control" rows="3" name="justificativa"
                            placeholder="Qual sua  justificativa para a requisição"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <label>Justificativa </label>
                        <textarea class="form-control" rows="3" name="observacao"
                            placeholder="Possui alguma observação para incluir ?"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Licitação/Ano </label>
                        <input type="text" name="licitacao_ano" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->licitacao_ano }}" @endif >

                    </div>
                    <div class="col-sm-3">
                        <label>Pregão </label>
                        <input type="text" name="numero_pregao" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->numero_pregao }}" @endif >

                    </div>
                    <div class="col-sm-3">
                        <label>Orgão/Unidade </label>
                        <input type="text" name="orgao" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->orgao }}" @endif >

                    </div>
                    <div class="col-sm-3">
                        <label>Reduzido </label>
                        <input type="text" name="reduzido" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->reduzido }}" @endif >

                    </div>
                </div>
                {{-- <input type="hidden" name="user_id" value="" /> --}}
            </div>

            <hr>
            <div class="  callout callout-success ">
                <h5><b>Vamos escolher os produtos da requisição ? !!!</b> </h5>

                <p> Basta informar a quantidade somente para montar a requisição </p>
            </div>
            <div class="row">
                <div class="col-sm-12">

                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-bordered table-hover" style='background:#fff'>
                            <thead>
                                <th> Lote</th>
                                <th> Produto</th>
                                <th>Valor Unitario </th>
                                <th>Quantidade</th>
                                <th>Valor Total</th>

                            </thead>
                            <tbody>
                                @foreach ($produtos as $produto)
                                    <tr>
                                        <td>{!! $produto->lote !!}</td>
                                        <td>{!! $produto->nome !!}</td>
                                        <td>{{ $produto->valor_unitario }}</td>
                                        <td>
                                            <input type="number" name="quantidade_itens_requisicao"
                                                class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->quantidade_itens_requisicao }}" @endif>
                                        </td>
                                        <td>
                                            <input type="number" name="valor_itens_requisicao"
                                                class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->valor_itens_requisicao }}" @endif disabled>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>
        </div>

    </div>

    <div class="card-footer clearfix">
        @can('requisicao_view')
            <a href="{{ url('/requisicao') }}" class="btn btn-primary">

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
    <script src=" {{ asset('js/modulos/requisicao-cadastro.js') }}"></script>

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
                url: "{{ url('requisicao/carregaSenha') }}",
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
                url: "{{ url('requisicao/carregaSenha') }}",
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
