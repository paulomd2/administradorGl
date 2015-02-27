var url = document.URL;
var split = url.split('/');
var pagina = split[split.length - 1];

count = '';
if (pagina == 'verExpositores.php') {
    count = 500;
} else {
    count = 5;
}

function delExpositor(id){
    if(confirm("você tem certeza que deseja excluir esse expositor?")== true){
        $.post('control/controleExpositores.php',{opcao:'excluir',idExpositor:id});
        $("#listaExpositores").load('listaExpositoresAjax.php?count=' + count);
    }
}

function delExpositorBusca(id, busca){
    if(confirm("você tem certeza que deseja excluir esse expositor?")== true){
        $.post('../expositores/control/controleExpositores.php',{opcao:'excluir',idExpositor:id});
        
        $(".tableAll").load('listaBuscaAjax.php?modulo=expositores&busca='+busca);
    }
}
$(document).ready(function () {
    $("#listaExpositores").load('listaExpositoresAjax.php?count=' + count);

    $("#btnCadastrar").click(function () {
        var nome = $("#nome").val().trim();
        var link = $("#link").val().trim();
        var estande = $("#estande").val().trim();
        var dataPublicacao = $("#dataPublicacao").val().trim();

        $('.erro').html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Vcoê deve preencher um nome!').css('display', 'inline-block');
        } else if (link == '') {
            $("#link").focus();
            $("#spanLink").html('Vcoê deve preencher um link!').css('display', 'inline-block');
        } else if (estande == '') {
            $("#estande").focus();
            $("#spanEstande").html('Vcoê deve preencher um estande!').css('display', 'inline-block');
        } else if (dataPublicacao == '') {
            $("#dataPublicacao").focus();
            $("#spanDataPublicacao").html('Vcoê deve preencher uma data!').css('display', 'inline-block');
        } else {
            $("#cadExpositor").submit();
        }
    });

    $("#btnAlterar").click(function () {
        var nome = $("#nome").val().trim();
        var link = $("#link").val().trim();
        var estande = $("#estande").val().trim();
        var dataPublicacao = $("#dataPublicacao").val();

        $('.erro').html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Vcoê deve preencher um nome!').css('display', 'inline-block');
        } else if (link == '') {
            $("#link").focus();
            $("#spanLink").html('Vcoê deve preencher um link!').css('display', 'inline-block');
        } else if (estande == '') {
            $("#estande").focus();
            $("#spanEstande").html('Vcoê deve preencher um estande!').css('display', 'inline-block');
        } else if (dataPublicacao == '') {
            $("#dataPublicacao").focus();
            $("#spanDataPublicacao").html('Vcoê deve preencher uma data!').css('display', 'inline-block');
        } else {
            $("#altExpositor").submit();
        }
    })
});