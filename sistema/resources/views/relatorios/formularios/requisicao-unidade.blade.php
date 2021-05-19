@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- toast CSS-->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

    <link rel="stylesheet" href=" {{ asset('css/select2.min.css') }}" />

    <link rel="stylesheet" href=" {{ asset('css/select2-bootstrap4.min.css') }}" />
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
                <div class="col-md-4">
                    <label>Selecione a Secretaria na qual a Unidade pertence </label>
                    <select name="unidade_id" class="form-control select2" style="width: 100%;">

                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}">
                                {{ $unidade->nome }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-4">
                    <label>Data inicio do período :</label>
                    <input type="date" name="inicio" class="form-control datepicker-input" data-target="#datainicio" />
                </div>

                <div class="col-md-4">
                    <label>Data fim do período :</label>
                    <input type="date" name="fim" class="form-control datepicker-input" data-target="#datafim" />
                </div>
            </div>
        </div>
        <div class="card-footer clearfix">

            <button type="submit" class="btn btn-success"> <i class=" fas fa-search"></i> Buscar</button>

        </div>
        {!! Form::close() !!}
    </div>



@section('rodape')

    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <!-- mask de telefone -->
    <script src=" {{ asset('js/jquery.inputmask.min.js') }}"></script>
    <!-- CALENDARIo-->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- TOAST SWEETALERT -->
    <script src=" {{ asset('js/sweetalert2.all.js') }}"></script>
    <script src=" {{ asset('js/toastr.min.js') }}"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <script type="text/javascript">
        $(document).ready(function() {
            //chama a mascara do campo de telefone
            $('[data-mask]').inputmask();
            //Datemask dd/mm/yyyy



            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

        @if (session('status'))
            toastr.warning( "{{ session()->get('status') }}" );

        @endif

    </script>
@endsection

@endsection
