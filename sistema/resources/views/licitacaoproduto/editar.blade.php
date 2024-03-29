@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href=" {{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- toast CSS-->
    <link rel="stylesheet" href=" {{ asset('css/toastr.min.css') }}">
    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">

            <!-- /.box-header -->



            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link " id="custom-content-above-home-tab" data-toggle="pill"
                        href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home"
                        aria-selected="true">Detalhes da licitação</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-above-profile-tab" data-toggle="pill"
                        href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile"
                        aria-selected="false">Produtos</a>
                </li>


            </ul>

            <div class="tab-content" id="custom-content-above-tabContent">

                <div class="tab-pane fade " id="custom-content-above-home" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-2">
                            <label>Ano da licitação </label>
                            <input type="number" class="form-control" placeholder="Digite somente o ano " max="2099"
                                disabled min="2020" name="ano" @if (Request::is('*/editar/*')) value="{{ $licitacaoProduto->ano }}" @endif required>

                        </div>
                        <div class="col-sm-2">
                            <label>N° da licitação </label>
                            <input type="number" class="form-control" id="numero_licitacao" placeholder="Exemplo 405 "
                                disabled max="9999" min="1" name="numero_licitacao" @if (Request::is('*/editar/*')) value="{{ $licitacaoProduto->numero_licitacao }}" @endif
                                required>

                        </div>
                        <div class="col-sm-4">
                            <label>Pregão</label>
                            <input type="text" class="form-control" id="pregao" placeholder="Exmplo 406/2021 " max="10"
                                disabled min="2" name="pregao" @if (Request::is('*/editar/*')) value="{{ $licitacaoProduto->pregao }}" @endif required>

                        </div>
                        <div class="col-sm-4">
                            <label>Modalidade</label>
                            <select class="form-control" name="modalidade" id="modalidade" disabled>
                                <option @if (Request::is('*/editar/*')) value="{{ $licitacaoProduto->modalidade }}" @endif
                                    selected="selected">
                                    @if (Request::is('*/editar/*'))
                                        {{ $licitacaoProduto->modalidade }}@endif
                                </option>

                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Pregoeiro </label>
                            <input type="text" class="form-control" placeholder="Digite somente o ano " max="4" min="4"
                                name="pregoeiro" @if (Request::is('*/editar/*')) value="{{ $licitacaoProduto->pregoeiro }}" @endif
                                disabled>

                        </div>
                        <div class="col-sm-4">
                            <label>Fonte do Recurso </label>
                            <input type="numeric" class="form-control" placeholder="Exemplo 405 " max="10" min="1"
                                name="fonte_recurso" @if (Request::is('*/editar/*')) value="{{ $licitacaoProduto->fonte_recurso }}" @endif
                                required disabled>

                        </div>
                        <div class="col-sm-4">
                            <label>Reduzido</label>
                            <input type="text" class="form-control" name="reduzido" @if (Request::is('*/editar/*')) value="{{ $licitacaoProduto->reduzido }}" @endif
                                required disabled>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active show" id="custom-content-above-profile" role="tabpanel">
                    @if (Session::has('message'))



                           <div id="msg"  class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Atenção!</h5>
                            <p>{{ Session::get('message') }}</p>
                        </div>

                           @endif
                    <br>
                    @if ($licitacaoProdutos->isEmpty())

                            <div class="alert alert-warning alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-exclamation-triangle"></i> Atenção!</h5>
                                A licitação não possui produtos vinculados!!!
                            </div>

                    @else

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>

                                            {{number_format($quantidade_total, 0, '', '.') }}
                                        </h3>

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
                                        <h3> R$ {{number_format($valor_total, 2, ',', '.')  }}</h3>

                                        <p>Valor total da requisição</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="card-body table-responsive p-0">
                            <a href="{{ route('licitacao.vincular.create',['licitacao' => $licitacaoProduto->id]) }}" class="btn btn-primary float-left">
                                <i class="fas fa-plus"></i> Adicionar  </a>
                            <table class="table table-striped" style='background:#fff'>
                                <thead>
                                    <th> Produto</th>
                                    <th> Categoria</th>
                                    <th> Fornecedor</th>

                                    <th>Valor Unitário  </th>
                                    <th>Quantidade Solicitada </th>
                                    <th>Valor total </th>
                                    <th>Ações </th>
                                </thead>
                                <tbody>
                                    @foreach ($licitacaoProdutos as $licitacaoProduto)
                                        <tr>
                                            <td>{!! $licitacaoProduto->produtos->nome !!}</td>

                                            <td>{!! $licitacaoProduto->produtos->categoria->nome_categoria !!}</td>
                                            <td>{!! $licitacaoProduto->fornecedor->nome_fornecedor !!}</td>
                                            <td>R${!! number_format($licitacaoProduto->valor_total_iten / $licitacaoProduto->quantidade_produto, 2) !!}</td>

                                            <td>{!! $licitacaoProduto->quantidade_produto !!}</td>

                                            <td>R${!!  number_format($licitacaoProduto->valor_total_iten, 2)  !!}</td>
                                            <td> <a href="" class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-editar-{{ $licitacaoProduto->id }}"
                                                title="Editar item "><span></span> <i class="nav-icon fas fa-edit"></i>

                                            </a></td>
                                        </tr>
                                        <div class="modal fade" id="modal-editar-{{ $licitacaoProduto->id }}" style="display: none;" tabindex='-1'
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                {!! Form::model($licitacaoProduto, ['method' => 'POST', 'url' => 'licitacao/vincular/editar/atualizar/' . $licitacaoProduto->id]) !!}

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Deseja editar esse registro ?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                            <input type="hidden" name="licitacao_id" value="{{ $licitacaoProduto->licitacao_id}}">
                                                            <input type="hidden" name="licitacao_item" value="{{ $licitacaoProduto->id}}">

                                                            <div class="col-sm-12 ">
                                                            <label>Quantidade de produtos </label>
                                                            <input type="text" name="quantidade_produto" class=" form-control form-control-border" value="{{ $licitacaoProduto->quantidade_produto }}" required>
                                                            </div>
                                                            <div class="col-sm-12 ">
                                                            <label>Valor unitario do item </label>
                                                            <input type="text" id="dinheiro" name="valor_total_iten" class="dinheiro form-control"  required
                                                             value="{!!  number_format($licitacaoProduto->valor_total_iten / $licitacaoProduto->quantidade_produto, 2) !!}" />

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <a href="" class="btn btn-primary" data-dismiss="modal">
                                                            <i class="fas fa-times-circle" data-dismiss="modal"></i>
                                                            Cancelar
                                                        </a>
                                                        <button type="submit" class="btn btn-success float-right" id="resumo"> <i
                                                                class=" fas fa-pen-alt"></i> Atualizar </button>


                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                    @endforeach

                                </tbody>
                            </table>
                            <hr>
                            {{ $licitacaoProdutos->links() }}
                        </div>
                    @endif
                </div>




            </div>
        </div>
        <div class="card-footer clearfix">

            <a href="{{ url('licitacao/vincular') }}" class="btn btn-primary">

                <i class="fas fa-arrow-left"></i> Voltar </a>
        </div>

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
            <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

        <script>
            setTimeout( function(){$('#msg').hide();} , 4000);
            //chama a mascara do campo de telefone
        $('[data-mask]').inputmask();
        $('.dinheiro').mask('#.##0.00', {reverse: true});
        </script>

        @endsection

    @endsection
