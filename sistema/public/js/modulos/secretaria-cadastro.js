$j = jQuery.noConflict();

$j(document).ready(function() {

    $j("#cep").inputmask("99.999-999");
    $j("#cnpj").inputmask("99.999.999/9999-99");
    $j("#contato").inputmask("(99) 9999-9999");

    //funcao verifica email valido
    $("#email").blur(function() {
        var email = $('#email').val();

        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email)) {
            toastr.error("E-mail invalido !!");
            return false;
        } else {
            toast.success('E-mail válido ');
            return true;
        }
    });
});

// //fim da funcao verifica email