var url = document.URL;
var split = url.split('/');
var pagina = split[split.length - 1];

count = '';
if (pagina == 'verDestaques.php') {
    count = 500;
} else {
    count = 5;
}

function delDestaque(id) {
    if (confirm("Você tem certeza que deseja excluir esse destaque?") == true) {
        $.post('control/controleDestaque.php', {opcao: 'excluir', idDestaque: id});

        $("#listaDestaques").load('listaDestaqueAjax.php?count='+count);
    }
}
$(document).ready(function () {
    $("#listaDestaques").load('listaDestaqueAjax.php?count='+count);

    $("#btnCadastrar").click(function () {
        CKEDITOR.instances.conteudo.updateElement();
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#subtitulo").val().trim();
        var link = $("#link").val().trim();
        var dataPublicacao = $("#dataPublicacao").val()+' '+$("#horaPublicacao").val()+':'+$("#minutoPublicacao").val();
        var dataSaida = $("#dataPublicacao").val()+' '+$("#horaSaida").val()+':'+$("#minutoSaida").val();
        var imagem = $("#imagem").val();
        var conteudo = CKEDITOR.instances.conteudo.getData();
        
        $(".erro").html('').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!').css('display', 'inline-block');
        } else if (subtitulo == '') {
            $("#sub").focus();
            $("#spanSub").html('Você deve preencher o Subtítulo!').css('display', 'inline-block');
        } else if (conteudo == '') {
            CKEDITOR.instances.conteudo.focus();
            $("#spanConteudo").html('Você deve preencher o Conteúdo!').css('display', 'inline-block');
        }else if(imagem == ''){
            $("#imagem").focus();
            $("#spanImagem").html('Você deve selecionar uma imagem!').css('display', 'inline-block');
        }else {
            $("#cadDestaque").submit();
            /*
            $.post('control/controleDestaque.php', {opcao: 'cadastrar', titulo: titulo, subtitulo: subtitulo, link: link, dataPublicacao: dataPublicacao, dataSaida:dataSaida, conteudo: conteudo},
            function(r){
                console.log(r);
            });
            window.location = 'verDestaques.php';
            */
        }
    });

    $("#btnAlterar").click(function () {
        CKEDITOR.instances.conteudo.updateElement();
        var titulo = $("#titulo").val().trim();
        var subtitulo = $("#subtitulo").val().trim();
        var link = $("#link").val().trim();
        var dataPublicacao = $("#dataPublicacao").val()+' '+$("#horaPublicacao").val()+':'+$("#minutoPublicacao").val();
        var dataSaida = $("#dataPublicacao").val()+' '+$("#horaSaida").val()+':'+$("#minutoSaida").val();
        var imagem = $("#imagem").val();
        var conteudo = CKEDITOR.instances.conteudo.getData();

       $(".erro").html('').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!').css('display', 'inline-block');
        } else if (subtitulo == '') {
            $("#sub").focus();
            $("#spanSub").html('Você deve preencher o Subtítulo!').css('display', 'inline-block');
        } else if (conteudo == '') {
            CKEDITOR.instances.conteudo.focus();
            $("#spanConteudo").html('Você deve preencher o Conteúdo!').css('display', 'inline-block');
        }else {
            $("#cadDestaque").submit();
            /*
            $.post('control/controleDestaque.php', {opcao: 'cadastrar', titulo: titulo, subtitulo: subtitulo, link: link, dataPublicacao: dataPublicacao, dataSaida:dataSaida, conteudo: conteudo},
            function(r){
                console.log(r);
            });
            window.location = 'verDestaques.php';
            */
        }
    });
});