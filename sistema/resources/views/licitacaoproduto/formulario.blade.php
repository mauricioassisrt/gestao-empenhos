@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href="/css/tempusdominus-bootstrap-4.min.css">
    <!-- toast CSS-->
    <link rel="stylesheet" href="/css/toastr.min.css">
    <link rel="stylesheet" href=" {{ asset('css/select2.min.css') }}" />

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
                            <input type="number" class="form-control" placeholder="Digite somente o ano " max="2099" disabled
                                min="2020" name="ano"  value="{{ $licitacao->ano }}"  required>

                        </div>
                        <div class="col-sm-2">
                            <label>N° da licitação </label>
                            <input type="number" class="form-control" id="numero_licitacao" placeholder="Exemplo 405 " disabled
                                max="9999" min="1" name="numero_licitacao" value="{{ $licitacao->numero_licitacao }}"  required>

                        </div>
                        <div class="col-sm-4">
                            <label>Pregão</label>
                            <input type="text" class="form-control" id="pregao" placeholder="Exmplo 406/2021 " max="10" disabled
                                min="2" name="pregao" value="{{ $licitacao->pregao }}"  required>

                        </div>
                        <div class="col-sm-4">
                            <label>Modalidade</label>
                            <select class="form-control" name="modalidade" id="modalidade" disabled>
                                <option value="{{ $licitacao->modalidade }}"
                                    selected="selected">

                                        {{ $licitacao->modalidade }}
                                </option>

                            </select>

                        </div>
                    </div>

                </div>

            </div>
            <hr>

            <div class="row" id="divProdutos">
                <div class="col-sm-12">
                    <label>Fornecedor </label>
                    <select name="fornecedor_id" class="form-control select2" style="width: 100%;">
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

            <a href="{{ url('licitacao/vincular') }}" class="btn btn-primary">

                <i class="fas fa-arrow-left"></i> Voltar  </a>
            @if (Request::is('*/editar/*'))

                <button type="submit" class="btn btn-success" id="botaoSalvarUser" style="display:none"> <i
                        class=" fas fa-pen-alt"></i> Alterar</button>

            @else

                <a href="javascript:" class="btn btn-primary" id="voltarProdutos" style="display:none">

                    <i class="fas fa-arrow-left"></i> Produtos </a>

                <a href="javascript:" class="btn btn-primary" id="irParaLista">

                   Ir para lista de itens   <i class="fas fa-arrow-right"></i></a>
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

    <script src="{{ asset('js/select2.full.min.js') }}"></script>


    <script>
        @if(session('status'))
        toastr.success(  "{{ session()->get('status') }}" );

        @endif
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
