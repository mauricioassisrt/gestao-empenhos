@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href="/css/tempusdominus-bootstrap-4.min.css">
    <!-- toast CSS-->
    <link rel="stylesheet" href="/css/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">


            {!! Form::open(['route' => 'relatorio.requisicao.unidade.exibir', 'method' => 'post']) !!}
            <div class="row">


                <div class="col-md-3">
                    <label>Data inicio do período :</label>
                    <input type="date" name="inicio" class="form-control datepicker-input" data-target="#datainicio" />
                </div>

                <div class="col-md-3">
                    <label>Data fim do período :</label>
                    <input type="date" name="fim" class="form-control datepicker-input" data-target="#datafim" />
                </div>
            </div>
        </div>
        <div class="card-footer clearfix">

            <button type="submit" class="btn btn-success"> <i class=" fas fa-search"></i> Buscar</button>
            {!! Form::close() !!}
        </div>

    </div>



@section('rodape')

    <!-- CALENDARIo-->
    <script src="/js/moment.min.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- TOAST SWEETALERT -->
    <script src=" {{ asset('js/sweetalert2.all.js') }}"></script>
    <script src=" {{ asset('js/toastr.min.js') }}"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <script>
        @if (session('status'))
            toastr.warning( "{{ session()->get('status') }}" );

        @endif

    </script>
@endsection

@endsection
