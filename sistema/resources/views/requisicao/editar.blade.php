@extends('adminapp')
@section('topo')
<!-- DATA TIME PICKER Style -->

<link rel="stylesheet" href=" {{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
<!-- toast CSS-->
<link rel="stylesheet" href=" {{ asset('css/toastr.min.css') }}">
<!-- SELECT -->
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

        {!! Form::model($requisicao, ['method' => 'PATCH', 'url' => 'requisicao/update/' . $requisicao->id, 'enctype' => 'multipart/form-data']) !!}

        @else
        <form action="{{ url('requisicao/insert') }}" method="post" enctype="multipart/form-data">

            @endif


            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Detalhes da requisição</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Produtos</a>
                </li>
                @can('ver_reduzido')
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-messages-tab" data-toggle="pill" href="#custom-content-above-messages" role="tab" aria-controls="custom-content-above-messages" aria-selected="false">Andamentos</a>
                </li>
                @endcan
                @can('finalizar_requisicao')
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-above-empenho-tab" data-toggle="pill" href="#custom-content-above-empenho" role="tab" aria-controls="custom-content-above-empenho" aria-selected="false">Empenho</a>
                </li>
                @endcan

            </ul>

            <div class="tab-content" id="custom-content-above-tabContent">
                <div class="tab-pane fade active show" id="custom-content-above-home" role="tabpanel">
                    @csrf
                    <div class="row">
                        <div class="col-sm-1 ">
                            <label>Código</label>
                            <input type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->id }}" @endif disabled>

                        </div>
                        <div class="col-sm-3">
                            <label>Requisição</label>
                            <input type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->requisicao_ano }}" @endif disabled>

                        </div>

                        <div class="col-sm-4">

                            <label>Secretaria </label>
                            <input disabled type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->unidades->secretaria->nome }}" @endif disabled>

                        </div>
                        <div class="col-sm-4">

                            <label>Unidade na qual fez a requisição </label>
                            <input disabled type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->unidades->nome }}" @endif disabled>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Justificativa </label>
                            <textarea class="form-control" rows="3" required name="justificativa">@if (Request::is('*/editar/*')) {{ $requisicao->justificativa }} @endif</textarea>
                        </div>
                        <div class="col-sm-6">
                            <label>Observação </label>
                            <textarea class="form-control" rows="3" required name="observacao"> @if (Request::is('*/editar/*')) {{ $requisicao->observacao }} @endif</textarea>

                        </div>

                    </div>
                </div>
                <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel">
                    <br>
                    <div class="row">


                        <div class="col-sm-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3> {{ $quantidade_total }}</h3>

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
                                    <h3> R$ {{number_format($valor_total, 2)  }}</h3>

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
                                <th> Licitação Nº </th>
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

                                        Nº {!! $requisicaoProduto->numero_licitacao !!}
                                        @endif

                                    </td>
                                    <td>{!! $requisicaoProduto->produtos->nome !!}</td>

                                    <td>R${{ number_format($requisicaoProduto->valor_total_iten / $requisicaoProduto->quantidade_produto , 2)  }} </td>

                                    <td>{!! $requisicaoProduto->quantidade_produto !!}</td>

                                    <td>R${!! number_format( $requisicaoProduto->valor_total_iten, 2) !!}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                @can('ver_reduzido')
                <div class="tab-pane fade" id="custom-content-above-messages" role="tabpanel">
                    {!! Form::model($requisicao, ['method' => 'PATCH', 'url' => 'requisicao/update/' . $requisicao->id]) !!}
                    @csrf
                    <div class="row">

                        <div class="col-sm-3">

                            <label>Secretaria </label>
                            <input disabled type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->unidades->secretaria->nome }}" @endif disabled>

                        </div>
                        <div class="col-sm-3">

                            <label>Código/Orgão-unidade</label>
                            <select name="orgao" id="" class="form-control unidade" @if (Request::is('*/editar/*')) value="{{ $requisicao->orgao }}" @endif>
                                <option @if (Request::is('*/editar/*')) value="{{ $requisicao->orgao }}" @endif>{{ $requisicao->orgao }}</option>
                                @foreach ($unidades as $unidade)

                                <option value="{{ $unidade->codigo }}/{{ $unidade->nome }}">
                                    {{ $unidade->codigo }}/{{ $unidade->nome }}
                                </option>



                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-6">

                            <label>Reduzido </label>
                            <input type="text" name="reduzido" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->reduzido }}" @endif>

                        </div>
                    </div>
                    @can('atualizar_reduzido')
                    @if ($requisicao->status != 'Finalizado')
                    <div class="row">
                        <div class="col-sm-12">

                            <label>Enviar para empenho? </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="Empenho" @if ($requisicao->status == 'Empenho') checked="" @endif>
                                <label class="form-check-label">Sim</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" @if ($requisicao->status == 'Contabilidade') checked="" @endif value="Contabilidade">
                                <label class="form-check-label">Não</label>
                            </div>


                        </div>
                    </div>


                    <hr>



                    <div class="row">

                        <div class="col-sm-4">

                            <button type="submit" class="btn btn-success ">
                                <i class=" fas fa-check-square"></i> Atualizar reduzido </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    @endif
                    @endcan
                </div>
                @endcan
                @can('finalizar_requisicao')
                <div class="tab-pane fade" id="custom-content-above-empenho" role="tabpanel">
                    @if ($requisicao->status != 'Contabilidade')
                    {!! Form::model($requisicao, ['method' => 'PATCH', 'url' => 'requisicao/update/' . $requisicao->id]) !!}
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">

                            <label>Finalizar a requisição? </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="Finalizado" @if ($requisicao->status == 'Finalizado') checked="" @endif>
                                <label class="form-check-label">Sim</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" @if ($requisicao->status == 'Empenho') checked="" @endif value="Empenho">
                                <label class="form-check-label">Não</label>
                            </div>


                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-4">

                            <button type="submit" class="btn btn-primary">
                                <i class=" fas fa-save"></i> Finalizar </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    @else
                    <br>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
                        A requisição para ser finaliza é necessário a contabilidade realizar o encaminhamento ! <br>
                        Para isso acessar a requisição e ir até a aba andamentos, e marcar a opção SIM, em enviar para
                        empenho
                    </div>
                    @endif
                </div>
                @endcan

            </div>
    </div>
    <div class="card-footer clearfix">
        <a href="{{ url('/requisicao') }}" class="btn btn-primary">

            <i class="fas fa-arrow-left"></i> Voltar </a>
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
    <!-- SELECT2 -->
    <script src="{{ asset('js/select2.full.min.js') }}"></script>


    <script>
        // Configuracao select2
        $('.unidade').select2({
            placeholder: "Selecione uma unidade "
        });

    </script>
    @endsection

    @endsection
