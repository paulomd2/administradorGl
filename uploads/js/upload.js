$(document).ready(function(){
    $("#pasta").change(function(){
        var valor = $("#pasta").val();
        
        if(valor == 'nova'){
            $("#outraPasta").css('display','inline-block');
            $("#outraPasta").val('');
        }else{
            $("#outraPasta").css('display','none');
            $("#outraPasta").val('');
        }
    });
});