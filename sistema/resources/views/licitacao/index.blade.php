@extends('adminapp')

@section('content')
    <div class="card">

        <div class="card-header">
            @can('Insert_model')
                <a href="{{ url('rota_definida/cadastrar') }}" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Novo </a>

            @endcan
            <form action="{{ url('/rota/search') }}" method="get">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">

                        <input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>


                    </div>
                </div>

            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-bordered table-hover" style='background:#fff'>
                <thead>
                    <th>Nome do rota_definida</th>

                    <th>Ações </th>
                </thead>
                <tbody>
                    @foreach ($model as $models)
                        <tr>
                            <td>{!! $model->nome_atributoBanco !!}</td>

                            <td>
                                @can('Edit_rota_definida')

                                    <a href="{{ url('rota/editar/' . $model->id) }}" class="btn btn-primary"><span
                                            class="glyphicon glyphicon-pencil">
                                        </span>
                                        <i class="fas fa-edit"></i> Editar </a>
                                @endcan
                                @can('Delete_model')


                                    <a href="" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-default-{{ $model->id }}"><span
                                            class="glyphicon glyphicon-remove"></span> <i class="fas fa-trash"></i> Apagar
                                    </a>
                                    </a>
                                    <div class="modal fade" id="modal-default-{{ $model->id }}" style="display: none;"
                                        tabindex='-1' aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Deseja excluir esse registro ?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Tem certeza que deseja excluir esta pessoa
                                                        {{ $rota_definida->nome_rota_definida }}</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Fechar</button>
                                                    <a href="{{ url('rota_definida/deletar/' . $rota_definida->id) }}"
                                                        class="btn btn-danger">
                                                        <span class="glyphicon glyphicon-remove"></span> <i
                                                            class="fas fa-trash"></i>
                                                        Sim
                                                    </a>


                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $rota_definidas->links() }}
        </div>
    </div>


@endsection
