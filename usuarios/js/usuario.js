var url = document.URL;
var split = url.split('/');
var pagina = split[split.length];

count = '';
if (split[split.length] == 'verUsuarios.php' || split[split.length-1] == 'verUsuarios.php') {
    count = 500;
} else {
    count = 5;
}

$.validaEmail = function (email) {
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email))
        return true;
    else
        return false;
}

function delUsuario(id) {
    if (confirm('Você tem certeza que deseja excluir esse usuário?')) {
        $.post('control/controleUsuario.php', {opcao: 'deletar', idUsuario: id});
        $("#listaUsuarios").load("listaUsuariosAjax.php?count=" + count);
    }
}

function deslogar() {
    $.post('control/controleUsuario.php', {opcao: 'deslogar'});
    window.location='../';  
}

$(document).ready(function () {
    $("#listaUsuarios").load("listaUsuariosAjax.php?count=" + count);
    
    $("#btnCadastrar").click(function () {
        var nome = $("#nome").val().trim();
        var email = $("#email").val().trim();
        var senha = $("#senha").val().trim();
        var usuario = $("#usuario").val().trim();
        var nivel = $("#nivel").val();
        $(".erro").html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        } else if (email == '') {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher o Email!').css('display', 'inline-block');
        } else if (!$.validaEmail(email)) {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher um Email válido!').css('display', 'inline-block');
        } else if (usuario == '') {
            $("#usuario").focus();
            $("#spanUsuario").html('Você deve preencher o Usuário!').css('display', 'inline-block');
        } else if (senha == '') {
            $("#senha").focus();
            $("#spanSenha").html('Você deve preencher a Senha!').css('display', 'inline-block');
        } else if (nivel == '') {
            $("#nivel").focus();
            $("#spanNivel").html('Você deve preencher o Nível!').css('display', 'inline-block');
        } else {
            $.post('control/controleUsuario.php', {opcao: 'cadastrar', nome: nome, email: email, senha: senha, usuario: usuario, nivel: nivel},
            function (r) {
                if (r != 0) {
                    $("#email").focus();
                    $("#spanEmail").html('Esse email já está cadastrado, por favor, escolha outro!').css('display', 'inline-block');
                } else {
                    window.location = 'verUsuarios.php';
                }
            });
        }
    });
    $("#btnAlterar").click(function () {
        var nome = $("#nome").val().trim();
        var email = $("#email").val().trim();
        var senhaDigitada = $("#senha").val().trim();
        var senhaAntiga = $("#senhaAntiga").val().trim();
        var senha;
        var usuario = $("#usuario").val().trim();
        var nivel = $("#nivel").val();
        var idUsuario = $("#idUsuario").val();
        if (senhaDigitada == '') {
            senha = senhaAntiga;
        } else {
            senha = senhaDigitada;
        }

        $(".erro").html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!').css('display', 'inline-block');
        } else if (email == '') {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher o Email!').css('display', 'inline-block');
        } else if (!$.validaEmail(email)) {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher um Email válido!').css('display', 'inline-block');
        } else if (usuario == '') {
            $("#usuario").focus();
            $("#spanUsuario").html('Você deve preencher o Usuário!').css('display', 'inline-block');
        } else if (nivel == '') {
            $("#nivel").focus();
            $("#spanNivel").html('Você deve preencher o Nível!').css('display', 'inline-block');
        } else {
            $.post('control/controleUsuario.php', {opcao: 'alterar', idUsuario: idUsuario, usuario: usuario, nome: nome, email: email, senha: senha, senhaAntiga:senhaAntiga, nivel: nivel});
            window.location = 'verUsuarios.php';
        }
    });
});