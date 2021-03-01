@extends('adminapp')

@section('content')
    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">
            Detalhes
        </div>

        <!-- /.box-header -->
        <div class="card-body">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Atenção!</h4>
                No campo nome digite a regra criada no Sistema ex:View_post -> Vizualiza os Posts, no campo descrição
                descreva as respectivas caracteristicas desta Permissão !!
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @if (Request::is('*/role_cadastrar'))
                        {!! Form::open(['url' => 'acl/role_insert']) !!}
                    @else
                        {!! Form::open(['url' => 'acl/permission_insert']) !!}
                    @endif
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" id="name" name="name" required="true"
                            placeholder="Digite o nome.">

                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <input type="text" class="form-control" id="label" name="label"
                            placeholder="Digite a descrição desejada." required="true">

                    </div>


                </div>
            </div>
        </div>

        <div class=" card-footer clearfix">
            <a href="{{ url('acl/permissions') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i>Voltar </a>

            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
            {!! Form::close() !!}

        </div>
    @endsection
