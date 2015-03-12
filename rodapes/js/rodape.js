var url = document.URL;
var split = url.split('/');
var pagina = split[split.length - 1];
lingua = 'pt';

count = '';
if (pagina == 'verDestaques.php') {
    count = 500;
} else {
    count = 5;
}

function delCategoria(id) {
    if (confirm("Você tem certeza que deseja excluir essa categoria?") == true) {
        $.post('control/controleRodape.php', {opcao: 'excluirCategoria', idCategoria: id});
        $("#listaCategorias").load('listaCategoriasAjax.php?count=' + count+'&lingua='+lingua);
    }
}

function delImagem(id) {
    if (confirm("Você tem certeza que deseja excluir essa imagem?") == true) {
        $.post('control/controleRodape.php', {opcao: 'excluirImagem', idImagem: id});

        var idCategoria = $("#idCategoria").val();
        $("#listaImagens").load('listaImagensAjax.php?count=' + count + '&id=' + idCategoria);
    }
}

$(document).ready(function () {
    $("#listaCategorias").load('listaCategoriasAjax.php?count=' + count);

    $("#btnCadastrarCategoria").click(function () {
        var nome = $("#nome").val().trim();
        var identificador = $("#identificador").val();
        var lingua = $("input[name='lingua']:checked").val();
        var status = $("#status").val();

        $(".erro").html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionsr um status!').css('display', 'inline-block');
        } else {
            $.post('control/controleRodape.php', {opcao: 'cadastrarCategoria', nome: nome, status: status, lingua: lingua});
            window.location = 'verCategorias.php';
        }
    });

    $("#btnAlterarCategoria").click(function () {
        var nome = $("#nome").val().trim();
        var status = $("#status").val();
        var idCategoria = $("#idCategoria").val()
        var lingua = $("input[name='lingua']:checked").val();

        $(".erro").html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionsr um status!').css('display', 'inline-block');
        } else {
            $.post('control/controleRodape.php', {opcao: 'alterarCategoria', idCategoria: idCategoria, nome: nome, status: status, lingua: lingua},
            function (r) {
                console.log(r);
            });
            //window.location = 'verCategorias.php';
        }
    });


    $("#btnCadImagem").click(function () {
        var nome = $("#nome").val().trim();
        var status = $("#status").val();
        var imagem = $("#imagem").val();

        $(".erro").html("").css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher um nome!').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar um status!').css('display', 'inline-block');
        } else if (imagem == '') {
            $("#imagem").focus();
            $("#spanImagem").html('Você deve selecionar uma imagem!').css('display', 'inline-block');
        } else {
            $("#cadImagem").submit();
        }
    });


    $("#btnAltImagem").click(function () {
        var nome = $("#nome").val().trim();
        var status = $("#status").val();

        $(".erro").html("").css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher um nome!').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você deve selecionar um status!').css('display', 'inline-block');
        } else {
            $("#cadImagem").submit();
        }
    });


    $("#selLingua").change(function () {
        lingua = $("#selLingua").val();
        var pagina = split[split.length - 1];

        count = '';
        if (pagina == 'verDestaques.php') {
            count = 500;
        } else {
            count = 5;
        }

        $("#listaCategorias").load('listaCategoriasAjax.php?count=' + count+'&lingua='+lingua);
    });
});