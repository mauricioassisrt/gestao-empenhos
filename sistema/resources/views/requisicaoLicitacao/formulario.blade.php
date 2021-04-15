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
                        <select name="unidade_id" class="form-control select2" style="width: 100%;">

                            @foreach ($pessoa_unidades as $pessoa_unidade)

                                <option value="{{ $pessoa_unidade->unidade->id }}">
                                    Unidade {{ $pessoa_unidade->unidade->nome }} Pessoa
                                    {{ $pessoa_unidade->pessoa->nome }}
                                </option>

                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label>Justificativa </label>
                        <textarea class="form-control" rows="3" required name="justificativa"
                            placeholder="Qual sua  justificativa para a requisição"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <label>observação </label>
                        <textarea class="form-control" rows="3" required name="observacao"
                            placeholder="Possui alguma observação para incluir ?"></textarea>
                    </div>
                </div>


            </div>

            <hr>
            <div class="  callout callout-success ">
                <h5><b>Vamos escolher os produtos da requisição ? !!!</b> </h5>

                <p> Basta informar a quantidade somente para montar a requisição </p>
            </div>
            <div class="row" id="divProdutos">
                <div class="col-sm-12">
                    <label>Selecione uma categoria para exibir os itens </label>
                    <select name="licitacao_id" class="form-control select2" style="width: 100%;" id="licitacao_id">

                        @foreach ($licitacaos as $licitacao)
                            <option value="{{ $licitacao->id}}">
                              Número da Licitacação  {{  $licitacao->ano }}/{{  $licitacao->numero_licitacao }}
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


            @if (Request::is('*/editar/*'))

                <button type="submit" class="btn btn-success" id="botaoSalvarUser" style="display:none"> <i
                        class=" fas fa-pen-alt"></i> Alterar</button>

            @else

                <a href="javascript:" class="btn btn-primary" id="voltarProdutos" style="display:none">

                    <i class="fas fa-arrow-left"></i> Voltar escolher produtos </a>

                <a href="javascript:" class="btn btn-primary" id="irParaLista">

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
        var listaProdutosNova = [];
        $('#licitacao_id').blur(function(e) {
            alert($("#licitacao_id").val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('requisicaoComLicitacao/getLicitacao') }}",
                method: "POST",
                data: {
                    licitacao_id: $("#licitacao_id").val(),

                },
                success: function(result) {

                    if (result.success) {
                        $("#tabela_produtos").empty()
                        $.each(result.produtos, function(key, value) {

                            lista += '<tr class="adicionar">';
                            lista += '<td >' + value.id + '</td>';
                            lista += '<td >' + value.lote + '</td>';
                            lista += '<td >' + value.nome + '</td>';
                            lista += '<td>' + value.nome_categoria + '</td>';
                            lista +=
                                '<td> <a class="btn btn-success "  href="javascript:"  ><i   class=" fas fa-plus"></i> </a>  </td>';
                            lista += '</tr>';
                        });
                        $('#tabela_produtos').append(lista);


                        lista = '';

                        $('.adicionar').click(function(e) {
                            var idProduto = $(this).find('td:eq(0)').text();

                            $.each(result.produtos, function(key, value) {
                                if (idProduto == value.id) {
                                    listaIdProdutos.push(value);
                                    toastr.success("Produto adicionado na listagem");

                                }


                            });

                            idProduto = "";
                        });

                    } else {
                        toastr.error("Esta categoria não possui nenhum produto cadastrado!!!");
                        //
                    }
                }
            });
        });
        $('#irParaLista').click(function(e) {

            $("#divProdutos").hide();
            $("#divItens").show();
            $("#tabela_itens").empty()

            $.each(listaIdProdutos, function(i, e) {
                var matchingItems = $.grep(listaProdutosNova, function(item) {
                    return item.id === e.id;
                });
                if (matchingItems.length === 0) {
                    listaProdutosNova.push(e);
                }
            });

            $.each(listaProdutosNova, function(key, value) {

                listaRequisicao += '<tr class="del">';
                listaRequisicao += '<td ><p style="display:none">' + key + '</p></td>';
                listaRequisicao += '<td >' + value.lote + '</td>';
                listaRequisicao += '<td >' + value.nome + '</td>';
                listaRequisicao += '<td>' + value.valor_unitario + '</td>';
                listaRequisicao += '<td> <input type="hidden" name="produto_id[]" value=' + value.id +
                    ' /> <input type="text" required name="quantidadeItens[]" class=" form-control form-control-border" @if (Request::is(' *
                    /editar/ *
                    ')) value="{{  }}" @endif> </td>';
                listaRequisicao += '<td> <a href="#" class="btn btn-danger " ><i   class=" fas fa-trash"></i> </a> </td>';
                listaRequisicao += '</tr>';

            });

            $('#tabela_itens').append(listaRequisicao);

            $("#irParaLista").hide();
            $("#resumo").show();
            $("#voltarProdutos").show();

            listaRequisicao = '';

            $('#tabela_itens').on('click', 'tr a ', function(e) {

                e.preventDefault();
                $(this).parents('tr').remove();

                var idProduto = $(this).find('td:eq(0)').text();
                toastr.error("Apagado com sucesso !");
                listaProdutosNova.splice($.inArray(idProduto, listaProdutosNova));
                listaIdProdutos.splice($.inArray(idProduto, listaIdProdutos));
                listaRequisicao.splice($.inArray(idProduto, listaRequisicao));


            });

        });

        $('#voltarProdutos').click(function(e) {
            $("#divProdutos").show();
            $("#divItens").hide();
            $("#resumo").hide();
            $("#irParaLista").show();
            $("#voltarProdutos").hide();

        });

    </script>
@endsection

@endsection
