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

        $("#listaNoticias").load('listaNoticiasAjax.php?count='+count);
    }
}
$(document).ready(function () {
    $("#listaDestaques").load('listaDestaquesAjax.php?count='+count);

    $("#btnCadastrar").click(function () {
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#sub").val().trim();
        var link = $("#link").val().trim();
        var dataPublicacao = $("#dataPublicacao").val()+' '+$("#horaPublicacao").val()+':'+$("#minutoPublicacao").val();
        var dataSaida = $("#dataPublicacao").val()+' '+$("#horaSaida").val()+':'+$("#minutoSaida").val();
        CKEDITOR.instances.conteudo.updateElement();
        var conteudo = CKEDITOR.instances.descnotificacao;
        //CKeditor.focus()

        $(".erro").html('');
        $('.erro').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!').css('display', 'inline-block');
        } else if (subtitulo == '') {
            $("#sub").focus();
            $("#spanSub").html('Você deve preencher o Subtítulo!').css('display', 'inline-block');
        } else if (conteudo == '') {
            $("#fonte").focus();
            $("#spanFonte").html('Você deve preencher a Fonte!').css('display', 'inline-block');
        } else {
            $.post('control/controleDestaque.php', {opcao: 'cadastrar', titulo: titulo, subtitulo: subtitulo, link: link, dataPublicacao: dataPublicacao, dataSaida:dataSaida, conteudo: conteudo});
            window.location = 'verDestaques.php';
        }
    });

    $("#btnAlterar").click(function () {
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#sub").val().trim();
        var fonte = $("#fonte").val().trim();
        var dataPublicacao = $("#publicacao").val().trim();
        var texto = $("#texto").val().trim();
        var idNoticia = $("#idNoticia").val();
        var mercado = $("#mercado").val();
        CKEDITOR.instances.texto.updateElement();
        var CKeditor = CKEDITOR.instances.descnotificacao;
        //CKeditor.focus()

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
            $.post('control/controleNoticias.php', {opcao: 'alterar', idNoticia: idNoticia, titulo: titulo, subtitulo: subtitulo, fonte: fonte, dataPublicacao: dataPublicacao, texto: texto});
            window.location = 'index.php';
        }
    });
});