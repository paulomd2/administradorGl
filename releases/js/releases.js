count = '';

function paginacao(pagina) {
    var count = $("#numRelease").val();

    $("#listaReleases").load('listaReleasesAjax.php?count=' + count + '&pagina=' + pagina);
}

function delReleaseBusca(id, busca) {
    if (confirm("Você tem certeza que deseja excluir esse release?") == true) {
        $.post('../releases/control/controleReleases.php', {opcao: 'excluir', idRelease: id},
        function (r) {
            console.log(r);
        });

        $(".tableAll").load('listaBuscaAjax.php?modulo=releases&busca=' + busca);
    }
}

function delRelease(id) {
    if (confirm("Você tem certeza que deseja excluir esse release?") == true) {
        $.post('control/controleReleases.php', {opcao: 'excluir', idRelease: id});
        var idioma = $("#selIdioma").val();
        
        if ($("#listaReleases").length) {
            $("#listaReleases").load('listaReleasesAjax.php?count=' + count + '&lingua=' + idioma);
        } else {
            $("#listaReleasesIndex").load('listaReleasesAjaxIndex.php?count=' + count + '&lingua=' + idioma);
        }
    }
}
$(document).ready(function () {
    url = document.URL;
    split = url.split('/');
    pagina = split[split.length - 1];

    if (pagina == 'verReleases.php') {
        count = 10;
    } else {
        count = 5;
    }

    if ($("#listaReleases").length) {
        $("#listaReleases").load('listaReleasesAjax.php?count=' + count);
    } else {
        $("#listaReleasesIndex").load('listaReleasesAjaxIndex.php?count=' + count);
    }


    var data = new Date();
    var dia = data.getDate();
    var mes = data.getMonth() + 1;
    mes = '0' + mes;
    var ano = data.getFullYear();
    if ($("#dataPublicacao").length && $("#dataPublicacao").val() == '') {
        $("#dataPublicacao").val(ano + '-' + mes + '-' + dia);
    }

    $("#btnCadastrar").click(function () {
        CKEDITOR.instances.texto.updateElement();
        var titulo = $("#titulo").val().trim();
        var mes = $("#mes").val().trim();
        var status = $("#status").val();
        var texto = CKEDITOR.instances.texto.getData();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();
        var lingua = $("input[name='lingua']:checked").val();

        $(".erro").html('').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!').css('display', 'inline-block');
        } else if (mes == '') {
            $("#mes").focus();
            $("#spanMes").html('Você deve selecionar o Mes!').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar o Status!').css('display', 'inline-block');
        } else if (texto == '') {
            texto.focus;
            $("#spanTexto").html('Você deve preencher o Texto!').css('display', 'inline-block');
        } else {
            $.post('control/controleReleases.php', {opcao: 'cadastrar', titulo: titulo, mes: mes, status: status, texto: texto, dataEntrada: dataEntrada, dataSaida: dataSaida, lingua: lingua});
            window.location = 'verReleases.php';
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
        var lingua = $("input[name='lingua']:checked").val();

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
            $.post('control/controleReleases.php', {opcao: 'alterar', idRelease: idRelease, titulo: titulo, mes: mes, status: status, texto: texto, dataEntrada: dataEntrada, dataSaida: dataSaida, lingua: lingua});
            window.location = 'verReleases.php';
        }
    });

    $("#selIdioma").change(function () {
        var pagina = split[split.length - 1];
        var idioma = $("#selIdioma").val();

        count = '';
        if (pagina == 'verReleases.php') {
            count = 500;
        } else {
            count = 5;
        }


        $("#listaReleases").load('listaReleasesAjax.php?count=' + count + '&lingua=' + idioma);
    });


    $("#numRelease").change(function () {
        var limite = $("#numRelease").val();

        $("#listaReleases").load('listaReleasesAjax.php?count=' + limite);
    });
});