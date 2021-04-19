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
                        <select name="unidade_id" class="form-control select2" style="width: 100%;" required>

                                @foreach ($pessoa_unidades as $pessoa_unidade)
                                @if ($pessoa_unidade->pessoa->users->id === Auth::user()->id)
                                    <option value="{{ $pessoa_unidade->unidade->id }}">
                                        UNIDADE: {{ $pessoa_unidade->unidade->nome }} - PESSOA:
                                        {{ $pessoa_unidade->pessoa->name }}
                                    </option>
                                @endif


                            @endforeach

                        </select>
                        @else
                        <label>Pessoa e suas unidades </label>
                        <select name="unidade_id" class="form-control select2" style="width: 100%;">

                            @foreach ($pessoa_unidades as $pessoa_unidade)

                                <option value="{{ $pessoa_unidade->unidade->id }}">
                                    UNIDADE: {{ $pessoa_unidade->unidade->nome }} - PESSOA:
                                    {{ $pessoa_unidade->pessoa->name }}
                                </option>

                            @endforeach
                        </select>
                        @endif


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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                {{--  API  --}}
                url: "{{ url('requisicaoComLicitacao/getLicitacao') }}",
                method: "POST",
                data: {
                    licitacao_id: $("#licitacao_id").val(),

                },
                success: function(result) {

                    if (result.success) {
                        $("#tabela_produtos").empty()
                        {{--  Monta a tabela com base no resultado  --}}
                        $.each(result.produtos, function(key, value) {
                            {{--  add no TR um class para pegar o atributo do id do produto  --}}
                            lista += '<tr class="adicionar">';
                            lista += '<td >' + value.produto_id + '</td>';
                            lista += '<td >' + value.lote + '</td>';
                            lista += '<td >' + value.nome + '</td>';
                            lista += '<td> R$' + value.valor_unitario + '</td>';
                            lista +=
                                '<td> <a class="btn btn-success "  href="javascript:"  ><i   class=" fas fa-plus"></i> </a>  </td>';
                            lista += '</tr>';
                        });
                        {{--  add na tabela   --}}
                        $('#tabela_produtos').append(lista);
                        {{--  limpo a lista   --}}
                        lista = '';
                        {{--  ao clicar na row   --}}
                        $('.adicionar').click(function(e) {
                            {{--  pega o id do produto ao clicar na linha atraves do td:eq, 0 é a posição   --}}
                            var idProduto = $(this).find('td:eq(0)').text();

                            $.each(result.produtos, function(key, value) {
                                {{--  faz uma comparação do id do produto pegado no click do mouse com o do resultado do get da api caso sejam igual ele add  --}}
                                if (idProduto == value.produto_id ) {
                                    listaIdProdutos.push(value);
                                    toastr.success("Produto adicionado na requisição");
                                }

                            });

                            idProduto = "";
                        });

                    } else {
                        {{--  se a busca retornar como vazia retorna essa msg  --}}
                        toastr.error("Está licitação ainda não contém produtos vinculados, vá até o menu ->licitação->vincular produtos e faça o vinculo !");
                        //
                    }
                }
            });
        });
        $('#irParaLista').click(function(e) {

            $("#divProdutos").hide();
            $("#divItens").show();
            $("#tabela_itens").empty()
            {{--  percorre a lista que foi add com os click do usuario   --}}
            $.each(listaIdProdutos, function(i, e) {
                {{--  verifica se não tem itens repetidos  --}}
               var matchingItems = $.grep(listaProdutosNova, function(item) {
                    return item.produto_id === e.produto_id;
                });
                if (matchingItems.length === 0) {
                    listaProdutosNova.push(e);
                }
            });
            {{--  preenche na view a nova table com os produtos escolhidos   --}}
            $.each(listaProdutosNova, function(key, value) {

                listaRequisicao += '<tr class="del">';
                listaRequisicao += '<td ><p style="display:none">' + key + '</p></td>';
                listaRequisicao += '<td >' + value.lote + '</td>';
                listaRequisicao += '<td >' + value.nome + '</td>';
                listaRequisicao += '<td >' + value.nome_categoria + '</td>';
                listaRequisicao += '<td>R$' + value.valor_unitario + '</td>';
                listaRequisicao += '<td> <input type="hidden" name="produto_id[]" value=' + value.produto_id  +
                    ' /> <input type="hidden" name="licitacao_id[]" value=' + value.licitacao_id  +
                    ' /><input type="number" placeholder="Quantidade desejada" required name="quantidadeItens[]" class=" form-control form-control-border" @if (Request::is(' *
                    /editar/ *
                    ')) value="{{  }}" @endif> </td>';
                listaRequisicao += '<td> <a href="#" class="btn btn-danger " ><i   class=" fas fa-trash"></i> </a> </td>';
                listaRequisicao += '</tr>';

            });
            {{--  add na view  --}}
            $('#tabela_itens').append(listaRequisicao);
            {{--  fecha a div e a tabela anterior para abria  nova  --}}
            $("#irParaLista").hide();
            $("#resumo").show();
            $("#voltarProdutos").show();

            listaRequisicao = '';

            {{--  função para remoção de itens da lista   --}}
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

        {{--  função voltar produtos   --}}
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
