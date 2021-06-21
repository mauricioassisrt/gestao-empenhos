@extends('adminapp')
@section('topo')
    <!-- DATA TIME PICKER Style -->

    <link rel="stylesheet" href=" {{ asset('css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- toast CSS-->
    <link rel="stylesheet" href=" {{ asset('css/toastr.min.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style type="text/css">
        input[type='file'] {
            display: none
        }

        .input-wrapper label {
            background-color: #3498db;
            border-radius: 5px;
            color: #fff;
            margin: 10px;
            padding: 6px 20px
        }

        .input-wrapper label:hover {
            background-color: #2980b9
        }

    </style>
@endsection

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">
            @if (Session::has('message'))
                <div id="msg" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Atenção!</h5>
                    <p>{{ Session::get('message') }}</p>
                </div>

            @endif
            <!-- /.box-header -->

            <div class="row">
                <div class="col-sm-12 ">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="fas fa-boxes nav-icon"></i> Categoria importar/exportar</h5>
                        Selecione arquivos no formato XLSX para importar no sistema .
                    </div>
                    <h3 class="card-title">Campos para importar o layout </h3>
                    <table class="table table-bordered  text-nowrap">
                        <thead>
                            <tr>
                                <th>Nome da categoria </th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Texto </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12 ">
                    <form action="{{ route('importar.insert') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='input-wrapper'>
                            <label for='arquivo'>
                                <i class="fas fa-upload"></i> Selecionar arquivo
                            </label>
                            <input id='arquivo' type='file' accept="application/xlsx" name='arquivo' />
                            <span id='arquivo_label'></span>

                            <a href="{{ route('export.categoria') }}">
                                <label for='export'>
                                    <i class="fas fa-download"></i> Exportar excel
                                </label>


                            </a>
                            <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Importar </button>
                        </div>

                        {!! Form::close() !!}



                </div>

            </div>
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="fas fa-box nav-icon"></i> Produtos importar/exportar</h5>
                        Selecione arquivos no formato XLSX para importar no sistema .
                    </div>
                    <h3 class="card-title">Campos para importar o layout </h3>
                    <table class="table table-bordered  text-nowrap">
                        <thead>
                            <tr>
                                <th>Nome do produto </th>
                                <th>Descrição </th>
                                <th>categoria_id</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Texto </td>
                                <td>Texto</td>
                                <td>Númerico </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12 ">
                    <form action="{{ route('importar.insert.produto') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='input-wrapper'>
                            <label for='produto'>
                                <i class="fas fa-upload"></i> Selecionar arquivo
                            </label>
                            <input id='produto' type='file' accept="application/xlsx" name='produto' />
                            <span id='produto_label'></span>

                            <a href="{{ route('export.produto') }}">
                                <label for='export'>
                                    <i class="fas fa-download"></i> Exportar excel
                                </label>


                            </a>
                            <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Importar </button>
                        </div>

                        {!! Form::close() !!}



                </div>

            </div>
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="fas fa-gavel nav-icon"></i> Licitação importar/exportar</h5>
                        Selecione arquivos no formato XLSX para importar no sistema .
                    </div>
                    <h3 class="card-title">Campos para importar o layout </h3>
                    <table class="table table-bordered  text-nowrap">
                        <thead>
                            <tr>
                                <th>Ano</th>
                                <th>Número da licitação </th>
                                <th>Modalidade</th>
                                <th>Pregão</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ano, não pode exceder 4 digitos exemplo 2020 </td>
                                <td>Númerico </td>
                                <td>Texto</td>
                                <td>Texto</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12 ">
                    <form action="{{ route('importar.insert.licitacao') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='input-wrapper'>
                            <label for='licitacao'>
                                <i class="fas fa-upload"></i> Selecionar arquivo
                            </label>
                            <input id='licitacao' type='file' accept="application/xlsx" name='licitacao' />
                            <span id='licitacao_label'></span>

                            <a href="{{ route('export.licitacao') }}">
                                <label for='export'>
                                    <i class="fas fa-download"></i> Exportar excel
                                </label>


                            </a>
                            <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Importar </button>
                        </div>

                        {!! Form::close() !!}



                </div>

            </div>
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="fas fa-building  nav-icon"></i> Fornecedores importar/exportar</h5>
                        Selecione arquivos no formato XLSX para importar no sistema .
                    </div>
                    <h3 class="card-title">Campos para importar o layout </h3>
                    <table class="table table-bordered  responsive">
                        <thead>
                            <tr>
                                <th>Nome do Fornecedor</th>
                                <th>CNPJ</th>
                                <th>CPF</th>
                                <th>Júridica</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Endereço</th>
                                <th>Bairro</th>
                                <th>CEP</th>
                                <th>Número</th>
                                <th>Cidade</th>
                                <th>Estadoo </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Fornecedor </td>
                                <td> informar com a pontuação 76.754/0001-21 </td>
                                <td> informar com a pontuação 999.999.999-23</td>
                                <td> 0 ou 1, caso informar o CPF, neste campo colocar o valor 0, caso informado CNPJ,
                                    colocar 1 </td>
                                <td> (44) 4444-4444</td>
                                <td>contato@email.com</td>
                                <td>Rua avenida etc</td>
                                <td>Bairro </td>
                                <td>87.701-350, informar com as mascara (. e traço - )</td>
                                <td> 1.200, informar com ponto </td>
                                <td>Paranavaí </td>
                                <td>PR</td>
                            </tr>


                        </tbody>
                    </table>

                </div>
                <div class="col-sm-12 ">
                    <form action="{{ route('importar.insert.fornecedores') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class='input-wrapper'>
                            <label for='fornecedores'>
                                <i class="fas fa-upload"></i> Selecionar arquivo
                            </label>
                            <input id='fornecedores' type='file' accept="application/xlsx" name='fornecedores' />
                            <span id='fornecedores'></span>

                            <a href="{{ route('export.fornecedores') }}">
                                <label for='export'>
                                    <i class="fas fa-download"></i> Exportar excel
                                </label>


                            </a>
                            <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Importar </button>
                        </div>

                        {!! Form::close() !!}



                </div>

            </div>
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="fas fa-gavel nav-icon"></i> Itens Licitação importar/exportar</h5>
                        Selecione arquivos no formato XLSX para importar no sistema .
                    </div>
                    <h3 class="card-title">Campos para importar o layout </h3>
                    <table class="table table-bordered  text-nowrap">
                        <thead>
                            <tr>
                                <th>Quantidade Produtos</th>
                                <th>Valor total do Produto</th>
                                <th>Código do fornecedor</th>
                                <th>Código do produto</th>
                                <th>Código da licitação </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Númerico</td>
                                <td>Númerico, exemplo, 2.50 deve-se acresentar o PONTO "." </td>
                                <td>Númerico </td>
                                <td>Númerico </td>
                                <td>Númerico </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <div class="col-sm-12 ">
                    <form action="{{ route('importar.insert.licitacao.itens') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class='input-wrapper'>
                            <label for='licitacao_itens'>
                                <i class="fas fa-upload"></i> Selecionar arquivo
                            </label>
                            <input id='licitacao_itens' type='file' accept="application/xlsx" name='licitacao_itens' />
                            <span id='licitacao_itens_label'></span>

                            <a href="{{ route('export.licitacao.itens') }}">
                                <label for='export'>
                                    <i class="fas fa-download"></i> Exportar excel
                                </label>


                            </a>
                            <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Importar </button>
                        </div>

                        {!! Form::close() !!}



                </div>

            </div>
        </div>

        <div class="card-footer clearfix">

        </div>

    </div>


@section('rodape')

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script> --}}
    <!-- CALENDARIo-->
    <script src=" {{ asset('js/moment.min.js') }}"></script>
    <script src=" {{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- mask de telefone -->
    <script src=" {{ asset('js/jquery.inputmask.min.js') }}"></script>

    <!-- TOAST SWEETALERT -->
    <script src=" {{ asset('js/sweetalert2.all.js') }}"></script>
    <script src=" {{ asset('js/toastr.min.js') }}"></script>
    <!-- FIM TOAST SWEETALERT  -->
    <!-- Modulo usuarios-->
    <script src=" {{ asset('js/modulos/pessoa-cadastro.js') }}"></script>


@endsection
<script>
    setTimeout(function() {
        $('#msg').hide();
    }, 4000);

</script>
@endsection
