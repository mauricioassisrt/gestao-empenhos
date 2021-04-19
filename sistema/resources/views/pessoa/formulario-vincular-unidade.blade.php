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
            @csrf
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
            <div class="row">
                <div class="col-sm-6">
                    <label>Servidor/Pessoa </label>
                    <input type="text" name="name" class=" form-control form-control-border" disabled
                        value="{{ $pessoa->name }}">
                    <input id="pessoa_id" type="hidden" name="pessoa_id" value="{{ $pessoa->id }}">
                </div>

                <div class="col-sm-6">
                    <label>Unidade a ser vinculado</label>
                    <select name="unidade_id" id="" class="form-control">
                        @foreach ($unidades as $unidade)

                            <option value="{{ $unidade->id }}">{{ $unidade->nome }}</option>



                        @endforeach
                    </select>


                </div>

            </div>
            <br>

            <div class="box box-primary">
                <div class="box-header">
                    <h3> Permissão</h3>
                </div>
                <div class="box-body">


                    <table class='table'>
                        <thead>
                            <th>Permissão</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            @foreach ($pessoa_unidades as $unidadesVinculadas)
                                <tr>
                                    @if ($pessoa->id === $unidadesVinculadas->pessoa_id)
                                        <td>{{ $unidadesVinculadas->unidade->nome }}</td>
                                        <td>

                                            @can('Delete_fornecedor')

                                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#modal-default-{{ $unidadesVinculadas->id }}"><i
                                                        class=" fas fa-trash"></i></a>

                                                <div class="modal fade" id="modal-default-{{ $unidadesVinculadas->id }}"
                                                    style="display: none;" tabindex='-1' aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Deseja excluir esse registro ?</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Tem certeza que deseja excluir esta pessoa
                                                                    {{ $unidadesVinculadas->unidade->nome }}</p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Fechar</button>
                                                                <a href="{{ url('vincularUnidade/deletar/' . $unidadesVinculadas->id . '/' . $pessoa->id) }}"
                                                                    class="btn btn-danger">
                                                                    <span class="glyphicon glyphicon-remove"></span> <i
                                                                        class="fas fa-trash"></i>
                                                                    Sim
                                                                </a>


                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            @endcan
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer clearfix">
            @can('vincular_unidade')
                <a href="{{ url('/pessoas') }}" class="btn btn-primary">

                    <i class="fas fa-arrow-left"></i> Voltar </a>
            @endcan

            <button class='btn btn-primary'><i class=" fas fa-plus"></i> Vincular Unidade selecionada </button>

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
    <script>
        @if (session('status'))
            toastr.success( "{{ session()->get('status') }}" );

        @endif

    </script>
@endsection

@endsection
