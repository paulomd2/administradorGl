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
    var data = new Date();
    var dia = data.getDate();
    var mes = data.getMonth() + 1;
    mes = '0' + mes;
    var ano = data.getFullYear();
    
    if($("#dataPublicacao").length && $("#dataPublicacao").val() == ''){
        $("#dataPublicacao").val(ano + '-' + mes + '-' + dia);
    }
    
    $("#btnCadastrar").click(function () {
        var nome = $("#nome").val().trim();
        var status = $("#status").val();
        var imagem = $("#imagem").val();

        $('.erro').html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Vcoê deve preencher um nome!').css('display', 'inline-block');
        } else if(status == ''){
            $("#status").focus();
            $("#spanStatus").html('Vcoê deve preencher um status!').css('display', 'inline-block');
        } else if(imagem == ''){
            $("#imagem").focus();
            $("#spanImagem").html('Vcoê deve selecionar uma imagem!').css('display', 'inline-block');
        } else {
            $("#cadExpositor").submit();
        }
    });

    $("#btnAlterar").click(function () {
        var nome = $("#nome").val().trim();
        var status = $("#status").val();
        var imagem = $("#imagem").val();

        $('.erro').html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Vcoê deve preencher um nome!').css('display', 'inline-block');
        } else if(status == ''){
            $("#status").focus();
            $("#spanStatus").html('Vcoê deve preencher um status!').css('display', 'inline-block');
        } else if(imagem == ''){
            $("#imagem").focus();
            $("#spanImagem").html('Vcoê deve selecionar uma imagem!').css('display', 'inline-block');
        } else {
            $("#altExpositor").submit();
        }
    })
});