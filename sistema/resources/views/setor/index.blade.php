@extends('adminapp')

@section('content')
    <div class="card">

        <div class="card-header">

            @if (Session::has('insert_ok'))
                <div id="dialog" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Inserido!</h4>
                    {{ Session::get('insert_ok') }}
                </div>
            @endif
            @if (Session::has('autentica_ok'))
                <div id="dialog" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> ATENÇÂO USUÁRIO!</h4>
                    {{ Session::get('autentica_ok') }}
                </div>
            @endif
            @if (Session::has('update_ok'))
                <div id="dialog" class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alterado!</h4>
                    {{ Session::get('update_ok') }}
                </div>
            @endif
            @if (Session::has('delete_ok'))
                <div id="dialog" class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Apagado!</h4>
                    {{ Session::get('delete_ok') }}
                </div>

            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @can('Insert_setor')
                <a href="{{ url('setor/cadastrar') }}" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Novo </a>

            @endcan
            <form action="{{ url('/setor/search') }}" method="get">
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
                    <th>Nome da setor</th>

                    <th>Ações </th>
                </thead>
                <tbody>
                    @foreach ($setors as $setor)
                        <tr>
                            <td>{!! $setor->descricao !!}</td>

                            <td>
                                @can('Edit_setor')

                                    <a href="{{ url('setor/editar/' . $setor->id) }}" class="btn btn-primary"><span
                                            class="glyphicon glyphicon-pencil">
                                        </span>
                                        <i class="fas fa-edit"></i> Editar </a>
                                @endcan
                                @can('Delete_setor')


                                    <a href="" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-default-{{ $setor->id }}"><span
                                            class="glyphicon glyphicon-remove"></span> <i class="fas fa-trash"></i> Apagar
                                    </a>
                                    </a>
                                    <div class="modal fade" id="modal-default-{{ $setor->id }}" style="display: none;"
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
                                                    <p>Tem certeza que deseja excluir este setor cadastrado ?
                                                        {{ $setor->descricao }}</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Fechar</button>
                                                    <a href="{{ url('setor/deletar/' . $setor->id) }}"
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
            {{ $setors->links() }}
        </div>
    </div>


@endsection
