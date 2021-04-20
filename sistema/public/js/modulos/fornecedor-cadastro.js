$(document).ready(function() {
    // //chama a mascara do campo de telefone
    // $('[data-mask]').inputmask();
    // //Datemask dd/mm/yyyy
    // $('#datemask').inputmask('dd/mm/yyyy', {
    //     'placeholder': 'CEP'
    // })
    // $('#cep').inputmask('99.999-999');

    // function limpa_formulário_cep() {

    //     // Limpa valores do formulário de cep.
    //     $("#rua").val("");
    //     $("#bairro").val("");
    //     $("#cidade").val("");
    //     $("#uf").val("");
    //     $("#ibge").val("");
    // }

    // //Quando o campo cep perde o foco.
    // $("#cep").blur(function() {

    //     //Nova variável "cep" somente com dígitos.
    //     var cep = $(this).val().replace(/\D/g, '');

    //     //Verifica se campo cep possui valor informado.
    //     if (cep != "") {

    //         //Expressão regular para validar o CEP.
    //         var validacep = /^[0-9]{8}$/;

    //         //Valida o formato do CEP.
    //         if (validacep.test(cep)) {

    //             //Preenche os campos com "..." enquanto consulta webservice.
    //             $("#rua").val("...");
    //             $("#bairro").val("...");
    //             $("#cidade").val("...");
    //             $("#uf").val("...");
    //             $("#ibge").val("...");

    //             //Consulta o webservice viacep.com.br/
    //             $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

    //                 //Atualiza os campos com os valores da consulta.
    //                 $("#rua").val(dados.logradouro);
    //                 $("#bairro").val(dados.bairro);
    //                 $("#cidade").val(dados.localidade);
    //                 $("#uf").val(dados.uf);
    //                 $("#ibge").val(dados.ibge);


    //             });
    //         } //end if.
    //         else {
    //             //cep é inválido.
    //             limpa_formulário_cep();
    //             $('#spResultado').html("Processando Aguarde ");
    //         }
    //     } //end if.
    //     else {
    //         //cep sem valor, limpa formulário.
    //         limpa_formulário_cep();
    //     }
    // });
    // $("#radioCpf").click(function() {
    //     $("#cpf").show();
    //     $("#cnpj").hide();
    // });
    // $("#radioCnpj").click(function() {
    //     $("#cnpj").show();
    //     $("#cpf").hide();
    // });

});