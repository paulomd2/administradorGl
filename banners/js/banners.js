function delRelease(id) {
    if (confirm("Você tem certeza que deseja excluir esse banner?") == true) {
        $.post('control/controleBanners.php', {opcao: 'excluir', idBanner: id});
        $("#listaBanners").load('listaBannersAjax.php?count=5');
    }
}
$(document).ready(function () {
    $("#listaBanners").load('listaBannersAjax.php?count=5');

    $("#btnCadastrar").click(function () {
        var nome = $("#nome").val().trim();
        var link = $("#link").val().trim();
        var target = $("#target").val();
        var status = $("#status").val();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();
        var imagem = $("#imagem").val();
        
        $(".erro").html('');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!');
        } else if (link == '') {
            $("#link").focus();
            $("#spanLink").html('Você deve preencher o Link!');
        } else if(target == ''){
            $("#target").focus();
            $("#spanTarget").html('Você deve selecionar o Target!');
        }else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar o Status!');
        } else if(dataEntrada == ''){
            $("#dataPublicacao").focus();
            $("#spanDataPublicacao").html('Você deve selecionar a data de Publicação!');
        } else if (imagem == '') {
            $("#imagem").focus();
            $("#spanImagem").html('Você deve selecionsr a Imagem!');
        } else {
           $("#cadBanner").submit();
        }
    });

    $("#btnAlterar").click(function () {
        var nome = $("#nome").val().trim();
        var link = $("#link").val().trim();
        var target = $("#target").val();
        var status = $("#status").val();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();
        var imagem = $("#imagem").val();
        
        $(".erro").html('');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!');
        } else if (link == '') {
            $("#link").focus();
            $("#spanLink").html('Você deve preencher o Link!');
        } else if(target == ''){
            $("#target").focus();
            $("#spanTarget").html('Você deve selecionar o Target!');
        }else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar o Status!');
        } else if(dataEntrada == ''){
            $("#dataPublicacao").focus();
            $("#spanDataPublicacao").html('Você deve selecionar a data de Publicação!');
        } else {
           $("#altBanner").submit();
        }
    });
});