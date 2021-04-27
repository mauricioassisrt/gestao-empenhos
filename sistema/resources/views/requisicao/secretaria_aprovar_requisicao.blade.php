@extends('adminapp')

@section('content')
    <div class="card">

        <div class="card-header">


            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif



            @can('search_requisicao')
                <form action="{{ url('/requisicao/search') }}" method="get">
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">

                            <input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>


                        </div>
                    </div>
                @endcan
            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">

                <thead>
                    <tr>

                        <th>
                            #
                        </th>
                        <th>
                            Unidade
                        </th>
                        <th>
                            Data da Requisicao
                        </th>
                        <th>
                            Arquivos
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Detalhes
                        </th>
                        <th>
                            Indefirir Requisição
                        </th>
                        <th>
                            Deferir Requisição
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requisicaos as $requisicao)
                        @if ($requisicao->unidades->secretaria_id == $pessoa->secretaria_id)
                            <tr>

                                <td>
                                    {{ $requisicao->id }}
                                </td>
                                <td>
                                    {{ $requisicao->unidades->nome }}
                                </td>
                                <td>
                                    {{ date('d/m/Y ', strtotime($requisicao->created_at)) }}
                                </td>
                                <td>
                                    @if ($requisicao->orcamento_um != null)
                                        <a href="{{ $requisicao->orcamento_um }}" title="Orçamento 1 "> <i
                                                class="fas fa-upload"></i> </a>
                                    @else
                                        Sem arquivo vinculado
                                    @endif
                                    @if ($requisicao->orcamento_dois != null)<a
                                            href="{{ $requisicao->orcamento_dois }}" title="Orçamento 2 "> <i
                                                class="fas fa-upload"></i> </a>@endif
                                    @if ($requisicao->orcamento_tres != null)<a
                                            href="{{ $requisicao->orcamento_tres }}" title="Orçamento 3 "> <i
                                                class="fas fa-upload"></i> </a>@endif

                                </td>
                                <td>
                                    <center>
                                        @if ($requisicao->status == 'Indeferido')
                                            <span class="card bg-danger"> {{ $requisicao->status }} <br>Motivo {{$requisicao->status_justificativa }}</span>
                                        @endif
                                        @if ($requisicao->status == 'Enviado')
                                            <span class="card bg-default"> {{ $requisicao->status }}</span>
                                        @endif
                                        @if ($requisicao->status == 'Deferido')
                                            <span class="card bg-success"> {{ $requisicao->status }}</span>
                                        @endif
                                    </center>
                                </td>
                                <td>

                                    <a href="{{ url('requisicao/editar/' . $requisicao->id) }}" class="btn btn-primary"
                                        title="Detalhes da Requisição ">
                                        <i class="fas fa-info-circle"></i> </a>
                                </td>
                                <td>
                                    @if ($requisicao->status != 'Indeferido')
                                    <a href="" class="btn btn-danger " data-toggle="modal"
                                        data-target="#modal-indeferir-{{ $requisicao->id }}"
                                        title=" Indeferir Requisição"> <i class="fas fa-window-close"></i>
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    @if ($requisicao->status != 'Deferido')
                                        {!! Form::model($requisicao, ['method' => 'PATCH', 'url' => 'requisicao/update/' . $requisicao->id]) !!}
                                        <input type="hidden" name="status" value="Deferido" />
                                        <input type="hidden" name="status_justificativa" value="" />

                                        <button type="submit" class="btn btn-success " title="Deferir">
                                            <i class=" fas fa-check-square"></i> </button>
                                        {!! Form::close() !!}
                                    @endif
                                    <!--MODAL REMOVE  INDEFERIR  -->
                                    <div class="modal fade" id="modal-indeferir-{{ $requisicao->id }}"
                                        style="display: none;" tabindex='-1' aria-hidden="true">
                                        <div class="modal-dialog">
                                            {!! Form::model($requisicao, ['method' => 'PATCH', 'url' => 'requisicao/update/' . $requisicao->id]) !!}

                                            <div class="modal-content">
                                                <!-- CABEÇALHO  -->
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Deferir requisição ?</h6>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <!-- CONTEUDO -->
                                                <div class="modal-body">
                                                    <input type="hidden" name="status" value="Indeferido" />
                                                    <div id="justificativa">
                                                        <div class="col-sm-12">
                                                            <label>Justificativa </label>
                                                            <textarea class="form-control" rows="3"
                                                                name="status_justificativa"
                                                                placeholder="Informe uma justificativa para indeferir a requisição">{{ $requisicao->status_justificativa }}</textarea>
                                                        </div>
                                                    </div>

                                                    {!! Form::close() !!}
                                                </div>
                                                <!-- RODA PE DIALOG -->
                                                <div class="modal-footer ">

                                                    <a href="" class="btn btn-primary" data-dismiss="modal">
                                                        <i class="fas fa-times-circle" data-dismiss="modal"></i>
                                                        Cancelar
                                                    </a>
                                                    <button type="submit" class="btn btn-success float-right" id="resumo">
                                                        <i class=" fas fa-check-square"></i> Salvar </button>


                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                </td>

                            </tr>
                        @endif

                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $requisicaos->links() }}
        </div>
    </div>
@section('rodape')

@endsection
@endsection
