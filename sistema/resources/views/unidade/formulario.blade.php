@extends('adminapp')
@section('topo')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href=" {{ asset('css/select2.min.css') }}" />

    <link rel="stylesheet" href=" {{ asset('css/select2-bootstrap4.min.css') }}" />
    {{-- JS para CEP --}}
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/scripts/busca-cep.js') }}"></script>
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">


            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))
                {!! Form::model($unidade, ['method' => 'PATCH', 'url' => 'unidade/update/' . $unidade->id]) !!}
            @else
                {!! Form::open(['url' => 'unidade/insert']) !!}
            @endif
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Selecione a Secretaria na qual a Unidade pertence </label>
                    <select name="secretaria_id" class="form-control select2" style="width: 100%;" required>
                        @if (Request::is('*/editar/*'))
                            <option value="{{ $unidade->secretaria->id }}">
                                {{ $unidade->secretaria->nome }}
                            </option>
                            @foreach ($secretarias as $secretaria)
                                @if ($unidade->secretaria->id != $secretaria->id)
                                    <option value="{{ $secretaria->id }}">
                                        {{ $secretaria->nome }}
                                    </option>
                                @endif

                            @endforeach
                        @else
                            @foreach ($secretarias as $secretaria)
                                <option value="{{ $secretaria->id }}">
                                    {{ $secretaria->nome }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="row">
                    <div class="col-sm-4 ">
                        <label>Nome da unidade </label>
                        <input type="text" class="form-control" id="nome" placeholder="Digite o nome da empresa" name="nome"
                            @if (Request::is('*/editar/*')) value="{{ $unidade->nome }}" @endif required>

                    </div>
                    <div class="col-sm-3 ">
                        <label>Código unidade </label>
                        <input type="number" class="form-control" id="codigo" placeholder="Digite o número desejado" name="codigo"
                            @if (Request::is('*/editar/*')) value="{{ $unidade->codigo }}" @endif >

                    </div>
                    <div class="col-sm-2">
                        <label>Contato </label>
                        <input type="text" class="form-control" id="telefone" placeholder="Telefone de contato "
                            name="telefone" @if (Request::is('*/editar/*')) value="{{ $unidade->telefone }}" @endif required>
                    </div>
                    <div class="col-sm-3">
                        <label>Email </label>
                        <input type="text" class="form-control" id="email" placeholder="Digite o email" name="email" @if (Request::is('*/editar/*')) value="{{ $unidade->email }}" @endif required>
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
                        <input name="cep" type="text" id="cep" class="form-control" required @if (Request::is('*/editar/*')) value="{{ $unidade->cep }}" @endif />
                    </div>
                    <div class="col-sm-9">
                        <label>Rua:<b class="text-danger">*</b></label></label>
                        <input name="endereco" type="text" id="rua" size="60" required class="form-control" @if (Request::is('*/editar/*')) value="{{ $unidade->endereco }}" @endif />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Número <b class="text-danger">*</b></label></label>
                        <input name="numero" type="text" class="form-control" required @if (Request::is('*/editar/*')) value="{{ $unidade->numero }}" @endif />
                    </div>

                    <div class="col-sm-10">
                        <label>Bairro:<b class="text-danger">*</b></label></label>
                        <input class="form-control" name="bairro" id="bairro" size="40" class="form-control" required @if (Request::is('*/editar/*')) value="{{ $unidade->bairro }}" @endif />
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Cidade:<b class="text-danger">*</b></label></label>
                        <input name="cidade" type="text" id="cidade" size="40" class="form-control" required @if (Request::is('*/editar/*')) value="{{ $unidade->cidade }}" @endif />
                    </div>
                    <div class="col-sm-6">
                        <label>UF:<b class="text-danger">*</b></label></label>
                        <input name="estado" type="text" id="uf" size="40" class="form-control" required @if (Request::is('*/editar/*')) value="{{ $unidade->estado }}" @endif />
                    </div>

                </div>
            </div>


        </div>
        <div class="card-footer clearfix">

            <a href="{{ url('/unidade') }}" class="btn btn-primary">

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
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <!-- mask de telefone -->
    <script src=" {{ asset('js/jquery.inputmask.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //chama a mascara do campo de telefone
            $('[data-mask]').inputmask();
            //Datemask dd/mm/yyyy

            $('#cep').inputmask('99.999-999');
            $('#telefone').inputmask('(99)9 9999-9999');


            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });

    </script>
@endsection

@endsection
