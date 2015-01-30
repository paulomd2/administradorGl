/*
 * acho que não vou usar isso
 var url = document.URL;
 var split = url.split('/');
 var pagina = split[split.length - 1];
 
 count = '';
 if (pagina == 'verNoticias.php') {
 count = 500;
 } else {
 count = 5;
 }
 */
$.validaEmail = function (email) {
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email))
        return true;
    else
        return false;
}

function delEmail(id) {
    if (confirm("Você tem certeza que deseja excluir esse email?") == true) {
        $.post('control/controleEmail.php', {opcao: 'excluir', idEmail: id});

        //$("#listaEmails").load('listaEmailsAjax.php?count='+count);
        $("#listaEmails").load('listaEmailsAjax.php');
    }
}
$(document).ready(function () {
    //$("#listaEmails").load('listaEmailsAjax.php?count='+count);
    $("#listaEmails").load('listaEmailsAjax.php');

    $("#btnCadastrar").click(function () {
        var nome = $("#nome").val().trim();
        var email = $("#email").val().trim();

        $(".erro").html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        } else if (email == '') {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher o Email!').css('display', 'inline-block');
        } else if (!$.validaEmail(email)) {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher um Email válido!').css('display', 'inline-block');;
        } else {
            $.post('control/controleContatos.php', {opcao: 'cadastrarEmail', nome: nome, email: email});
            window.location = 'index.php';
        }
    });

    $("#btnAlterar").click(function () {
        var nome = $("#nome").val().trim();
        var email = $("#email").val().trim();
        var idEmail = $("#idEmail").val();
        
        $(".erro").html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        } else if (email == '') {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher o Email!').css('display', 'inline-block');
        } else if (!$.validaEmail(email)) {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher um Email válido!').css('display', 'inline-block');;
        } else {
            $.post('control/controleContatos.php', {opcao: 'alterarEmail', nome: nome, email: email, idEmail:idEmail});
            window.location = 'index.php';
        }
    });
});