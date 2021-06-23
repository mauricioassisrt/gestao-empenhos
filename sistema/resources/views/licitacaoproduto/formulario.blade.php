@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- toast CSS-->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/select2.min.css') }}" />
    <!--Select2 -->
    <link rel="stylesheet" href=" {{ asset('css/select2-bootstrap4.min.css') }}" />

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
                {!! Form::model($licitacaoProduto, ['method' => 'PATCH', 'url' => 'licitacao.vincular.update' . $licitacaoProduto->id]) !!}
            @else
                {!! Form::open(['route' => 'licitacao.vincular.insert']) !!}
            @endif
            <div class="row">

                <div class="col-sm-12">

                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fas fa-info"></i><b>Atenção!</b> </h4>
                        1° Escolha o fornecedor que ganhou determinados itens da licitação <br>
                        2° Escolha a categoria desejada, após isso selecione os produtos e suas quantidades <br>
                        3º Depois é só finalizar e após isso continuar montando a licitação com outro fornecedor
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <input type="hidden" name="licitacao_id" value="{{ $licitacao->id }}" />
                            <label>Ano da licitação </label>
                            <input type="number" class="form-control" placeholder="Digite somente o ano " max="2099"
                                disabled min="2020" name="ano" value="{{ $licitacao->ano }}" required>

                        </div>
                        <div class="col-sm-2">
                            <label>N° da licitação </label>
                            <input type="number" class="form-control" id="numero_licitacao" placeholder="Exemplo 405 "
                                disabled max="9999" min="1" name="numero_licitacao"
                                value="{{ $licitacao->numero_licitacao }}" required>

                        </div>
                        <div class="col-sm-4">
                            <label>Pregão</label>
                            <input type="text" class="form-control" id="pregao" placeholder="Exmplo 406/2021 " max="10"
                                disabled min="2" name="pregao" value="{{ $licitacao->pregao }}" required>

                        </div>
                        <div class="col-sm-4">
                            <label>Modalidade</label>
                            <select class="form-control" name="modalidade" id="modalidade" disabled>
                                <option value="{{ $licitacao->modalidade }}" selected="selected">

                                    {{ $licitacao->modalidade }}
                                </option>

                            </select>

                        </div>
                    </div>

                </div>

            </div>
            <hr>

            <div class="row">
                <div class="col-sm-12">
                    <label>Fornecedor </label>
                    <select name="fornecedor_id" class="form-control fornecedor" style="width: 100%;" required>
                        @if (Request::is('*/editar/*'))
                            <option value="{{ $licitacaoProduto->fornecedor->id }}">
                                {{ $licitacaoProduto->fornecedor->nome_fornecedor }}
                            </option>
                            @foreach ($fornecedors as $fornecedor)
                                @if ($licitacaoProduto->fornecedor->id != $fornecedor->id)
                                    <option value="{{ $fornecedor->id }}">
                                        {{ $fornecedor->nome_fornecedor }}
                                    </option>
                                @endif

                            @endforeach
                        @else
                            <option> </option>
                            @foreach ($fornecedors as $fornecedor)
                                <option value="{{ $fornecedor->id }}">
                                    {{ $fornecedor->nome_fornecedor }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-sm-12">
                    <label>Selecione uma categoria para exibir os itens </label>
                    <select name="categoria_id" class="form-control categoria" style="width: 100%;" id="getCategoria" required>
                        <option> </option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nome_categoria }}
                            </option>
                        @endforeach

                    </select>
                    <br>
                </div>
                <div class="col-sm-12" id="divProdutos">

                    <div class="card-body table-responsive p-0">

                        <input id="pesquisar" type="text" placeholder="Pesquise determinados produtos"
                            class="form-control form-control" style='display: none'>

                        <table class="table table-hover" id="tabela_produtos">


                        </table>
                    </div>


                </div>

            </div>
            <div class="row" id="divItens" style="display:none">
                <div class="col-sm-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover" id="tabela_itens">

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer clearfix">

            <a href="{{ route('licitacao.vincular.edit',['licitacaoProduto' => $licitacao->id])}}" class="btn btn-primary ">

                <i class="fas fa-arrow-left"></i> Voltar </a>
            @if (Request::is('*/editar/*'))

                <button type="submit" class="btn btn-success float-right" id="botaoSalvarUser" style="display:none"> <i
                        class=" fas fa-pen-alt"></i> Alterar</button>

            @else


                <a href="javascript:" class="btn btn-primary float-right" id="irParaLista">

                    Ir para lista de itens <i class="fas fa-arrow-right"></i>
                </a>
                <a href="javascript:" class="btn btn-primary float-right" id="voltarProdutos" style="display:none">

                    <i class="fas fa-arrow-left"></i> Produtos
                </a>

                {{-- <button type="submit" class="btn btn-success float-right" id="resumo" style="display:none"> <i
                        class=" fas fa-pen-alt"></i> Resumo da requisição </button> --}}

                <a href="" class="btn btn-success " data-toggle="modal" data-target="#modal-confirmar" id="resumo"
                    style="display:none"><span class="glyphicon glyphicon-remove"><i class=" fas fa-plus"></i>  Adicionar
                         </a>


                <div class="modal fade" id="modal-confirmar" style="display: none;" tabindex='-1' aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="fas fa-exclamation-triangle"></i>Atenção </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>Tem certeza que deseja adicionar os itens a licitação  ?!
                                </h4>
                            </div>
                            <div class="modal-footer justify-content-between">

                                <a href="" class="btn btn-primary" data-dismiss="modal">
                                    <i class="fas fa-times-circle" data-dismiss="modal"></i>
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-success float-right" id="resumo"> <i
                                        class=" fas fa-pen-alt"></i> Finalizar </button>

                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
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
        $('.fornecedor').select2({
            placeholder: "Selecione um fornecedor "
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
                '    <thead>    <th>Produto </th> <th>Valor unitario </th><th>Quantidade Uni/KG</th></thead></thead>';

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
