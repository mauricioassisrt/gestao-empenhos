<body onload="window.print();">

    @section('content')
        <style>
            @media print {
                table {
                    page-break-inside: avoid;
                }
            }

        </style>
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
                                                                                  folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/css/skins/_all-skins.min.css">
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i><small class="pull-right"><strong>
                            </strong></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info col-sm-12">
                <div class="col-sm-1 invoice-col">
                    <address>
                        <img src="/{{ $empresa[0]->foto_caminho }}" width="100%" height="10%"><br />
                    </address>

                </div>
                <div class="col-sm-6 invoice-col">
                    <h4>

                        <strong> {{ $empresa[0]->nome_fantasia }}</strong><br> {{ $empresa[0]->endereco }},
                        Nº{{ $empresa[0]->numero }}<br>
                        CEP:{{ $empresa[0]->cep }}<br><br>
                        Fone:{{ $empresa[0]->contato }}<br>
                    </h4>

                </div>

            </div>

            <div class="row">


                @foreach ($requisicaos as $requisicao)
                <hr>
                <h2 class="text-center"> <strong>{{ $titulo }}
                </h2><br />
                <table class="table table-striped" style='background:#fff'>
                    <thead>
                        <th> Reduzido </th>
                        <th> Status </th>
                        <th> Orgão</th>
                        <th>Secretaria</th>
                        <th>Justificativa </th>
                        <th>Observação </th>

                    </thead>

                        <tbody>


                            <tr>

                                <td>
                                    @if ($requisicao->reduzido != null)
                                        {{ $requisicao->reduzido }}
                                    @else
                                        Requisição ainda não foi finalizada !!
                                    @endif
                                </td>
                                <td>
                                    {{ $requisicao->status }}
                                </td>
                                <td> {{ $requisicao->orgao }}</td>

                                <td>{{ $requisicao->secretaria }}</td>

                                <td>{{ $requisicao->justificativa }}</td>
                                <td>{{ $requisicao->observacao }}</td>

                            </tr>

                        </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <h2 class="text-center"> <strong>Produtos liberados
                    </h2><br />

                    <table class="table table-striped" style='background:#fff'>
                        <thead>
                            <th> Licitação </th>
                            <th> Produto</th>
                            <th>Valor Unitário do produto/item </th>
                            <th>Quantidade Solicitada </th>
                            <th>Valor total </th>

                        </thead>
                        <tbody>
                            @foreach ($requisicaoProdutos as $requisicaoProduto)
                                <tr>
                                    <td>
                                        @if ($requisicaoProduto->licitacao_produto_id === null)
                                            Sem licitação vinculada
                                        @else

                                            {!! $requisicaoProduto->numero_licitacao !!}
                                        @endif

                                    </td>
                                    <td>{!! $requisicaoProduto->produtos->nome !!}</td>

                                    <td>R${!! $requisicaoProduto->valor_total_iten / $requisicaoProduto->quantidade_produto !!}</td>

                                    <td>{!! $requisicaoProduto->quantidade_produto !!}</td>

                                    <td>R${!! $requisicaoProduto->valor_total_iten !!}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h3> R$ {{ $requisicao->valor_final }}</h3>

                    <p>Valor total da requisição</p>
                </div>
                <div class="col-sm-6">
                    <h3>{{ $requisicao->total_produtos }}</h3>

                    <p> Total de produtos</p>
                </div>
            </div>


            @endforeach
        </section>



    </body>
