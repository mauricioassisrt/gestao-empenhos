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
            @can('insert_pessoa')
                <a href="{{ url('pessoas/cadastrar') }}" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Novo </a>


                <form action="{{ url('/pessoas/search') }}" method="get">
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
                            Nome
                        </th>
                        <th>
                            E-mail
                        </th>
                        <th>
                            Data Nascimento
                        </th>
                        <th>
                            Celular
                        </th>
                        <th>
                            Ações
                        </th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($pessoas as $pessoa)
                        <tr>

                            <td>

                                <img src="/{{ $pessoa->foto_pessoa }}" alt="Product 1" class="img-circle mr-2" width="40px"
                                    height="40px" />
                            </td>
                            <td>
                                {{ $pessoa->name }}
                            </td>
                            <td>
                                {{ $pessoa->users->email }}
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($pessoa->data_nascimento)) }}
                            </td>
                            <td>
                                {{ $pessoa->celular }}
                            </td>
                            <td>
                                @can('pessoa_edit')
                                    <a href="{{ url('users/visualizar/' . $pessoa->users->id) }}" class="btn btn-primary">

                                        <i class="fas fa-eye"></i>Permissões
                                    </a>
                                    <a href="{{ url('pessoas/editar/' . $pessoa->users->id) }}" class="btn btn-primary"><span
                                            class="glyphicon glyphicon-pencil">
                                        </span>
                                        <i class="fas fa-edit"></i> Editar </a>
                                @endcan
                                @can('pessoa_delete')


                                    <a href="" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-default-{{ $pessoa->id }}"><span
                                            class="glyphicon glyphicon-remove"></span> <i class="fas fa-trash"></i> Apagar
                                    </a>
                                    </a>
                                @endcan
                                @can('pessoa_redefinir_senha')


                                <a href="" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal-redefinir-senha-{{ $pessoa->id }}"><span
                                        class="glyphicon glyphicon-remove"></span> <i class="fas fa-paper-plane"></i> Redefinir senha
                                </a>
                                </a>
                            @endcan
                            </td>

                        </tr>
                        <div class="modal fade" id="modal-default-{{ $pessoa->id }}" style="display: none;" tabindex='-1'
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Deseja excluir esse registro ?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza que deseja excluir esta pessoa {{ $pessoa->name }}</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        <a href="{{ url('pessoas/deletar/' . $pessoa->id) }}" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> <i class="fas fa-trash"></i>
                                            Sim
                                        </a>


                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal-redefinir senha -->
                        <div class="modal fade" id="modal-redefinir-senha-{{ $pessoa->id }}" style="display: none;" tabindex='-1'
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                                    {{ csrf_field() }}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Deseja enviar um e-mail de redefinição de senha para a pesssoa ?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza que deseja enviar um email de redefinição de senha para esta pessoa {{ $pessoa->name }}</p>
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email"  value="{{ $pessoa->users->email }}" required>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-success ">
                                            {{ __('Recuperar E-mail') }}
                                        </button>


                                    </div>
                                </div>
                                </form>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $pessoas->links() }}
        </div>
    </div>


@endsection
