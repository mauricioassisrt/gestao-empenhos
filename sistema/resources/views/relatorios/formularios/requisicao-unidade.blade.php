@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href="/css/tempusdominus-bootstrap-4.min.css">
    <!-- toast CSS-->
    <link rel="stylesheet" href="/css/toastr.min.css">

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



            {!! Form::open(['url' => '']) !!}
            <div class="form-group">
                <label>Selecione a Secretaria na qual a Unidade pertence </label>
                <select name="unidade_id" class="form-control select2" style="width: 100%;">

                    @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}">
                            {{ $unidade->nome }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label>Data inicio do período :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="inicio" placeholder="dia-mes-ano"
                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                </div>
            </div>

            <div class="form-group">
                <label>Data fim do período :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="fim" placeholder="dia-mes-ano"
                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
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

    </script>
@endsection

@endsection
