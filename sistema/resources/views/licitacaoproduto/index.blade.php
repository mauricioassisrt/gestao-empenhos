@extends('adminapp')
@section('topo')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
    <div class="card">

        <div class="card-header">
            @can('Insert_licitacao')
                <a href="{{ route('licitacao.create') }}" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Novo </a>

            @endcan
            <form action="{{ route('licitacao.vincular.search') }}" method="get">
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">

                        <input type="text" name="table_search" class="form-control float-right "
                            placeholder="Pesquise pelo número da licitação ">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>


                    </div>
                </div>

            </form>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">

                <thead>
                    <th>Ano</th>
                    <th>Número </th>
                    <th>Modalidade </th>
                    <th>Pregão </th>
                    <th>Ações </th>
                </thead>
                <tbody>
                    @foreach ($licitacaos as $licitacao)
                        <tr>
                            <td>{!! $licitacao->ano !!}</td>
                            <td>{!! $licitacao->numero_licitacao !!}</td>
                            <td>{!! $licitacao->modalidade !!}</td>
                            <td>{!! $licitacao->pregao !!}</td>
                            <td>

                                @can('Edit_licitacao')

                                    <a href="{{ route('licitacao.vincular.edit', ['licitacaoProduto' => $licitacao->id]) }}"
                                        class="btn btn-primary">
                                        <span class="glyphicon glyphicon-pencil"> </span>
                                        <i class="fas fa-edit"></i>
                                        Visualizar licitação
                                    </a>

                                    <a href="{{ route('licitacao.vincular.create', ['licitacao' => $licitacao->id]) }}"
                                        class="btn btn-primary ">
                                        <i class="fas fa-plus"></i>
                                        Vincular produtos
                                    </a>
                                @endcan
                                @can('Edit_licitacao')

                                    <a href="{{ route('licitacao.edit', ['licitacao' => $licitacao->id]) }}"
                                        class="btn btn-primary"><span class="glyphicon glyphicon-pencil">
                                        </span>
                                        <i class="fas fa-edit"></i> Editar </a>
                                @endcan
                                @can('Delete_licitacao')


                                    <a href="" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-default-{{ $licitacao->id }}"><span
                                            class="glyphicon glyphicon-remove"></span> <i class="fas fa-trash"></i> Apagar
                                    </a>
                                    </a>
                                    <div class="modal fade" id="modal-default-{{ $licitacao->id }}" style="display: none;"
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
                                                        {{ $licitacao->numero_licitacao }} </p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Fechar</button>
                                                    <a href="{{ route('licitacao.delete', ['licitacao' => $licitacao->id]) }}"
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
            {{ $licitacaos->links() }}
        </div>

    @section('rodape')
        <!-- DataTables -->
        <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.js') }} "></script>

        <script>
            $(function() {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                });
            });

        </script>
    @endsection
@endsection
