function paginacao(pagina) {
    var count = $("#numNoticias").val();

    $("#listaNoticias").load('listaNoticiasAjax.php?count=' + count + '&pagina=' + pagina);
}

function delNoticia(id) {
    if (confirm("Você tem certeza que deseja excluir essa notícia?") == true) {
        $.post('control/controleNoticias.php', {opcao: 'excluir', idNoticia: id});

        $("#listaNoticias").load('listaNoticiasAjax.php?count=' + count);
    }
}


function delNoticiaBusca(id, busca) {
    if (confirm("Você tem certeza que deseja excluir essa notícia?") == true) {
        $.post('../noticias/control/controleNoticias.php', {opcao: 'excluir', idNoticia: id});

        $(".tableAll").load('listaBuscaAjax.php?modulo=noticias&busca=' + busca);
    }
}
$(document).ready(function () {
    var url = document.URL;
    var split = url.split('/');
    var pagina = split[split.length - 1];

    count = '';
    if (pagina == 'verNoticias.php') {
        count = 10;
    } else {
        count = 5;
    }

    var data = new Date();
    var dia = data.getDate();
    var mes = data.getMonth() + 1;
    mes = '0' + mes;
    var ano = data.getFullYear();
    if ($("#publicacao").val() == '') {
        $("#publicacao").val(ano + '-' + mes + '-' + dia);
    }

    if ($("#listaNoticias").length) {
        $("#listaNoticias").load('listaNoticiasAjax.php?count=10');
    }else{
        $("#listaNoticiasIndex").load('listaNoticiasAjaxIndex.php');
    }
//    $("#listaNoticias").load('listaNoticiasAjax.php');

    $("#btnCadastrar").click(function () {
        CKEDITOR.instances.texto.updateElement();
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#sub").val().trim();
        var fonte = $("#fonte").val().trim();
        var dataPublicacao = $("#publicacao").val().trim();
        var mercado = '';
        var texto = CKEDITOR.instances.texto.getData();
        var status = $("#status").val();

        if ($('#lblMercado').prop('checked')) {
            mercado = 1;
        } else {
            mercado = 0;
        }

        $(".erro").html('').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!').css('display', 'inline-block');
        } else if (texto == '') {
            texto.focus();
            $("#spanTexto").html('Você deve preencher o texto!').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve preencher o status!').css('display', 'inline-block');
        } else {
            $.post('control/controleNoticias.php', {opcao: 'cadastrar', titulo: titulo, subtitulo: subtitulo, fonte: fonte, dataPublicacao: dataPublicacao, texto: texto, mercado: mercado, status: status});
            window.location = 'verNoticias.php';
        }
    });

    $("#btnAlterar").click(function () {
        CKEDITOR.instances.texto.updateElement();
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#sub").val().trim();
        var fonte = $("#fonte").val().trim();
        var dataPublicacao = $("#publicacao").val().trim();
        var idNoticia = $("#idNoticia").val();
        var mercado = '';
        var texto = CKEDITOR.instances.texto.getData();
        var status = $("#status").val();

        if ($('#lblMercado').prop('checked')) {
            mercado = 1;
        } else {
            mercado = 0;
        }

        $(".erro").html('').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!').css('display', 'inline-block');
        } else if (texto == '') {
            $("#texto").focus();
            $("#spanTexto").html('Você deve preencher o Texto!').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve preencher o status!').css('display', 'inline-block');
        } else {
            $.post('control/controleNoticias.php', {opcao: 'alterar', idNoticia: idNoticia, titulo: titulo, subtitulo: subtitulo, fonte: fonte, dataPublicacao: dataPublicacao, mercado: mercado, texto: texto, status: status});
            window.location = 'verNoticias.php';
        }
    });

    $("#numNoticias").change(function () {
        var limite = $("#numNoticias").val();

        $("#listaNoticias").load('listaNoticiasAjax.php?count=' + limite);
    });
});