function delEvento(id){
    if(confirm("Você tem certeza que deseja remover esse evento?")){
        $.post('control/controleEventos.php',{opcao:'excluir', idEvento:id});
        $("#listaEventos").load('listaEventosAjax.php');
    }
}
$(document).ready(function () {
    $("#dataInicio").mask('99/99/9999');
    $("#dataFim").mask('99/99/9999');
    
    $("#btnCadastrar").click(function () {
        var titulo = $("#titulo").val().trim();
        var nome = $("#nome").val().trim();
        var dataInicio = $("#dataInicio").val().trim();
        var dataFim = $("#dataFim").val().trim();
        var tituloMetaTag = $("#tituloMetaTag").val().trim();
        var keywordsMetatag = $("#keywordsMetaTag").val().trim();
        var descricaoMetaTag = $("#descricaoMetaTag").val().trim();
        var imagem = $("#imagem").val().trim();
        
        
        $(".erro").html('');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!');
        }else if(titulo == ''){
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Titulo!');
        }else if(dataInicio == ''){
            $("#dataInicio").focus();
            $("#spanDataInicio").html('Você deve preencher a Data de Início!');
        }else if(dataFim == ''){
            $("#dataFim").focus();
            $("#spanDataFim").html('Você deve preencher a Data de Fim!');
        }else if(imagem == ''){
            $("#imagem").focus();
            $("#spanImagem").html('Você deve selecionar uma imagem!');
        }else if(tituloMetaTag == ''){
            $("#tituloMetaTag").focus();
            $("#spanTituloMetaTag").html('Você deve preencher o Título da Metatag!');
        }else if(keywordsMetatag == ''){
            $("#keywordsMetaTag").focus();
            $("#spanKeywordsMetaTag").html('Você deve preencher as Keywords da Metatag!');
        }else if(descricaoMetaTag == ''){
            $("#descricaoMetaTag").focus();
            $("#spanDescricaoMetaTag").html('Você deve preencher a Descrição da Metatag!');
        }else{
            $("#cadEvento").submit();
        }

    });
    
    
    $("#btnAlterar").click(function () {
        var titulo = $("#titulo").val().trim();
        var nome = $("#nome").val().trim();
        var dataInicio = $("#dataInicio").val().trim();
        var dataFim = $("#dataFim").val().trim();
        var tituloMetaTag = $("#tituloMetaTag").val().trim();
        var keywordsMetatag = $("#keywordsMetaTag").val().trim();
        var descricaoMetaTag = $("#descricaoMetaTag").val().trim();
        var imagem = $("#imagem").val().trim();
        
        
        $(".erro").html('');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!');
        }else if(titulo == ''){
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Titulo!');
        }else if(dataInicio == ''){
            $("#dataInicio").focus();
            $("#spanDataInicio").html('Você deve preencher a Data de Início!');
        }else if(dataFim == ''){
            $("#dataFim").focus();
            $("#spanDataFim").html('Você deve preencher a Data de Fim!');
        }else if(tituloMetaTag == ''){
            $("#tituloMetaTag").focus();
            $("#spanTituloMetaTag").html('Você deve preencher o Título da Metatag!');
        }else if(keywordsMetatag == ''){
            $("#keywordsMetaTag").focus();
            $("#spanKeywordsMetaTag").html('Você deve preencher as Keywords da Metatag!');
        }else if(descricaoMetaTag == ''){
            $("#descricaoMetaTag").focus();
            $("#spanDescricaoMetaTag").html('Você deve preencher a Descrição da Metatag!');
        }else{
            $("#altEvento").submit();
        }

    });
});