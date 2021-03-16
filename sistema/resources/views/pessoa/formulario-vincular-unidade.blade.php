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
            {!! Form::open(['url' => 'vincularUnidade/insert']) !!}
            <div class="row">
                <div class="col-sm-12 ">
                    <label>Nome completo</label>
                    <input type="text" name="name" class=" form-control form-control-border" disabled
                        value="{{ $pessoa->name }}">

                </div>
                <input id="pessoa_id" type="hidden" name="pessoa_id" value="{{ $pessoa->id }}">
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Selecione as unidades nas quais estão pertencentes e vinculadas
                            a este usuário !</h5>
                        Uma vez selecionado e salvo, estas unidades estarão pertencentes e vinculadas a este usuário!
                    </div>
                </div>
            </div>
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Selecione
                        </th>
                        <th>
                            Unidade
                        </th>
                        <th>
                            Localização
                        </th>


                    </tr>
                </thead>
                <tbody>


                    @foreach ($unidades as $unidade)
                        @foreach ($pessoa_unidades as $pessoa_unidade)

                            @if ($pessoa_unidade->unidade->id === $unidade->id && $pessoa->id === $pessoa_unidade->pessoa->id)
                                <tr>
                                    <th>
                                        {{ $pessoa_unidade->unidade->id }}
                                    </th>
                                    <td>

                                        <input type="checkbox" name="unidade_id[]" checked value="{{ $unidade->id }}">

                                    </td>
                                    <td>
                                        {{ $pessoa_unidade->unidade->nome }}

                                    </td>
                                    <td>
                                        {{ $pessoa_unidade->unidade->endereco }}

                                    </td>


                                </tr>
                                @php
                                    $unidade_id = $unidade->id;
                                    break;
                                @endphp
                            @endif

                        @endforeach
                        @if ($unidade->id != $unidade_id)
                            <tr>
                                <th>
                                    {{ $unidade->id }}
                                </th>
                                <td>

                                    <input type="checkbox" name="unidade_id[]"  value="{{ $unidade->id }}">

                                </td>
                                <td>
                                    {{ $unidade->nome }}

                                </td>
                                <td>
                                    {{ $unidade->endereco }}

                                </td>


                            </tr>

                        @endif
                    @endforeach



                </tbody>
            </table>
        </div>
        <div class="card-footer clearfix">
            @can('vincular_unidade')
                <a href="{{ url('/pessoas') }}" class="btn btn-primary">

                    <i class="fas fa-arrow-left"></i> Voltar </a>
            @endcan

            <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Salvar</button>

        </div>
        {!! Form::close() !!}


    </div>



@section('rodape')

    <!-- CALENDARIo-->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- mask de telefone -->
    <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>

    <!-- TOAST SWEETALERT -->
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <!-- Modulo categoria-->
    <script src="{{ asset('js/modulos/categoria-cadastro.js') }}"></script>

@endsection

@endsection
