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


            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill"
                        href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home"
                        aria-selected="true">Detalhes da requisição</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill"
                        href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile"
                        aria-selected="false">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill"
                        href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages"
                        aria-selected="false">Andamentos</a>
                </li>

            </ul>

            <div class="tab-content" id="custom-content-above-tabContent">
                <div class="tab-pane fade active show" id="custom-content-above-home" role="tabpanel">
                    @csrf
                    <div class="row">
                        <div class="col-sm-1 ">
                            <label>Código</label>
                            <input type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->id }}" @endif disabled>

                        </div>
                        <div class="col-sm-2">
                            <label>Requisição</label>
                            <input type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->requisicao_ano }}" @endif
                                disabled>

                        </div>
                        <div class="col-sm-9">

                            <label>Unidade na qual fez a requisição </label>
                            <input disabled type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->pessoaUnidade->pessoa->name }}" @endif disabled>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Justificativa </label>
                            <textarea class="form-control" rows="3" required
                                name="justificativa">@if (Request::is('*/editar/*')) {{ $requisicao->justificativa }} @endif</textarea>
                        </div>
                        <div class="col-sm-6">
                            <label>Observação </label>
                            <textarea class="form-control" rows="3" required
                                name="observacao"> @if (Request::is('*/editar/*')) {{ $requisicao->observacao }} @endif</textarea>

                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel">
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $requisicao->total_produtos }}</h3>

                                    <p> Total de produtos</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3> R$ {{ $requisicao->valor_final }}</h3>

                                    <p>Valor total da requisição</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card-body table-responsive p-0">
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
                                            @if ($requisicaoProduto->licitacao_produto_id ===null)
                                            Sem licitação vinculada
                                            @else

                                            {!! $requisicaoProduto->numero_licitacao !!}
                                            @endif

                                        </td>
                                        <td>{!! $requisicaoProduto->produtos->nome !!}</td>

                                        <td>R${!! $requisicaoProduto->produtos->valor_unitario !!}</td>

                                        <td>{!! $requisicaoProduto->quantidade_produto !!}</td>

                                        <td>R${!! $requisicaoProduto->valor_total_iten !!}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel" cc </div>

                </div>
            </div>
        </div>
        <div class="card-footer clearfix">

        </div>
        {!! Form::close() !!}

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



    @endsection

@endsection
