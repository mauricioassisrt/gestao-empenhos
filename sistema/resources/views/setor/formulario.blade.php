@extends('adminapp')
@section('topo')

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">


            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))
                {!! Form::model($setor, ['method' => 'PATCH', 'url' => 'setor/update/' . $setor->id]) !!}
            @else
                {!! Form::open(['url' => 'setor/insert']) !!}
            @endif
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" id="descricao" placeholder="Exemplo Rercusos Humanos, Compras, etc"
                    name="descricao" @if (Request::is('*/editar/*')) value="{{ $setor->descricao }}" @endif required>

            </div>

        </div>
        <div class="card-footer clearfix">

            <a href="{{ url('/setor') }}" class="btn btn-primary">

                <i class="fas fa-arrow-left"></i> Voltar </a>

            @if (Request::is('*/editar/*'))
                <button type="submit" class="btn btn-success"> <i class=" fas fa-pen-alt"></i> Alterar</button>
            @else
                <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Salvar</button>
            @endif

        </div>
        {!! Form::close() !!}
    </div>
    </div>
    </div>


@section('rodape')

@endsection

@endsection
