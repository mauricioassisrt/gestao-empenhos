@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href="css/tempusdominus-bootstrap-4.min.css">
    <!-- toast CSS-->
    <link rel="stylesheet" href="css/toastr.min.css">

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
                {!! Form::model($fornecedor, ['method' => 'PATCH', 'url' => 'fornecedor/update/' . $fornecedor->id]) !!}
            @else
                {!! Form::open(['url' => 'fornecedor/insert']) !!}
            @endif
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" id="nome_fornecedor" placeholder="Digite o nome da empresa"
                    name="nome_fornecedor" @if (Request::is('*/editar/*')) value="{{ $fornecedor->nome_fornecedor }}" @endif required>

            </div>
            <div class="form-group">
                <label>CNPJ</label>
                <input type="text" class="form-control" placeholder="Número do CNPJ" name="cnpj" data-inputmask="'mask': ['99.999.999/9999-99']" data-mask="" inputmode="text"  @if (Request::is('*/editar/*'))
                value="{{ $fornecedor->cnpj  }}" @endif>
            </div>
        </div>
        <div class="card-footer clearfix">

            <a href="{{ url('/fornecedor') }}" class="btn btn-primary">

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

    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  --}}
    <!-- CALENDARIo-->
    <script src="js/moment.min.js"></script>
    <script src="js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- mask de telefone -->
    <script src="js/jquery.inputmask.min.js"></script>

    <!-- TOAST SWEETALERT -->
    <script src="js/sweetalert2.all.js"></script>
    <script src="js/toastr.min.js"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <!-- Modulo fornecedor-->
    <script src="js/modulos/fornecedor-cadastro.js"></script>

@endsection

@endsection
