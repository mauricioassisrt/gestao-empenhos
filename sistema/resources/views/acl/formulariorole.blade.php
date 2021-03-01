@extends('adminapp')

@section('content')
    <div class="card">

        <div class="card-header">
            <h3 class="box-title">Regras/Roles</h3>
        </div>
        <div class="card-body ">

            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Atenção!</h4>
                Adicione as Roles desejadas Como Administrador Moderador etc...
            </div>

            @if (Request::is('*/role_cadastrar'))
                {!! Form::open(['url' => 'acl/role_insert']) !!}
            @else
                {!! Form::open(['url' => 'acl/permission_insert']) !!}
            @endif
            <div class="form-group">
                <label>Nome da Role</label>
                <input type="text" class="form-control" id="name" name="name" required="true" placeholder="Digite o nome.">

            </div>
            <div class="form-group">
                <label>Descrição</label>
                <input type="text" class="form-control" id="label" name="label" placeholder="Digite a descrição desejada."
                    required="true">

            </div>


        </div>
        <div class=" card-footer clearfix">
            <a href="{{ url('/acl/roles') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>Voltar </a>
            <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i>Salvar</button>
            {!! Form::close() !!}

        </div>
    </div>
    </div>

@endsection
