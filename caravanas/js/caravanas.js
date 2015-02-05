
$(document).ready(function(){
    $("#btnCadastrarTexto").click(function(){
        CKEDITOR.instances.texto.updateElement();
        var texto = CKEDITOR.instances.texto.getData();
        
        $(".erro").html('Você deve preencher o texto!').css('display','none');
        if(texto == ''){
            texto.focus;
            $("#spanTexto").html('Você deve preencher o texto!').css('display','inline-block');
        }else{
            $.post('control/controleCaravanas.php',{opcao:'texto',texto:texto},
            function(r){
                console.log(r);
            })
        }
    })
});