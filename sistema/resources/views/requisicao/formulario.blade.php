@extends('adminapp')
@section('topo')


    <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- toast CSS-->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/select2.min.css') }}" />
    <!--Select2 -->
    <link rel="stylesheet" href=" {{ asset('css/select2-bootstrap4.min.css') }}" />

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
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
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
                            <select name="unidade_id" class="form-control unidade" style="width: 100%;">

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
                            <select name="unidade_id" class="form-control unidade" style="width: 100%;">

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
                            <input id='orcamento_um' class="  @if ($errors->has('orcamento_um')) is-invalid @endif" type='file' name='orcamento_um'
                            accept="application/pdf" />
                            <span id='orcamento_label'></span>

                            @if ($errors->has('orcamento_um'))
                                <span class="text-danger">{{ $errors->first('orcamento_um') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class='input-wrapper'>
                            <label for='orcamento_dois'>
                                <i class="fas fa-upload"></i> Orçamento 2
                            </label>
                            <input id='orcamento_dois' type='file' accept="application/pdf" />
                            <span id='orcamento_label_dois'></span>
                        </div>

                    </div>
                    <div class="col-sm-4">
                        <div class='input-wrapper'>
                            <label for='orcamento_tres'>
                                <i class="fas fa-upload"></i> Orçamento 3
                            </label>
                            <input id='orcamento_tres' type='file' accept="application/pdf" />
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
                    <select name="categoria_id" class="form-control categoria" style="width: 100%;" id="getCategoria">

                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nome_categoria }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="col-sm-12">

                    <div class="card-body table-responsive p-0">
                        <br>
                        <input id="pesquisar" type="text" placeholder="Pesquise determinados produtos"
                            class="form-control form-control" style='display: none'>

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
    <!-- SELECT2 -->
    <script src="{{ asset('js/select2.full.min.js') }}"></script>


    <script>
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

        var data = '';
        var listaRequisicao = [];
        var lista = '';
        var listaIdProdutos = [];
        var listaProdutosNova = [];

        //toast alert
        @if (session('status'))
            toastr.success( "{{ session()->get('status') }}" );

        @endif
        //fim do toas

        // Configuracao select2
        $('.categoria').select2({
            placeholder: "Selecione uma categoria "
        });
        $('.unidade').select2({
            placeholder: "Selecione um orgão/unidade "
        });
        // fim da config

        //ao clicar em uma categoria
        $('#getCategoria').on('change', function() {
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
                    /// caso retorne success
                    if (result.success) {
                        $("#tabela_produtos").empty();
                        lista =
                            '<thead> <th>Código</th>   <th>Produto </th> </thead><tbody>';
                        $.each(result.produtos, function(key, value) {
                            lista += '<tr >';
                            lista += '<td  class="id">' + value.id + '</td>';
                            lista += '<td >' + value.nome + '</td>';
                            lista +=
                                '<td class=""> <a class="btn btn-success adicionar"  href="javascript:"  ><i   class=" fas fa-plus"></i> </a>  </td>';
                            lista += '</tr>';
                        });
                        //exibe a pesquisa
                        $("#pesquisar").show();
                        $('#tabela_produtos').append(lista);

                        lista = '';
                        //ao clicar no botão verde add
                        $('.adicionar').click(function(e) {
                            // pega o value do id da linha da tabela (TR)
                            var idProduto = $(this).closest("tr").find(".id").text();
                            //verifica se o ID do produto já está na lista
                            $.each(result.produtos, function(key, value) {
                                if (idProduto == value.id) {
                                    listaIdProdutos.push(value);
                                    toastr.success("Produto adicionado na listagem");
                                }
                            });
                            //inicializa a variavel
                            idProduto = "";
                        });
                    } else {
                        //caso não encontre nenhum produto na categoria

                        lista = '';
                        toastr.error("Esta categoria não possui nenhum produto cadastrado!!!");
                    }
                }
            });
        });
        //ao clicar em ir para lista
        $('#irParaLista').click(function(e) {
            //fecha as divs limpa a tabela de itens
            $("#divProdutos").hide();
            $("#divItens").show();
            //limpa a tabela
            $("#tabela_itens").empty()
            //foreach para comparar se foi add algum item repatido caso seja add remove
            $.each(listaIdProdutos, function(i, e) {
                var matchingItems = $.grep(listaProdutosNova, function(item) {
                    return item.id === e.id;
                });
                if (matchingItems.length === 0) {
                    listaProdutosNova.push(e);
                }
            });
            //cria o cabeçalho da pagina
            listaRequisicao =
                '    <thead>    <th>Produto </th> <th>Menor valor Orçado  </th><th>Quantidade </th></thead></thead>';

            //add as linhas na tabela
            $.each(listaProdutosNova, function(key, value) {
                listaRequisicao += '<tr class="del">';
                listaRequisicao += '<td >' + value.nome + '</td>';
                listaRequisicao +=
                    '<td>  <input type="number" step=0.01 required name="valorUnitario[]" class=" form-control form-control-border"> </td>';
                listaRequisicao += '<td> <input type="hidden" name="produto_id[]" value=' + value.id +
                    ' /> <input type="number" required name="quantidadeItens[]" class=" form-control form-control-border"> </td>';
                listaRequisicao +=
                    '<td> <a href="#" class="btn btn-danger " ><i   class=" fas fa-trash"></i> </a> </td>';
                listaRequisicao += '</tr>';

            });

            $('#tabela_itens').append(listaRequisicao);
            //oculta o botao
            $("#irParaLista").hide();
            //exibe o botão resumo da requisicao
            $("#resumo").show();
            //exibe o botão voltar a escolher produtos
            $("#voltarProdutos").show();

            listaRequisicao = '';
            // funcao para remover um itenm ao clicar no excluir
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
        //botao voltar produtos
        $('#voltarProdutos').click(function(e) {
            $("#divProdutos").show();
            $("#divItens").hide();
            $("#resumo").hide();
            $("#irParaLista").show();
            $("#voltarProdutos").hide();

        });
        //funcao para pesquisar na tabela
        $(document).ready(function() {
            $("#pesquisar").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tabela_produtos tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>

@endsection

@endsection
