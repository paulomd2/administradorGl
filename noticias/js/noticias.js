function delNoticia(id){
    if(confirm("Você tem certeza que deseja excluir essa notícia?") == true){
        $.post('control/controleNoticias.php',{opcao:'excluir',idNoticia:id});
        $("#listaNoticias").load('listaNoticiasAjax.php');
    }
}
$(document).ready(function () {
    var data = new Date();
    var dia = data.getDate();
    var mes = '' + data.getMonth() + 1;
    var ano = data.getFullYear();
    if ($("#publicacao").val() == '') {
        $("#publicacao").val(dia + '/' + mes + '/' + ano);
    }
    
    $("#publicacao").mask('99/99/9999');

    $("#btnCadastrar").click(function () {
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#sub").val().trim();
        var fonte = $("#fonte").val().trim();
        var dataPublicacao = $("#publicacao").val().trim();
        var texto = $("#texto").val().trim();
        var mercado = $("#mercado").val();

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
        } else {
            $.post('control/controleNoticias.php', {opcao: 'cadastrar', titulo: titulo, subtitulo: subtitulo, fonte: fonte, dataPublicacao: dataPublicacao, texto: texto});
            window.location = 'verNoticias.php';
        }
    });

    $("#btnAlterar").click(function () {
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#sub").val().trim();
        var fonte = $("#fonte").val().trim();
        var dataPublicacao = $("#publicacao").val().trim();
        var texto = $("#texto").val().trim();
        var idNoticia = $("#idNoticia").val();

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