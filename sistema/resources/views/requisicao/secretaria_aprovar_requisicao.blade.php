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
                        {{-- <th>
                            Responsável
                        </th> --}}
                        <th>
                            Status
                        </th>
                        <th>
                            Ações
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
                                {{-- <td>
                                    {{ $requisicao->pessoaUnidade->pessoa->name }}
                                </td> --}}
                                <td>
                                    <center>
                                        <span class="card bg-success"> {{ $requisicao->status }}</span>
                                    </center>
                                </td>
                                <td>

                                    <a href="{{ url('requisicao/editar/' . $requisicao->id) }}"
                                        class="btn btn-primary"><span class="glyphicon glyphicon-pencil">
                                        </span>
                                        <i class="fas fa-info-circle"></i> Detalhes da Requisição </a>
                                    <a href="" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-status-{{ $requisicao->id }}"><span></span> <i
                                            class="fas fa-check-circle"></i> Deferir Requisição
                                    </a>
                                    <!--MODAL REMOVE  VINCULO SECRETARIo -->
                                    <div class="modal fade" id="modal-status-{{ $requisicao->id }}" style="display: none;"
                                        tabindex='-1' aria-hidden="true">
                                        <div class="modal-dialog">
                                            {!! Form::model($requisicao, ['method' => 'POST', 'url' => 'requisicao/update/' . $requisicao->id]) !!}

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
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="status">
                                                            <label class="form-check-label">Deferir</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input indeferir" type="radio" name="status" value="Indeferido">
                                                            <label class="form-check-label">Indeferir</label>
                                                        </div>

                                                    </div>
                                                    <div id="justificativa" style="display: none">
                                                        <div class="col-sm-12">
                                                            <label>Justificativa </label>
                                                            <textarea class="form-control" rows="3" name="status_justificativa"
                                                                placeholder="Qual sua  justificativa para indeferir requisição"></textarea>
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
    <script>
        $('.indeferir').click(function(e) {
            $("#justificativa").show();
        });

    </script>
@endsection
@endsection
