var url = document.URL;
var split = url.split('/');
var pagina = split[split.length - 1];

count = '';
if (pagina == 'verPalestrantes.php') {
    count = 500;
} else {
    count = 5;
}

function delExpositor(id){
    if(confirm("você tem certeza que deseja excluir esse palestrante?")== true){
        $.post('control/controlePalestrantes.php',{opcao:'excluir',idPalestrante:id});
        $("#listaPalestrantes").load('listaPalestrantesAjax.php?count=' + count);
    }
}

//function delExpositorBusca(id, busca){
//    if(confirm("você tem certeza que deseja excluir esse expositor?")== true){
//        $.post('../expositores/control/controleExpositores.php',{opcao:'excluir',idPalestrante:id});
//        
//        $(".tableAll").load('listaBuscaAjax.php?modulo=expositores&busca='+busca);
//    }
//}
$(document).ready(function () {
    $("#listaPalestrantes").load('listaPalestrantesAjax.php?count=' + count);
    
    $("#btnCadastrar").click(function () {
        var nome = $("#nome").val().trim();
        var curriculo = $("#curriculo").val().trim();
        var status = $("#status").val();

        $('.erro').html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Vcoê deve preencher um nome!').css('display', 'inline-block');
        } else if(curriculo == ''){
            $("#texto").focus();
            $("#spanTexto").html('Vcoê deve preencher o currículo!').css('display', 'inline-block');
        } else if(status == ''){
            $("#status").focus();
            $("#spanStatus").html('Vcoê deve preencher um status!').css('display', 'inline-block');
        }  else {
            $("#cadExpositor").submit();
        }
    });

    $("#btnAlterar").click(function () {
        var nome = $("#nome").val().trim();
        var curriculo = $("#texto").val().trim();
        var status = $("#status").val();

        $('.erro').html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Vcoê deve preencher um nome!').css('display', 'inline-block');
        } else if(status == ''){
            $("#status").focus();
            $("#spanStatus").html('Vcoê deve preencher um status!').css('display', 'inline-block');
        } else if(curriculo == ''){
            $("#texto").focus();
            $("#spanTexto").html('Vcoê deve preencher o currículo!').css('display', 'inline-block');
        } else {
            $("#altExpositor").submit();
        }
    })
});