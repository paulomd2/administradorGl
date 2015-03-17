var url = document.URL;
var split = url.split('/');
var pagina = split[split.length - 1];
lingua = 'pt';

count = '';
if (pagina == 'verEventos.php') {
    count = 500;
} else {
    count = 5;
}

function delEvento(id) {
    if (confirm("Você tem certeza que deseja remover esse evento?")) {
        $.post('control/controleEventos.php', {opcao: 'excluir', idEvento: id});

        if ($("#listaEventosProximo").length) {
            $("#listaEventosProximo").load('listaEventosAjax.php?count=' + count + '&d=proximo&lingua='+lingua);
        } else {
            $("#listaEventosAnterior").load('listaEventosAjax.php?count=' + count + '&d=anterior&lingua='+lingua);
        }
    }
}

function delEventoBusca(id, busca) {
    if (confirm("Você tem certeza que deseja remover esse evento?")) {
        $.post('../eventos/control/controleEventos.php', {opcao: 'excluir', idEvento: id});

        $(".tableAll").load('listaBuscaAjax.php?modulo=eventos&busca=' + busca);
    }
}

$(document).ready(function () {
    evento = '';
    if ($("#listaEventosProximo").length) {
        $("#listaEventosProximo").load('listaEventosAjax.php?count=' + count + '&d=Proximo');
        evento = 'proximo';
    } else {
        $("#listaEventosAnterior").load('listaEventosAjax.php?count=' + count + '&d=Anterior');
        evento = 'anterior';
    }

    $("#btnCadastrar").click(function () {
        //var titulo = $("#titulo").val().trim();
        var nome = $("#nome").val().trim();
        var dataInicio = $("#dataInicio").val().trim();
        var dataFim = $("#dataFim").val().trim();
        var tituloMetaTag = $("#tituloMetaTag").val().trim();
        var keywordsMetatag = $("#keywordsMetaTag").val().trim();
        var descricaoMetaTag = $("#descricaoMetaTag").val().trim();
        var imagem = $("#imagem").val().trim();

        $(".erro").html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        } /*else if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Titulo!').css('display', 'inline-block');
        } */else if (dataInicio == '') {
            $("#dataInicio").focus();
            $("#spanDataInicio").html('Você deve preencher a Data de Início!').css('display', 'inline-block');
        } else if (dataFim == '') {
            $("#dataFim").focus();
            $("#spanDataFim").html('Você deve preencher a Data de Fim!').css('display', 'inline-block');
        } else if (imagem == '') {
            $("#imagem").focus();
            $("#spanImagem").html('Você deve selecionar uma imagem!').css('display', 'inline-block');
        } else {
            $("#cadEvento").submit();
        }

    });

    $("#btnAlterar").click(function () {
        //var titulo = $("#titulo").val().trim();
        var nome = $("#nome").val().trim();
        var dataInicio = $("#dataInicio").val();
        var dataFim = $("#dataFim").val();
        var tituloMetaTag = $("#tituloMetaTag").val().trim();
        var keywordsMetatag = $("#keywordsMetaTag").val().trim();
        var descricaoMetaTag = $("#descricaoMetaTag").val().trim();

        $(".erro").html('');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!');
        } /*else if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Titulo!');
        } */else if (dataInicio == '') {
            $("#dataInicio").focus();
            $("#spanDataInicio").html('Você deve preencher a Data de Início!');
        } else if (dataFim == '') {
            $("#dataFim").focus();
            $("#spanDataFim").html('Você deve preencher a Data de Fim!');
        } else {
            $("#altEvento").submit();
        }
    });

    $("#selLingua").change(function () {
        lingua = $("#selLingua").val();
        var pagina = split[split.length - 1];

        count = '';
        if (pagina == 'verEventos.php') {
            count = 500;
        } else {
            count = 5;
        }
        
        if (evento == 'proximo') {
            $("#listaEventosProximo").load('listaEventosAjax.php?count=' + count + '&d=Proximo&lingua='+lingua);
        } else {
            $("#listaEventosAnterior").load('listaEventosAjax.php?count=' + count + '&d=Anterior&lingua='+lingua);
        }        
    });
});