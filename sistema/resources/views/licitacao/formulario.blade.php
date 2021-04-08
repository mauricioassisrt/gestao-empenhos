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


            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))
                {!! Form::model($licitacao, ['method' => 'PATCH', 'url' => 'licitacao/update/' . $licitacao->id]) !!}
            @else
                {!! Form::open(['url' => 'rota/insert']) !!}
            @endif
            <div class="row">
                <div class="col-sm-2">
                    <label>Ano da licitação </label>
                    <input type="numeric" class="form-control" id="ano" placeholder="Digite somente o ano " max="4" min="4"
                        name="ano" @if (Request::is('*/editar/*')) value="{{ $licitacao->ano }}" @endif required>

                </div>
                <div class="col-sm-2">
                    <label>Número da licitação </label>
                    <input type="numeric" class="form-control" id="numero_licitacao" placeholder="Exemplo 405 " max="10"
                        min="1" name="numero_licitacao" @if (Request::is('*/editar/*')) value="{{ $licitacao->numero_licitacao }}" @endif required>

                </div>
                <div class="col-sm-4">
                    <label>Pregão</label>
                    <input type="text" class="form-control" id="pregao" placeholder="Exmplo 406/2021 " max="10" min="2"
                        name="pregao" @if (Request::is('*/editar/*')) value="{{ $licitacao->pregao }}" @endif required>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label>Pregoeiro </label>
                    <input type="text" class="form-control" placeholder="Digite somente o ano " max="4" min="4"
                        name="pregoeiro" @if (Request::is('*/editar/*')) value="{{ $licitacao->pregoeiro }}" @endif required>

                </div>
                <div class="col-sm-4">
                    <label>Fonte do Recurso </label>
                    <input type="numeric" class="form-control"  placeholder="Exemplo 405 " max="10"
                        min="1" name="fonte_recurso" @if (Request::is('*/editar/*')) value="{{ $licitacao->fonte_recurso }}" @endif required>

                </div>
                <div class="col-sm-4">
                    <label>Reduzido</label>
                    <input type="text" class="form-control"
                        name="ano" @if (Request::is('*/editar/*')) value="{{ $licitacao->reduzido }}" @endif required>

                </div>
            </div>

        </div>
        <div class="card-footer clearfix">

            <a href="{{ url('/rota') }}" class="btn btn-primary">

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

    <!-- CALENDARIo-->
    <script src="/js/moment.min.js"></script>
    <script src="/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- mask de telefone -->
    <script src="/js/jquery.inputmask.min.js"></script>

    <!-- TOAST SWEETALERT -->
    <script src="/js/sweetalert2.all.js"></script>
    <script src="/js/toastr.min.js"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <!-- Modulo licitacao-->
    <script src="/js/modulos/licitacao-cadastro.js"></script>

@endsection

@endsection
