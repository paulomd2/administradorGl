function delMenu(id) {
    if (confirm("Você tem certeza que deseja excluir esse Menu?") == true) {
        $.post('control/controleConteudo.php', {opcao: 'excluirMenu', idMenu: id},
        function (r) {
            console.log(r);
        });
        $("#listaMenus").load('listaMenuAjax.php');
    }
}

$(document).ready(function () {
    $("#btnCadastrarMenu").click(function () {
        var titulo = $("#titulo").val().trim();
        var link = $("#link").val().trim();

        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!');
        } else {
            $.post('control/controleConteudo.php', {opcao: 'cadastrarMenu', titulo: titulo, link: link});
            window.location = 'verMenus.php';
        }
    });


    $("#btnAlterarMenu").click(function () {
        var titulo = $("#titulo").val().trim();
        var link = $("#link").val().trim();
        var idMenu = $("#idMenu").val();

        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!');
        } else {
            $.post('control/controleConteudo.php', {opcao: 'alterarMenu', titulo: titulo, link: link, idMenu:idMenu});
           window.location = 'verMenus.php';
        }
    });
});