function load_page(arquivo){
    if(arquivo){

        $.ajax({
            type:'GET',
            data:arquivo,
            url:arquivo,

            success:function(data){

                $("#pagina_retorno").html(data)
            }

        });

    }
}
