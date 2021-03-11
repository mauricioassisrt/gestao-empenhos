@extends('adminapp')
@section('topo')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- JS para CEP --}}
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/scripts/busca-cep.js"></script>
    <!-- toast CSS-->
    <link rel="stylesheet" href="/css/toastr.min.css">
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">


            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))
                {!! Form::model($secretaria, ['method' => 'PATCH', 'url' => 'categoria/update/' . $secretaria->id]) !!}
            @else
                {!! Form::open(['url' => 'secretaria/insert']) !!}
            @endif
            @csrf
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-4 ">
                        <label>Nome da secretaria </label>
                        <input type="text" class="form-control" id="nome" placeholder="Digite o nome da empresa" name="nome"
                            @if (Request::is('*/editar/*')) value="{{ $secretaria->nome }}" @endif required>

                    </div>

                    <div class="col-sm-4">
                        <label>Contato </label>
                        <input type="text" class="form-control" id="contato" placeholder="Telefone de contato "
                            name="telefone" @if (Request::is('*/editar/*')) value="{{ $secretaria->telefone }}" @endif required>
                    </div>
                    <div class="col-sm-4">
                        <label>Email </label>
                        <input type="text" class="form-control" id="email" placeholder="Digite o email" name="email" @if (Request::is('*/editar/*')) value="{{ $secretaria->email }}" @endif required>
                    </div>
                </div>

                <hr>
                <div class="  callout callout-success ">
                    <h5><b>Informações de localização da Secretária/Orgão</b> </h5>

                    <p> Ao digitar o CEP somente as outras informações são preenchidas de forma automática, ficando
                        obrigatório informar o número somente </p>
                </div>
                <div class="row">
                    <div class="col-sm-3">

                        <label>Cep:<b class="text-danger">*</b></label></label>
                        <input name="cep" type="text" id="cep" class="form-control" required @if (Request::is('*/editar/*')) value="{{ $secretaria->cep }}" @endif />
                    </div>
                    <div class="col-sm-9">
                        <label>Rua:<b class="text-danger">*</b></label></label>
                        <input name="endereco" type="text" id="rua" size="60" class="form-control" @if (Request::is('*/editar/*')) value="{{ $secretaria->rua }}" @endif />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Número <b class="text-danger">*</b></label></label>
                        <input name="numero" type="text" class="form-control" required @if (Request::is('*/editar/*')) value="{{ $secretaria->numero }}" @endif />
                    </div>

                    <div class="col-sm-10">
                        <label>Bairro:<b class="text-danger">*</b></label></label>
                        <input class="form-control" name="bairro" id="bairro" size="40" class="form-control" required @if (Request::is('*/editar/*')) value="{{ $secretaria->bairro }}" @endif />
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Cidade:<b class="text-danger">*</b></label></label>
                        <input name="cidade" type="text" id="cidade" size="40" class="form-control" required @if (Request::is('*/editar/*')) value="{{ $secretaria->cidade }}" @endif />
                    </div>
                    <div class="col-sm-6">
                        <label>UF:<b class="text-danger">*</b></label></label>
                        <input name="estado" type="text" id="uf" size="40" class="form-control" required @if (Request::is('*/editar/*')) value="{{ $secretaria->estado }}" @endif />
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer clearfix">

            <a href="{{ url('/secretaria') }}" class="btn btn-primary">

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

    <!-- mask de telefone -->
    <script src="/js/jquery.inputmask.min.js"></script>

    <!-- Modulo categoria-->
    <script src="/js/modulos/secretaria-cadastro.js"></script>
    <!-- TOAST SWEETALERT -->
    <script src="/js/sweetalert2.all.js"></script>
    <script src="/js/toastr.min.js"></script>


@endsection

@endsection
