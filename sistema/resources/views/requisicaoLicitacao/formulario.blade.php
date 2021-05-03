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

                {!! Form::model($requisicao, ['method' => 'PATCH', 'url' => 'requisicao/update/' . $requisicao->id, 'enctype' => 'multipart/form-data']) !!}

            @else
                <form action="{{ url('requisicaoComLicitacao/insert') }}" method="post" enctype="multipart/form-data">

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
                        @if (Gate::allows('minhas_requisicoes'))
                            <label>Pessoa e suas unidades </label>
                            <select name="unidade_id" class="form-control unidade" style="width: 100%;" required>
                                <option> </option>
                                @foreach ($pessoa_unidades as $pessoa_unidade)
                                    @if ($pessoa_unidade->pessoa->users->id === Auth::user()->id)
                                        <option value="{{ $pessoa_unidade->unidade->id }}">
                                            UNIDADE: {{ $pessoa_unidade->unidade->nome }}
                                        </option>
                                    @endif


                                @endforeach

                            </select>
                        @else
                            <label>Pessoa e suas unidades </label>
                            <select name="unidade_id" class="form-control unidade" style="width: 100%;" required>
                                <option> </option>
                                @foreach ($pessoa_unidades as $pessoa_unidade)

                                    <option value="{{ $pessoa_unidade->unidade->id }}">
                                        UNIDADE: {{ $pessoa_unidade->unidade->nome }}
                                    </option>

                                @endforeach
                            </select>
                        @endif


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
            <div class="  callout callout-success ">
                <h5><b>Vamos escolher os produtos da requisição ? !!!</b> </h5>

                <p> Basta informar a quantidade somente para montar a requisição </p>
            </div>
            <div class="row" id="divProdutos">
                <div class="col-sm-12">
                    <label>Selecione uma categoria para exibir os itens </label>
                    <select name="licitacao_id" class="form-control licitacao" style="width: 100%;" id="licitacao_id" required>
                        <option> </option>
                        @foreach ($licitacaos as $licitacao)
                            <option value="{{ $licitacao->id }}">
                                Número da Licitacação {{ $licitacao->ano }}/{{ $licitacao->numero_licitacao }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="col-sm-12">
                    <br>
                    <input id="pesquisar" type="text" placeholder="Pesquise determinados produtos"
                    class="form-control form-control" style='display: none'>

                    <div class="card-body table-responsive p-0">
                        <table class="table  table-hover" id="tabela_produtos">

                        </table>
                    </div>


                </div>

            </div>
            <div class="row" id="divItens" style="display:none">
                <div class="col-sm-12">
                    <div class="card-body table-responsive p-0">
                        <table class="table  table-hover" id="tabela_itens">

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
        // Configuracao select2
        $('.licitacao').select2({
            placeholder: "Selecione uma licitação  "
        });
        $('.unidade').select2({
            placeholder: "Selecione uma unidade/orgão  "
        });
        // fim da config

        var listaRequisicao = [];
        var lista = '';
        var listaIdProdutos = [];
        var listaProdutosNova = [];
        $('#licitacao_id').on('change', function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                {{-- API --}}
                url: "{{ url('requisicaoComLicitacao/getLicitacao') }}",
                method: "POST",
                data: {
                    licitacao_id: $("#licitacao_id").val(),

                },
                success: function(result) {

                    if (result.success) {
                        $("#tabela_produtos").empty()
                        {{-- Monta a tabela com base no resultado --}}
                        lista =
                            '<thead> <th>Código</th>   <th>Produto </th><th>Valor Unitario </th> </thead><tbody>';
                        $.each(result.produtos, function(key, value) {
                            {{-- add no TR um class para pegar o atributo do id do produto --}}
                            lista += '<tr >';
                            lista += '<td  class="id">' + value.produto_id + '</td>';
                            lista += '<td >' + value.nome + '</td>';
                            lista += '<td> R$' +value.valor_total_iten / value.quantidade_produto + '</td>';
                            lista +=
                                '<td> <a class="btn btn-success adicionar"  href="javascript:"  ><i   class=" fas fa-plus"></i> </a>  </td>';
                            lista += '</tr>';
                        });
                        {{-- add na tabela --}}
                        $("#pesquisar").show();
                        $('#tabela_produtos').append(lista);
                        {{-- limpo a lista --}}
                        lista = '';
                        {{-- ao clicar na row --}}
                        $('.adicionar').click(function(e) {
                             // pega o value do id da linha da tabela (TR)
                             var idProduto = $(this).closest("tr").find(".id").text();
                             //verifica se o ID do produto já está na lista
                            $.each(result.produtos, function(key, value) {
                                {{-- faz uma comparação do id do produto pegado no click do mouse com o do resultado do get da api caso sejam igual ele add --}}
                                if (idProduto == value.produto_id) {
                                    listaIdProdutos.push(value);
                                    toastr.success("Produto adicionado na requisição");
                                }

                            });

                            idProduto = "";
                        });

                    } else {
                        {{-- se a busca retornar como vazia retorna essa msg --}}
                        toastr.error(
                            "Está licitação ainda não contém produtos vinculados, vá até o menu ->licitação->vincular produtos e faça o vinculo !"
                        );
                        //
                    }
                }
            });
        });
        $('#irParaLista').click(function(e) {

            $("#divProdutos").hide();
            $("#divItens").show();
            $("#tabela_itens").empty()
            {{-- percorre a lista que foi add com os click do usuario --}}
            $.each(listaIdProdutos, function(i, e) {
                {{-- verifica se não tem itens repetidos --}}
                var matchingItems = $.grep(listaProdutosNova, function(item) {
                    return item.produto_id == e.produto_id;
                });
                if (matchingItems.length == 0) {
                    listaProdutosNova.push(e);
                }
            });
            {{-- preenche na view a nova table com os produtos escolhidos --}}
            listaRequisicao = '<thead> <th ><p style="display:none">Código</p></th>  <th>Produto</th>   <th>Categoria </th><th>Valor Unitario </th><th>Quantidade </th>  </thead><tbody>';
            $.each(listaProdutosNova, function(key, value) {

                listaRequisicao += '<tr class="del">';
                listaRequisicao += '<td ><p style="display:none">' + key + '</p></td>';

                listaRequisicao += '<td >' + value.nome + '</td>';
                listaRequisicao += '<td >' + value.nome_categoria + '</td>';
                listaRequisicao += '<td><input type="hidden" name="valor_unitario[]" value=' + value.valor_total_iten / value.quantidade_produto  + ' /> <input type="hidden" name="licitacao_id[]" value=' + value.licitacao_id  + ' />R$' + value.valor_total_iten / value.quantidade_produto + ' <input type="hidden" name="produto_id[]" value=' + value.produto_id +' /><input type="hidden" name="licitacao_id[]" value=' + value.licitacao_id + '></td>';
                listaRequisicao += '<td>  <input type="number" placeholder="Quantidade desejada" required name="quantidadeItens[]" class=" form-control form-control-border"> </td>';
                listaRequisicao +=   '<td> <a href="#" class="btn btn-danger " ><i   class=" fas fa-trash"></i> </a> </td>';
                listaRequisicao += '</tr>';

            });
            {{-- add na view --}}
            $('#tabela_itens').append(listaRequisicao);
            {{-- fecha a div e a tabela anterior para abria  nova --}}
            $("#irParaLista").hide();
            $("#resumo").show();
            $("#voltarProdutos").show();

            listaRequisicao = '';

            {{-- função para remoção de itens da lista --}}
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

        {{-- função voltar produtos --}}
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
