@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href=" {{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- toast CSS-->
    <link rel="stylesheet" href=" {{ asset('css/toastr.min.css') }}">

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

                {!! Form::model($requisicao, ['method' => 'PATCH', 'url' => 'requisicao/update/' . $requisicao->id, 'enctype' => 'multipart/form-data']) !!}

            @else
                <form action="{{ url('requisicao/insert') }}" method="post" enctype="multipart/form-data">

            @endif

            <div class="col-sm-12">
                @csrf
                <div class="row">
                    <div class="col-sm-1 ">
                        <label>Código</label>
                        <input type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->id }}" @endif disabled>

                    </div>
                    <div class="col-sm-2">
                        <label>Requisição</label>
                        <input type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->requisicao_ano }}" @endif disabled>

                    </div>
                    <div class="col-sm-9">

                        <label>Unidade na qual fez a requisição </label>
                        <input disabled type="text" name="name" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->pessoaUnidade->pessoa->name }}" @endif disabled>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <label>Justificativa </label>
                        <textarea class="form-control" rows="3" required name="justificativa"
                            placeholder="Qual sua  justificativa para a requisição"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <label>Observação </label>
                        <textarea class="form-control" rows="3" required name="observacao"
                            placeholder="Possui alguma observação para incluir ?"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <label>Fonte dos recursos </label>
                        <select name="fonte_recurso" class="form-control select2">
                            <option @if (Request::is('*/editar/*')) value="{{ $requisicao->fonte_recurso }}" >{{ $requisicao->fonte_recurso }} @endif </option>
                            <option value="Recurso Livre">Recurso Livre </option>
                            <option value="Fonte Vinculada ">Fonte Vinculada </option>
                            <option value="Outra fonte "> Outra Fonte </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Licitação/Ano </label>
                        <input type="text" name="licitacao_ano" required class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->licitacao_ano }}" @endif>

                    </div>
                    <div class="col-sm-3">
                        <label>Pregão </label>
                        <input type="text" name="numero_pregao" required class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->numero_pregao }}" @endif>

                    </div>
                    <div class="col-sm-3">
                        <label>Orgão/Unidade </label>
                        <input type="text" name="orgao" class=" required form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->orgao }}" @endif>

                    </div>
                    <div class="col-sm-3">
                        <label>Reduzido </label>
                        <input type="text" name="reduzido" class=" form-control form-control-border" @if (Request::is('*/editar/*')) value="{{ $requisicao->reduzido }}" @endif>

                    </div>
                </div>

            </div>

            <hr>

                <div class="col-sm-12">

                    <div class="card-body table-responsive p-0">
                        <table class="table " id="tabela_produtos">

                        </table>
                    </div>


                </div>

            </div>

        </div>
        <div class="card-footer clearfix">


            @if (Request::is('*/editar/*'))

                <button type="submit" class="btn btn-success" id="botaoSalvarUser" style="display:none"> <i
                        class=" fas fa-pen-alt"></i> Alterar</button>

            @endif

        </div>
    </div>


    {!! Form::close() !!}
    </div>


@section('rodape')


    <!-- CALENDARIo-->
    <script src=" {{ asset('js/moment.min.js') }}"></script>
    <script src=" {{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- mask de telefone -->
    <script src=" {{ asset('js/jquery.inputmask.min.js') }}"></script>

    <!-- TOAST SWEETALERT -->
    <script src=" {{ asset('js/sweetalert2.all.js') }}"></script>
    <script src=" {{ asset('js/toastr.min.js') }}"></script>
    <!-- FIM TOAST SWEETALERT  -->



@endsection

@endsection
