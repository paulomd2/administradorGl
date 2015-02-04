var url = document.URL;
var split = url.split('/');
var pagina = split[split.length - 1];

count = '';
if (pagina == 'verDestaques.php') {
    count = 500;
} else {
    count = 5;
}

function delCategoria(id) {
    if (confirm("Você tem certeza que deseja excluir essa categoria?") == true) {
        $.post('control/controleRodape.php', {opcao: 'excluirCategoria', idCategoria: id},
        function(r){
            console.log(r);
        });
        $("#listaCategorias").load('listaCategoriasAjax.php?count='+count);
    }
}
$(document).ready(function () {
    $("#listaCategorias").load('listaCategoriasAjax.php?count='+count);

    $("#btnCadastrarCategoria").click(function () {
        var nome = $("#nome").val().trim();
        var identificador = $("#identificador").val();
        
        $(".erro").html('').css('display','none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display','inline-block');
        } else if (identificador == '') {
            $("#identificador").focus();
            $("#spanIdentificador").html('Você deve selecionsr um identificador!').css('display','inline-block');
        } else {
           $.post('control/controleRodape.php',{opcao:'cadastrarCategoria', nome:nome, identificador:identificador});
           window.location = 'verCategorias.php';
        }
    });

    $("#btnAlterarCategoria").click(function () {
        var nome = $("#nome").val().trim();
        var identificador = $("#identificador").val();
        var idCategoria = $("#idCategoria").val()
        
        $(".erro").html('').css('display','none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display','inline-block');
        } else if (identificador == '') {
            $("#identificador").focus();
            $("#spanIdentificador").html('Você deve selecionsr um identificador!').css('display','inline-block');
        } else {
           $.post('control/controleRodape.php',{opcao:'alterarCategoria', idCategoria:idCategoria, nome:nome, identificador:identificador});
           window.location = 'verCategorias.php';
        }
    });
});