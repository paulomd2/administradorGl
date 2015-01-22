function delRelease(id) {
    if (confirm("Você tem certeza que deseja excluir esse release?") == true) {
        $.post('control/controleReleases.php', {opcao: 'excluir', idRelease: id});
        $("#listaReleases").load('listaReleasesAjax.php?count=5');
    }
}
$(document).ready(function () {
    $("#listaReleases").load('listaReleasesAjax.php?count=5');

    $("#dataPublicacao").mask('99/99/9999');
    $("#dataSaida").mask('99/99/9999');

    $("#btnCadastrar").click(function () {
        CKEDITOR.instances.texto.updateElement();
        var titulo = $("#titulo").val().trim();
        var mes = $("#mes").val().trim();
        var status = $("#status").val().trim();
        var texto = CKEDITOR.instances.texto.getData();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();

        $(".erro").html('');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!');
        } else if (mes == '') {
            $("#mes").focus();
            $("#spanMes").html('Você deve selecionar o Mes!');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar o Status!');
        } else if (texto == '') {
            $("#texto").focus();
            $("#spanTexto").html('Você deve preencher o Texto!');
        } else {
            $.post('control/controleReleases.php', {opcao: 'cadastrar', titulo: titulo, mes: mes, status: status, texto: texto, dataEntrada:dataEntrada, dataSaida:dataSaida});
            $("#listaReleases").load('listaReleasesAjax.php');
        }
    });

    $("#btnAlterar").click(function () {
        CKEDITOR.instances.texto.updateElement();
        var titulo = $("#titulo").val().trim();
        var mes = $("#mes").val().trim();
        var status = $("#status").val().trim();
        var texto = CKEDITOR.instances.texto.getData();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();
        var idRelease = $("#idRelease").val();

        $(".erro").html('');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!');
        } else if (mes == '') {
            $("#mes").focus();
            $("#spanMes").html('Você deve selecionar o Mes!');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar o Status!');
        } else if (texto == '') {
            $("#texto").focus();
            $("#spanTexto").html('Você deve preencher o Texto!');
        } else {
            $.post('control/controleReleases.php', {opcao: 'alterar', idRelease: idRelease, titulo: titulo, mes: mes, status: status, texto: texto, dataEntrada:dataEntrada, dataSaida:dataSaida},
            function (r) {
                console.log(r);
            });
            //window.location = 'verNoticias.php';
        }
    });

    $("#dataSaida").blur(function () {
        if ($("#dataSaida").val() == '') {
            $("#dataSaida").val('00/00/0000');
        }
    });

    $("#dataPublicacao").blur(function () {
        if ($("#dataPublicacao").val() == '') {
            $("#dataPublicacao").val('00/00/0000');
        }
    });
});