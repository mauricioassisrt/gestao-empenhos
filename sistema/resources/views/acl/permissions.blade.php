@extends('adminapp')

@section('content')



    <div class="card">

        <div class="card-header">


            <a href=" {{ url('/acl/permission_cadastrar') }}" class="btn btn-primary">
                <span class="glyphicon glyphicon-plus">

                </span> Adicionar Permissão</a>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>

        </div>
        @if (Session::has('insert_ok'))
            <div class="alert alert-success">{{ Session::get('insert_ok') }}</div>
        @endif
        <div class="card-body">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Atenção!</h4>
                Ao Admistrador só é permitido Adicionar novas permissões não é possivel excluir ou edita-las !!
            </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>
                            Data
                        </th>
                        <th>
                            Descrição
                        </th>
                        <th>
                            Nome
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->id }}
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($permission->created_at)) }}
                            </td>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td>
                                {{ $permission->label }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <div class="card-footer clearfix">


                {{ $permissions->links() }}

                 </div>
        </div>
    </div>
    </section>
@endsection
