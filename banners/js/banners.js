function paginacao(pagina) {
    var count = $("#numBanner").val();
    
    $("#listaBanners").load('listaBannersAjax.php?count=' + count + '&pagina=' + pagina);
}

function delBanner(id) {
    if (confirm("Você tem certeza que deseja excluir esse banner?") == true) {
        $.post('control/controleBanners.php', {opcao: 'excluir', idBanner: id});
        var lingua = $("#selLingua").val();
        $("#listaBanners").load('listaBannersAjax.php?lingua=' + lingua);
    }
}


function delBannerBusca(id, busca) {
    if (confirm("Você tem certeza que deseja excluir esse banner?") == true) {
        $.post('../banners/control/controleBanners.php', {opcao: 'excluir', idBanner: id});

        $("#bannersBusca").load('listaBuscaAjax.php?modulo=banners&busca=' + busca);
    }
}
$(document).ready(function () {
    var data = new Date();
    var dia = data.getDate();
    var mes = data.getMonth() + 1;
    mes = '0' + mes;
    var ano = data.getFullYear();
    if ($("#dataPublicacao").length && $("#dataPublicacao").val() == '') {
        $("#dataPublicacao").val(ano + '-' + mes + '-' + dia);
    }

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
        } else if (target == '') {
            $("#target").focus();
            $("#spanTarget").html('Você deve selecionar o Target!');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar o Status!');
        } else if (dataEntrada == '') {
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
        } else if (target == '') {
            $("#target").focus();
            $("#spanTarget").html('Você deve selecionar o Target!');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar o Status!');
        } else if (dataEntrada == '') {
            $("#dataPublicacao").focus();
            $("#spanDataPublicacao").html('Você deve selecionar a data de Publicação!');
        } else {
            $("#altBanner").submit();
        }
    });

    $("#selLingua").change(function () {
        var lingua = $("#selLingua").val();
        $("#listaBanners").load('listaBannersAjax.php?lingua=' + lingua);
    });


    $("#numBanner").change(function () {
        var limite = $("#numBanner").val();
        var lingua = $("#selLingua").val();

        $("#listaBanners").load('listaBannersAjax.php?count=' + limite + '&d=Proximo&lingua=' + lingua);
    })
});