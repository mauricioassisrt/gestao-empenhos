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



            {!! Form::open(['url' => '']) !!}

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

    <!-- CALENDARIo-->
    <script src="/js/moment.min.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- mask de telefone -->
    <script src="/js/jquery.inputmask.min.js"></script>

    <script>
        $('[data-mask]').inputmask();
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })

    </script>
@endsection

@endsection
