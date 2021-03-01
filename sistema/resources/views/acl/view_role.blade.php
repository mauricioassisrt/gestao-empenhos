@extends('adminapp')

@section('content')
    <div class="card">

        <div class="card-header">

            <div class="box-header with-border">
                <h3 class="box-title">Regra :{{ $label }} </h3>

            </div>

        </div>


        <div class="card-body ">

            <div class="divisa-esquerda table-responsive p-0">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> Atenção!</h4>
                    Habilite e desabilite as permissões desejadas !
                </div>
                {!! Form::open(['url' => 'acl/role_permissions']) !!}

                <input type="hidden" name="role_id" value="{{ $role_id }}">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Ativar/Desativar</th>
                            <th>Nome</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pers_cadastro as $per)
                            @foreach ($permissions as $permission)
                                @if ($per->id == $permission->id)
                                    <tr>
                                        <td><input type="checkbox" name="permissions[]" value="{{ $per->id }}" checked>
                                        </td>
                                        <td> {{ $per->name }}</td>
                                        <td> {{ $per->label }}</td>
                                    </tr>
                                    @php
                                    $permission_numb = $per->id;
                                    break;
                                    @endphp
                                @endif
                            @endforeach
                            @if ($per->id != $permission_numb)
                                <tr>
                                    <td><input type="checkbox" name="permissions[]" value="{{ $per->id }}"></td>
                                    <td> {{ $per->name }}</td>
                                    <td> {{ $per->label }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>


                </table>

            </div>
        </div>
            <div class=" card-footer clearfix">
                <a href="{{ url('/acl/roles') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>Voltar </a>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>
                    Alterar</button>
                {!! Form::close() !!}


            </div>
        @endsection
