@extends('adminapp')
<!-- Adicionando JQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
--}}
<script src="js/jquery-3.4.1.min.js"></script>

<!-- Adicionando Javascript -->
<script>
    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);


                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    $('#spResultado').html("Processando Aguarde ");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    });

</script>

@section('content')

    <!--dentro do formulario -->
    <div class="card">

        <div class="card-header">
            Detalhes
        </div>
        <div class="card-body">

            <div class="row">

                <div class="image col-sm-3 text-center">
                    <img src="{{ $empresa[0]->foto_caminho }}" class="brand-image img-circle elevation-3" alt="User Image"
                        width="40%" height="20%">
                    <div class="form-group">
                        <form action="{{ url('empresa/atualizar') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="{{ $empresa[0]->id }}">
                            <label for="exampleInputFile">Logomarca</label>
                            <div class="input-group">
                                <input type="file" name="foto_input" id="" required> <br>
                            </div>
                    </div>
                </div>

                @csrf
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-3 ">
                            <label>Nome Fantasia da Empresa </label>
                            <input type="text" name="nome_fantasia" class="form-control"
                                value="{{ $empresa[0]->nome_fantasia }}">
                        </div>
                        <div class="col-sm-5 ">
                            <label>Razão Social </label>
                            <input type="text" name="razao_social" class="form-control"
                                value="{{ $empresa[0]->razao_social }}">
                        </div>
                        <div class="col-sm-4 ">
                            <label>CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" class="form-control" value="{{ $empresa[0]->cnpj }}">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-6">
                            <label>Contato </label>
                            <input type="text" name="contato" class="form-control" id="contato"
                                value="{{ $empresa[0]->contato }}">
                        </div>
                        <div class="col-sm-6">
                            <label>Email </label>
                            <input type="text" name="email" class="form-control" value="{{ $empresa[0]->email }}">
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
                            <input name="cep" type="text" id="cep" value="{{ $empresa[0]->cep }}" class="form-control"
                                required />
                        </div>
                        <div class="col-sm-9">
                            <label>Rua:<b class="text-danger">*</b></label></label>
                            <input name="endereco" type="text" id="rua" size="60" value="{{ $empresa[0]->endereco }}"
                                class="form-control" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <label>Número <b class="text-danger">*</b></label></label>
                            <input name="numero" type="text" value="{{ $empresa[0]->numero }}" class="form-control"
                                required />
                        </div>

                        <div class="col-sm-10">
                            <label>Bairro:<b class="text-danger">*</b></label></label>
                            <input class="form-control" name="bairro" value="{{ $empresa[0]->bairro }}" type="text"
                                id="bairro" size="40" class="form-control" required />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Cidade:<b class="text-danger">*</b></label></label>
                            <input name="cidade" type="text" id="cidade" size="40" class="form-control"
                                value="{{ $empresa[0]->cidade }}" required />
                        </div>
                        <div class="col-sm-6">
                            <label>UF:<b class="text-danger">*</b></label></label>
                            <input name="estado" type="text" id="uf" value="{{ $empresa[0]->estado }}" size="40"
                                class="form-control" required />
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer clearfix">
            @can('alter_empresa')

                <button type="submit" class="btn btn-success"> <i class=" fas fa-save"></i> Salvar</button>


            @endcan

        </div>
        </form>
    </div>
    <!-- INPUT MASK  -->
    <script src="js/jquery.inputmask.bundle.min.js"></script>

    <script type="text/javascript">
        $j = jQuery.noConflict();

        $j(document).ready(function() {

            $j("#cep").inputmask("99.999-999");
            $j("#cnpj").inputmask("99.999.999/9999-99");
            $j("#contato").inputmask("(99) 9999-9999");
        });

    </script>

@endsection
