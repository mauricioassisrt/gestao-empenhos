@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- toast CSS-->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Informação !</h5>
                Informe no máximo um intervalo de 31 dias entre as datas !
              </div>

            {!! Form::open(['route' => 'relatorio.requisicao.resumo.exibir', 'method' => 'post']) !!}
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
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/tempusdominus-bootstrap-4.min.js')}}"></script>
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
