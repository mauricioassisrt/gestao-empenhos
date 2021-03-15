@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href="css/tempusdominus-bootstrap-4.min.css">
    <!-- toast CSS-->
    <link rel="stylesheet" href="css/toastr.min.css">

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

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
                {!! Form::model($fornecedor, ['method' => 'PATCH', 'url' => 'fornecedor/update/' . $fornecedor->id]) !!}
            @else
                {!! Form::open(['url' => 'fornecedor/insert']) !!}
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <label>Nome</label>
                    <input type="text" class="form-control" id="nome_fornecedor" placeholder="Digite o nome da empresa"
                        name="nome_fornecedor" @if (Request::is('*/editar/*')) value="{{ $fornecedor->nome_fornecedor }}" @endif required>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>CNPJ</label>
                    <input type="text" class="form-control" placeholder="Número do CNPJ" name="cnpj"
                        data-inputmask="'mask': ['99.999.999/9999-99']" data-mask="" inputmode="text" @if (Request::is('*/editar/*')) value="{{ $fornecedor->cnpj }}" @endif>
                </div>
            </div>


                <div class="row">

                    <div class="col-sm-6">
                        <label>Telefone </label>
                        <input type="text" name="telefone" class="form-control" id="telefone" @if (Request::is('*/editar/*')) value="{{ $fornecedor->telefone }}" @endif>
                    </div>
                    <div class="col-sm-6">
                        <label>Email </label>
                        <input type="text" name="email" class="form-control" @if (Request::is('*/editar/*')) value="{{ $fornecedor->email }}" @endif>
                    </div>
                </div>
                <hr>
                <div class="  callout callout-success ">
                    <h5><b>Informações de localização da empresa</b> </h5>

                    <p> Ao digitar o CEP somente as outras informações são preenchidas de forma automática, ficando
                        obrigatório informar o número somente </p>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Cep:<b class="text-danger">*</b></label></label>
                        <input name="cep" type="text" id="cep" @if (Request::is('*/editar/*')) value="{{ $fornecedor->cep }}" @endif class="form-control"
                            required />
                    </div>
                    <div class="col-sm-9">
                        <label>Rua:<b class="text-danger">*</b></label></label>
                        <input name="endereco" type="text" id="rua" size="60" @if (Request::is('*/editar/*')) value="{{ $fornecedor->endereco }}" @endif
                            class="form-control" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Número <b class="text-danger">*</b></label></label>
                        <input name="numero" type="text" @if (Request::is('*/editar/*')) value="{{ $fornecedor->numero }}" @endif class="form-control"
                            required />
                    </div>

                    <div class="col-sm-10">
                        <label>Bairro:<b class="text-danger">*</b></label></label>
                        <input class="form-control" name="bairro" @if (Request::is('*/editar/*')) value="{{ $fornecedor->bairro }}" @endif type="text"
                            id="bairro" size="40" class="form-control" required />
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Cidade:<b class="text-danger">*</b></label></label>
                        <input name="cidade" type="text" id="cidade" size="40" class="form-control" @if (Request::is('*/editar/*')) value="{{ $fornecedor->cidade }}" @endif required />
                    </div>
                    <div class="col-sm-6">
                        <label>UF:<b class="text-danger">*</b></label></label>
                        <input name="estado" type="text" id="uf" @if (Request::is('*/editar/*')) value="{{ $fornecedor->estado }}" @endif size="40"
                            class="form-control" required />
                    </div>
                </div>
            </div>

        <div class="card-footer clearfix">

            <a href="{{ url('/fornecedor') }}" class="btn btn-primary">

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
    <script src=" {{ asset('js/moment.min.js') }}"></script>
    <script src=" {{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- mask de telefone -->
    <script src=" {{ asset('js/jquery.inputmask.min.js') }}"></script>

    <!-- TOAST SWEETALERT -->
    <script src=" {{ asset('js/sweetalert2.all.js') }}"></script>
    <script src=" {{ asset('js/toastr.min.js') }}"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <!-- Modulo fornecedor-->

    <script src="{{ asset('js/modulos/fornecedor-cadastro.js') }}"></script>

@endsection

@endsection
