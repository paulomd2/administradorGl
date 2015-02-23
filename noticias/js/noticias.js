var url = document.URL;
var split = url.split('/');
var pagina = split[split.length - 1];

count = '';
if (pagina == 'verNoticias.php') {
    count = 500;
} else {
    count = 5;
}

function delNoticia(id) {
    if (confirm("Você tem certeza que deseja excluir essa notícia?") == true) {
        $.post('control/controleNoticias.php', {opcao: 'excluir', idNoticia: id});

        $("#listaNoticias").load('listaNoticiasAjax.php?count=' + count);
    }
}


function delNoticiaBusca(id,busca) {
    if (confirm("Você tem certeza que deseja excluir essa notícia?") == true) {
        $.post('../noticias/control/controleNoticias.php', {opcao: 'excluir', idNoticia: id});

        $(".tableAll").load('listaBuscaAjax.php?modulo=noticias&busca='+busca);
    }
}
$(document).ready(function () {
    var data = new Date();
    var dia = data.getDate();
    var mes =  data.getMonth()+1;
    mes = '0'+mes;
    var ano = data.getFullYear();
    if ($("#publicacao").val() == '') {
        $("#publicacao").val(ano + '-' + mes + '-' + dia);
    }

    $("#listaNoticias").load('listaNoticiasAjax.php?count=' + count);

    $("#btnCadastrar").click(function () {
        CKEDITOR.instances.texto.updateElement();
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#sub").val().trim();
        var fonte = $("#fonte").val().trim();
        var dataPublicacao = $("#publicacao").val().trim();
        var mercado = '';
        var texto = CKEDITOR.instances.texto.getData();
        
        if ($("#mercado").is(':checked')) {
            mercado = 1;
        }else{
            mercado = 0;
        }

        $(".erro").html('');
        $('.erro').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!').css('display', 'inline-block');
        } else if (subtitulo == '') {
            $("#sub").focus();
            $("#spanSub").html('Você deve preencher o Subtítulo!').css('display', 'inline-block');
        } else if (fonte == '') {
            $("#fonte").focus();
            $("#spanFonte").html('Você deve preencher a Fonte!').css('display', 'inline-block');
        } else if (dataPublicacao == '') {
            $("#publicacao").focus();
            $("#spanPublicacao").html('Você deve preencher a Data de Publicação!').css('display', 'inline-block');
        } else {
            $.post('control/controleNoticias.php', {opcao: 'cadastrar', titulo: titulo, subtitulo: subtitulo, fonte: fonte, dataPublicacao: dataPublicacao, texto: texto, mercado:mercado});
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
        //CKeditor.focus()

        if ($("#mercado").is(':checked')) {
            mercado = 1;
        }else{
            mercado = 0;
        }

        $(".erro").html('');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!');
        } else if (subtitulo == '') {
            $("#sub").focus();
            $("#spanSub").html('Você deve preencher o Subtítulo!');
        } else if (fonte == '') {
            $("#fonte").focus();
            $("#spanFonte").html('Você deve preencher a Fonte!');
        } else if (dataPublicacao == '') {
            $("#publicacao").focus();
            $("#spanPublicacao").html('Você deve preencher a Data de Publicação!');
        } else if (texto == '') {
            $("#texto").focus();
            $("#spanTexto").html('Você deve preencher o Texto!');
        } else {
            $.post('control/controleNoticias.php', {opcao: 'alterar', idNoticia: idNoticia, titulo: titulo, subtitulo: subtitulo, fonte: fonte, dataPublicacao: dataPublicacao, mercado:mercado ,texto: texto});
            window.location = 'verNoticias.php';
        }
    });
});