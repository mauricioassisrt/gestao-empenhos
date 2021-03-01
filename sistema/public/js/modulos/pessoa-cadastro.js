//chama a mascara do campo de telefone
$('[data-mask]').inputmask();
//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })

//funcao verifica senhas iguais no front-end no cadastro novo usuario
$(".verificaSenha").blur(function() {

    senha1 = $("#password").val();
    senha2 = $("#password-confirm").val();
    senha_antiga = $(".senhaAntiga").val();

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    if (!senha1 || !senha2) {
        toastr.warning('Digite uma senha antes de processeguir  !!!!')

        $("#botaoSalvarUser").hide();

    } else if ((!senha1 && !senha2) || senha1 == senha2) {

        toastr.success('Senhas são iguais!!!!')

        $("#botaoSalvarUser").show();
    } else {
        toastr.error('Senhas são diferentes !!!!')

        $("#botaoSalvarUser").hide();

    }
    senha1 = "";
    senha2 = "";


});
// fim função
//verifica usuario já cadastrado
$(".verificaSenhaAntiga").blur(function() {

    senha1 = $("#password").val();
    senha2 = $("#password-confirm").val();

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });

    if (!senha1 || !senha2) {
        toastr.warning('Digite a ultima senha utilizada anteriormente  !!!!')

        $("#botaoSalvarUser").hide();

    } else if ((!senha1 && !senha2) || senha1 == senha2) {

        toastr.success('Senhas são iguais!!!!')

        $("#botaoSalvarUser").show();
    } else {
        toastr.error('Senhas são diferentes !!!!')

        $("#botaoSalvarUser").hide();

    }



});