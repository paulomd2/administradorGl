$(document).ready(function(){
    $("#btnCadastrarMenu").click(function(){
        var titulo = $("#titulo").val().trim();
        var link = $("#link").val().trim();
        
        if(titulo == ''){
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!');
        }else{
            $.post('control/controleConteudo.php',{opcao:'cadastrarMenu',titulo:titulo,link:link});
            window.location = 'verMenus.php';
        }
    });
});