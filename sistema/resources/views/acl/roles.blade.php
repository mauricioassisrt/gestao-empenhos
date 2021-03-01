@extends('adminapp')

@section('content')

<script type="text/javascript">
    function deletardados(e) {
        if (!(window.confirm("Tem certeza que deseja excluir esse role?")))
            e.returnValue = false;
    }
</script>
<div class="card">

    <div class="card-header">

        @if(Session::has('insert_ok'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Inserido!</h4>
            {{Session::get('insert_ok')}}
        </div>

        @endif
        @if(Session::has('update_ok'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Alterado!</h4>
            {{Session::get('update_ok')}}
        </div>
        @endif
        @if(Session::has('delete_ok'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Apagado!</h4>
            {{Session::get('delete_ok')}}
        </div>

        @endif
        @can('Insert_role')
        <a href="{{route('acl/role_cadastrar')}}" class="btn btn-primary">
            <span class="fas fa-plus">

            </span> Adicionar Role/Regra</a>
            @endcan
            <div  class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>

    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Descrição
                    </th>

                    <th>
                        Permissão vinculadas
                    </th>
                    <th>
                      Apagar/Deletar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>
                        {{$role->name}}
                    </td>
                    <td>
                        {{$role->label}}
                    </td>

                    <td>
                        <a href="role_view/{{$role->id}}" class="btn btn-info">Permissions</a>
                    </td>
                    <td>
                        <a href="role_delete/{{$role->id}}" class="btn btn-danger" onclick="return deletardados(event)"> Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
</section>
@endsection
