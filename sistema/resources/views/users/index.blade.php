@extends('adminapp')
@section('content')
@section('topo')

@endsection


    <script type="text/javascript">
        function deletardados(e) {
            if (!(window.confirm("Tem certeza que deseja excluir esse usuario?")))
                e.returnValue = false;
        }

    </script>

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
            <a href="{{ url('users/cadastrar') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Novo </a>
            <form action="{{ url('/users/search') }}" method="get">
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
            <table class="table table-hover text-nowrap" id="tabela">

                <thead>
                    <tr>

                        <th>
                            @if($ordenar == 1)
                            @php
                            $ordenar_por  = 'name'
                            @endphp
                            <a href="{{url('users/ordenar/asc/'.$ordenar_por )}}"><i class="fas fa-arrow-up"></i> Nome </a>
                            @else
                            @php
                            $ordenar_por  = 'email'
                            @endphp
                            <a href="{{url('users/ordenar/desc/'.$ordenar_por )}}"><i class="fas fa-arrow-down"></i> Nome </a>
                            @endif
                        </th>
                        <th>
                            @if($ordenar == 1)
                            @php
                            $ordenar_por  = 'email'
                            @endphp
                            <a href="{{url('users/ordenar/asc/'.$ordenar_por )}}"><i class="fas fa-arrow-up"></i> E-mail </a>
                            @else
                            @php
                            $ordenar_por  = 'email'
                            @endphp
                            <a href="{{url('users/ordenar/desc/'.$ordenar_por )}}"><i class="fas fa-arrow-down"></i> E-mail </a>
                            @endif
                        </th>
                        <th>
                            Ações
                        </th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($users as $user)
                        <tr>

                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                <a href="{{ url('users/visualizar/' . $user->id) }}" class="btn btn-primary">

                                    <i class="fas fa-eye"></i>Permissões
                                </a>
                                <a href="{{ url('users/editar/' . $user->id) }}" class="btn btn-primary"><span
                                        class="glyphicon glyphicon-pencil">
                                    </span>
                                    <i class="fas fa-edit"></i> Editar </a>
                                <a href="{{ url('users/deletar/' . $user->id) }}" class="btn btn-primary"
                                    onclick="return deletardados(event)"><span class="glyphicon glyphicon-remove"></span> <i
                                        class="fas fa-trash"></i> Excluir
                                </a>
                                </a>

                            </td>

                        </tr>

                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">


            {{ $users->links() }}

        </div>
    </div>
    @section('rodape')



    @endsection


@endsection
