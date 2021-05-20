@extends('adminapp')

@section('topo')
    <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- toast CSS-->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/select2.min.css') }}" />
    <!--Select2 -->
    <link rel="stylesheet" href=" {{ asset('css/select2-bootstrap4.min.css') }}" />
@endsection
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
            <table class="table table-hover text-nowrap projects">

                <thead>
                    <tr>

                        <th>
                            #
                        </th>
                        @can('Autentica_user')
                            <th>
                                Autenticar
                            </th>
                        @endcan
                        <th>
                            Nome
                        </th>
                        <th>
                            Secretário(a)
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
                            @can('Autentica_user')
                                <td>

                                    <a href="{{ url('autenticar/' . $pessoa->user_id) }}" class="btn btn-success"><span
                                            class="fa fa-key"> </span> </a>

                                </td>
                            @endcan
                            <td>
                                @if ($pessoa->foto_pessoa == null)
                                    Sem foto
                                @else
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <img src="{{ $pessoa->foto_pessoa }}" alt="Img" class="table-avatar"
                                                width="40px" height="40px" />
                                        </li>
                                    </ul>


                                @endif

                            </td>
                            <td>
                                {{ $pessoa->name }}
                            </td>
                            <td>
                                @if ($pessoa->secretaria_id == null)
                                    @if ($pessoa->pessoaUnidades()->count() >= 1)
                                        <span class="right badge badge-danger"> Possui unidade vinculada</span>
                                    @else
                                    <span class="right badge badge-primary">  Sem vinculo a nenhuma secretaria</span>

                                    @endif
                                @else
                                    @foreach ($secretarias as $secretaria)
                                        @if ($secretaria->id == $pessoa->secretaria_id)
                                            <span class="badge badge-success"> Secretario de
                                                {{ $secretaria->nome }}</span>

                                        @endif
                                    @endforeach
                                @endif

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

                                    <a href="{{ url('pessoas/editar/' . $pessoa->users->id) }}" class="btn btn-success"
                                        title="Editar"><span class="glyphicon glyphicon-pencil">
                                        </span>
                                        <i class="fas fa-edit"></i> </a>
                                @endcan
                                @can('Edit_unidade')
                                    <a href="{{ url('users/visualizar/' . $pessoa->users->id) }}" class="btn btn-primary"
                                        title="Permissões">

                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endcan
                                @can('pessoa_delete')

                                    <a href="" class="btn btn-danger " data-toggle="modal"
                                        data-target="#modal-default-{{ $pessoa->id }}" title="Apagar"><span
                                            class="glyphicon glyphicon-remove"> </span> <i class="fas fa-trash"></i>
                                    </a>
                                    </a>
                                @endcan
                                @can('pessoa_vincular_unidade')
                                    @if ($pessoa->secretaria_id == null)
                                        <a href="{{ url('vincularUnidade/' . $pessoa->id) }}" class="btn btn-primary"
                                            title="Vincular Unidade">

                                            <i class="fas fa-plug"></i>
                                        </a>
                                    @endif
                                @endcan


                                @can('pessoa_redefinir_senha')


                                    <a href="" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-redefinir-senha-{{ $pessoa->id }}" title=" Redefinir senha"><span
                                            class="glyphicon glyphicon-remove"></span> <i class="fas fa-paper-plane"></i>

                                    </a>

                                @endcan
                                @if ($pessoa->secretaria_id == null)


                                    @if ($pessoa->pessoaUnidades()->count() <= 0)
                                        <a href="" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal-secretario-{{ $pessoa->id }}"
                                            title="Definir como Secretário(a) Municipal "><span></span> <i
                                                class="fas fa-university nav-icon"></i>

                                        </a>



                                    @endif


                                @endif
                                @if ($pessoa->secretaria_id != null)

                                    <a href="" class="btn btn-primary" data-toggle="modal"
                                        data-target="#modal-secretario-remover-{{ $pessoa->id }}"
                                        title="Remover Secretário(a) Municipal "><span></span> <i
                                            class="fas fa-window-close nav-icon"></i>
                                @endif
                                </a>
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
                        <div class="modal fade" id="modal-redefinir-senha-{{ $pessoa->id }}" style="display: none;"
                            tabindex='-1' aria-hidden="true">
                            <div class="modal-dialog">
                                <form method="POST" action="{{ route('pessoas.redefinirSenha') }}"
                                    aria-label="{{ __('Reset Password') }}">
                                    {{ csrf_field() }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Deseja enviar um e-mail de redefinição de senha para a
                                                pesssoa ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Tem certeza que deseja enviar um email de redefinição de senha para esta
                                                pessoa {{ $pessoa->name }}</p>
                                            <input id="email" type="email" disabled
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" value="{{ $pessoa->users->email }}" required>
                                                <input type="hidden" name="email" value="{{ $pessoa->users->email }}">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Fechar</button>
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

                        <!--MODAL VINCULO SECRETARIo -->
                        <div class="modal fade" id="modal-secretario-{{ $pessoa->id }}" style="display: none;"
                            tabindex='-1' aria-hidden="true">
                            <div class="modal-dialog">
                                {!! Form::model($pessoa, ['method' => 'POST', 'url' => 'pessoas/vincularSecretaria/' . $pessoa->id]) !!}

                                <div class="modal-content">
                                    <!-- CABEÇALHO  -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Escolha uma Secretaria ?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <!-- CONTEUDO -->
                                    <div class="modal-body">



                                        <label>Escolha a Secretaria na qual deseja definir para o secretário(a) </label>
                                        <select name="secretaria_id" class="form-control secretaria" style="width: 100%;">
                                            @foreach ($secretarias as $secretaria)


                                                <option value="{{ $secretaria->id }}">

                                                    {{ $secretaria->nome }}
                                                </option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <!-- RODA PE DIALOG -->
                                    <div class="modal-footer justify-content-between">

                                        <a href="" class="btn btn-primary" data-dismiss="modal">
                                            <i class="fas fa-times-circle" data-dismiss="modal"></i>
                                            Cancelar
                                        </a>
                                        <button type="submit" class="btn btn-success float-right" id="resumo"> <i
                                                class=" fas fa-pen-alt"></i> Atualizar </button>


                                    </div>
                                    {!! Form::close() !!}
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!--MODAL REMOVE  VINCULO SECRETARIo -->
                        <div class="modal fade" id="modal-secretario-remover-{{ $pessoa->id }}" style="display: none;"
                            tabindex='-1' aria-hidden="true">
                            <div class="modal-dialog">
                                {!! Form::model($pessoa, ['method' => 'POST', 'url' => 'pessoas/vincularSecretaria/' . $pessoa->id]) !!}

                                <div class="modal-content">
                                    <!-- CABEÇALHO  -->
                                    <div class="modal-header">
                                        <h6 class="modal-title">Atenção ?</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <!-- CONTEUDO -->
                                    <div class="modal-body">
                                        <input type="hidden" name="secretaria_id" value="" </div>
                                        <h4> <b> Tem certeza que deseja remover {{ $pessoa->name }} de secretário(a)
                                                municipal ? </b></h4>
                                        <!-- RODA PE DIALOG -->
                                        <div class="modal-footer ">

                                            <a href="" class="btn btn-primary" data-dismiss="modal">
                                                <i class="fas fa-times-circle" data-dismiss="modal"></i>
                                                Cancelar
                                            </a>
                                            <button type="submit" class="btn btn-danger float-right" id="resumo"> <i
                                                    class=" fas fa-trash"></i> Remover </button>


                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            {{ $pessoas->links() }}
        </div>
    </div>

@section('rodape')
    <!-- TOAST SWEETALERT -->
    <script src=" {{ asset('js/sweetalert2.all.js') }}"></script>
    <script src=" {{ asset('js/toastr.min.js') }}"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <!-- SELECT2 -->
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-switch.min.js') }}"></script>

    <script>
        $('.secretaria').select2()
        //toast alert
        @if (session('status'))
            toastr.success( "{{ session()->get('status') }}" );

        @endif
        @if (session('remove'))
            toastr.info( "{{ session()->get('remove') }}" );

        @endif
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    </script>
@endsection
@endsection
