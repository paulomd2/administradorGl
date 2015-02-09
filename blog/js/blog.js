$(document).ready(function(){
    $("#btnCadastrar").click(function(){
        CKEDITOR.instances.texto.updateElement();
        CKEDITOR.instances.descricaoSeo.updateElement();
        
        var titulo = $("#titulo").val().trim();
        var texto = CKEDITOR.instances.texto.getData();
        var imagem = $("#imagem").val();
        var tagSeo = $("#tagSeo").val();
        var descricaoSeo = CKEDITOR.instances.descricaoSeo.getData();
        
        $(".erro").html('').css('display','none');
        if(titulo == ''){
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o título').css('display','inline-block');
        }else if(texto == ''){
            texto.focus;
            $("#spanTexto").html('Você deve preenhcer o texto').css('display','inline-block');
        }else if(imagem == ''){
            $("#imagem").focus();
            $("#spanImagem").html('Você deve selecionar uma imagem').css('display','inline-block');
        }else if(tagSeo == ''){
            $("#tagSeo").focus();
            $("#spanTagSeo").html('Você deve preencher a tag').css('display','inline-block');
        }else if(descricaoSeo == ''){
            descricaoSeo.focus;
            $("#spanDescricaoSeo").html('Você deve preencher a descrição').css('display','inline-block');
        }else{
            $("#cadPostagem").submit();
        }
    });
});