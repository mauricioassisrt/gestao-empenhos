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

            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))

                {!! Form::model($requisicao, ['method' => 'PATCH', 'url' => 'requisicao/update/' . $requisicao->id, 'enctype' => 'multipart/form-data']) !!}

            @else
                <form action="{{ url('requisicao/insert') }}" method="post" enctype="multipart/form-data">

            @endif

            <div class="col-sm-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-info"></i> Atenção! </h5>
                    1º Escolha uma das unidades nas quais possui vinculo <br>
                    2º Anexar o arquivo da pesquisa de preços dos produtos que foram escolhidos, é necessário adicionar no
                    minimo uma pesquisa de preço <br>
                    3º O tamanho máximo do arquivo é de 1 MB, e o formato permitido é PDF somente <br>
                    4º Escolher os produtos desejados <br>
                    5º Adicionar a quantidade e o MENOR valor unitario encontrado, após isso tudo finalize seu orçamento
                </div>

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
                        @if (Gate::allows('minhas_requisicoes'))
                            <label>Unidades vinculadas </label>
                            <select name="unidade_id" class="form-control select2" style="width: 100%;">

                                @foreach ($pessoa_unidades as $pessoa_unidade)
                                    @if ($pessoa_unidade->pessoa->users->id === Auth::user()->id)
                                        <option value="{{ $pessoa_unidade->unidade->id }}">
                                            UNIDADE: {{ $pessoa_unidade->unidade->nome }}
                                        </option>
                                    @endif


                                @endforeach

                            </select>
                        @else
                            <label>Todas as Unidades </label>
                            <select name="unidade_id" class="form-control select2" style="width: 100%;">

                                @foreach ($pessoa_unidades as $pessoa_unidade)

                                    <option value="{{ $pessoa_unidade->unidade->id }}">
                                        Unidade {{ $pessoa_unidade->unidade->nome }}
                                    </option>

                                @endforeach
                            </select>
                        @endif

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class='input-wrapper'>
                            <label for='orcamento_um'>
                                <i class="fas fa-upload"></i> Orçamento 1
                            </label>
                            <input id='orcamento_um' type='file' name='orcamento_um' accept="application/pdf" />
                            <span id='orcamento_label'></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class='input-wrapper'>
                            <label for='orcamento_dois'>
                                <i class="fas fa-upload"></i> Orçamento 2
                            </label>
                            <input id='orcamento_dois' type='file' />
                            <span id='orcamento_label_dois'></span>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class='input-wrapper'>
                            <label for='orcamento_tres'>
                                <i class="fas fa-upload"></i> Orçamento 3
                            </label>
                            <input id='orcamento_tres' type='file' />
                            <span id='orcamento_label_tres'></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Justificativa </label>
                        <textarea class="form-control" rows="3" name="justificativa"
                            placeholder="Qual sua  justificativa para a requisição"></textarea>
                    </div>
                    <div class="col-sm-6">
                        <label>observação </label>
                        <textarea class="form-control" rows="3" name="observacao"
                            placeholder="Possui alguma observação para incluir ?"></textarea>
                    </div>
                </div>


            </div>

            <hr>

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
                    '> </td>';
                listaRequisicao +=
                    '<td> <a href="#" class="btn btn-danger " ><i   class=" fas fa-trash"></i> </a> </td>';
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
        /// pegar nome do arquivo
        var $orcamentoUm = document.getElementById('orcamento_um'),
            $orcamentoLabel = document.getElementById('orcamento_label');

        $orcamentoUm.addEventListener('change', function() {
            $orcamentoLabel.textContent = this.value;
        });

        var $orcamentoDois = document.getElementById('orcamento_dois'),
            $orcamentoLabelDois = document.getElementById('orcamento_label_dois');

        $orcamentoDois.addEventListener('change', function() {
            $orcamentoLabelDois.textContent = this.value;
        });
        var $orcamentoTres = document.getElementById('orcamento_tres'),
            $orcamentoLabelTres = document.getElementById('orcamento_label_tres');

        $orcamentoTres.addEventListener('change', function() {
            $orcamentoLabelTres.textContent = this.value;
        });

    </script>

@endsection

@endsection
