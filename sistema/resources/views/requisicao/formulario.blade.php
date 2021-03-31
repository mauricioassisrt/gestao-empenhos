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
                @csrf
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
                        <input type="text" name="licitacao_ano" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->licitacao_ano }}" @endif>

                    </div>
                    <div class="col-sm-3">
                        <label>Pregão </label>
                        <input type="text" name="numero_pregao" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->numero_pregao }}" @endif>

                    </div>
                    <div class="col-sm-3">
                        <label>Orgão/Unidade </label>
                        <input type="text" name="orgao" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->orgao }}" @endif>

                    </div>
                    <div class="col-sm-3">
                        <label>Reduzido </label>
                        <input type="text" name="reduzido" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->reduzido }}" @endif>

                    </div>
                </div>
                {{-- <input type="hidden" name="user_id" value="" /> --}}
            </div>

            <hr>
            <div class="  callout callout-success ">
                <h5><b>Vamos escolher os produtos da requisição ? !!!</b> </h5>

                <p> Basta informar a quantidade somente para montar a requisição </p>
            </div>
            <div class="row" id="divProdutos">
                <div class="col-sm-12">
                    <label>Selecione uma categoria para exibir os itens </label>
                    <select name="categoria_id" class="form-control select2" style="width: 100%;" id="getCategoria">

                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nome_categoria }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="col-sm-12">

                    <div class="card-body table-responsive p-0">
                        <table class="table " id="tabela_produtos">

                        </table>
                    </div>


                </div>

            </div>
            <div class="row" id="divItens" style="display:none">
                <div class="col-sm-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table " id="tabela_itens">

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer clearfix">
            @can('View_requisicao')
                <a href="{{ url('/requisicao') }}" class="btn btn-primary">

                    <i class="fas fa-arrow-left"></i> Voltar </a>
            @endcan

            @if (Request::is('*/editar/*'))

                <button type="submit" class="btn btn-success" id="botaoSalvarUser" style="display:none"> <i
                        class=" fas fa-pen-alt"></i> Alterar</button>

            @else

                <a href="javascript::" class="btn btn-primary" id="irParaLista">

                    <i class="fas fa-arrow-right"></i> Ir para lista de itens </a>
                    <button type="submit" class="btn btn-success" id="resumo" style="display:none"> <i
                        class=" fas fa-pen-alt"></i> Resumo da requisição </button>
            @endif

        </div>
    </div>


    {!! Form::close() !!}
    </div>


@section('rodape')


    <!-- CALENDARIo-->
    <script src=" {{ asset('js/moment.min.js') }}"></script>
    <script src=" {{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- mask de telefone -->
    <script src=" {{ asset('js/jquery.inputmask.min.js') }}"></script>

    <!-- TOAST SWEETALERT -->
    <script src=" {{ asset('js/sweetalert2.all.js') }}"></script>
    <script src=" {{ asset('js/toastr.min.js') }}"></script>
    <!-- FIM TOAST SWEETALERT  -->


    <script>
        var listaRequisicao = [];
        var lista = '';
        var listaIdProdutos = [];
        $('#getCategoria').blur(function(e) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('requisicao/getCategoria') }}",
                method: "POST",
                data: {
                    categoria_id: $("#getCategoria").val(),

                },
                success: function(result) {

                    if (result.success) {
                        $("#tabela_produtos").empty()
                        $.each(result.produtos, function(key, value) {

                            lista += '<tr class="adicionar">';
                            lista += '<td >' + value.id + '</td>';
                            lista += '<td >' + value.lote + '</td>';
                            lista += '<td >' + value.nome + '</td>';
                            lista += '<td>' + value.valor_unitario + '</td>';
                            lista += '<td> <a class="btn btn-success  " href="javascript:"  ><i   class=" fas fa-save"></i> Adicionara</a>  </td>';
                            lista += '</tr>';
                        });
                        $('#tabela_produtos').append(lista);


                        lista = '';

                        $('.adicionar').click(function(e) {
                            var idProduto = $(this).find('td:eq(0)').text();

                            $.each(result.produtos, function(key, value) {

                                if (idProduto == value.id) {
                                    listaIdProdutos.push(value);
                                }

                            });
                            idProduto = "";

                            toastr.warning("Foram adicionados na lista o produto ");
                        });
                    } else {
                        // toastr.error(result.data);
                        //
                    }
                }
            });
        });
        $('#irParaLista').click(function(e) {

            $("#divProdutos").hide();
            $("#divItens").show();
            $.each(listaIdProdutos, function(key, value) {

                listaRequisicao += '<tr >';
                listaRequisicao += '<td >' + value.lote + '</td>';
                listaRequisicao += '<td >' + value.nome + '</td>';
                listaRequisicao += '<td>' + value.valor_unitario + '</td>';
                listaRequisicao += '<td> <input type="text" name="quantidadeItens[]" class=" form-control form-control-border" @if (Request::is("*/editar/*")) value="{{  }}" @endif>                </td>';
                listaRequisicao += '</tr>';
            });
            $('#tabela_itens').append(listaRequisicao);

            $("#irParaLista").hide();
            $("#resumo").show();

            listaRequisicao = '';
        });

    </script>
@endsection

@endsection
