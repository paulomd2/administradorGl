var url = document.URL;
var split = url.split('/');
var pagina = split[split.length - 1];

count = '';
if (pagina == 'verPostagens.php') {
    count = 500;
} else {
    count = 5;
}


function delPostagem(id){
    if(confirm("Você tem certeza que deseja excluir essa postagem?")== true){
        $.post('control/controlePostagem.php',{opcao:'excluir',idPostagem:id});
        $("#listaPostagens").load('listaPostagensAjax.php?id='+count);
    }
}

$(document).ready(function(){
    $("#listaPostagens").load('listaPostagensAjax.php?id='+count);

    var data = new Date();
    var dia = data.getDate();
    var mes = data.getMonth() + 1;
    mes = '0' + mes;
    var ano = data.getFullYear();
    if($("#dataPublicacao").length && $("#dataPublicacao").val() == ''){
        $("#dataPublicacao").val(ano + '-' + mes + '-' + dia);
    }
    
    $("#btnCadastrar").click(function(){
        CKEDITOR.instances.texto.updateElement();
        
        var titulo = $("#titulo").val().trim();
        var texto = CKEDITOR.instances.texto.getData();
        var dataPublicacao = $("#dataPublicacao").val();
        
        $(".erro").html('').css('display','none');
        if(titulo == ''){
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o título').css('display','inline-block');
        }else if(dataPublicacao == ''){
            $("#dataPublicacao").focus();
            $("#spanDataPublicacao").html('Você deve preencher a data de publicação').css('display','inline-block');
        }else if(texto == ''){
            texto.focus;
            $("#spanTexto").html('Você deve preenhcer o texto').css('display','inline-block');
        }else{
            $("#cadPostagem").submit();
        }
    });
    
    
    $("#btnAlterar").click(function(){
        CKEDITOR.instances.texto.updateElement();
        
        var titulo = $("#titulo").val().trim();
        var texto = CKEDITOR.instances.texto.getData();
        var dataPublicacao = $("#dataPublicacao").val();
        var status = $("#status").val();
        
        $(".erro").html('').css('display','none');
        if(titulo == ''){
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o título').css('display','inline-block');
        }else if(dataPublicacao == ''){
            $("#dataPublicacao").focus();
            $("#spanDataPublicacao").html('Você deve preencher a data de publicação').css('display','inline-block');
        }else if(texto == ''){
            texto.focus;
            $("#spanTexto").html('Você deve preenhcer o texto').css('display','inline-block');
        }else{
            $("#altPostagem").submit();
        }
    });
});