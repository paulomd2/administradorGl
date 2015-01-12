$.validaEmail = function (email) {
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email))
        return true;
    else
        return false;
}

function delUsuario(id){
    if(confirm('Você tem certeza que deseja excluir esse usuário?')){
        $.post('control/controleUsuario.php',{opcao:'deletar', idUsuario:id});
        $("#listaUsuarios").load("listaUsuariosAjax.php");
    }
}

$(document).ready(function () {
    $("#btnCadastrar").click(function () {
        var nome = $("#nome").val().trim();
        var email = $("#email").val().trim();
        var senha = $("#senha").val().trim();
        var usuario = $("#usuario").val().trim();
        var nivel = $("#nivel").val();

        $(".erro").html('');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!');
        } else if (email == '') {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher o Email!');
        } else if (!$.validaEmail(email)) {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher um Email válido!');
        } else if (usuario == '') {
            $("#usuario").focus();
            $("#spanUsuario").html('Você deve preencher o Usuário!');
        } else if (senha == '') {
            $("#senha").focus();
            $("#spanSenha").html('Você deve preencher a Senha!');
        } else if (nivel == '') {
            $("#nivel").focus();
            $("#spanNivel").html('Você deve preencher o Nível!');
        } else {
            $.post('control/controleUsuario.php', {opcao: 'cadastrar', nome: nome, email: email, senha: senha, usuario: usuario, nivel: nivel});
            window.location = 'verUsuarios.php';
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
        
        if(senhaDigitada == ''){
            senha = senhaAntiga;
        }else{
            senha = senhaDigitada;
        }

        $(".erro").html('');
        if (nome == '') {
            $("#nome").focus();
            $("#spanNome").html('Você deve preencher o Nome!');
        } else if (email == '') {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher o Email!');
        } else if (!$.validaEmail(email)) {
            $("#email").focus();
            $("#spanEmail").html('Você deve preencher um Email válido!');
        } else if (usuario == '') {
            $("#usuario").focus();
            $("#spanUsuario").html('Você deve preencher o Usuário!');
        } else if (nivel == '') {
            $("#nivel").focus();
            $("#spanNivel").html('Você deve preencher o Nível!');
        } else {
            $.post('control/controleUsuario.php', {opcao: 'alterar', idUsuario:idUsuario, usuario:usuario, nome: nome, email: email, senha: senha, nivel: nivel});
            window.location = 'verUsuarios.php';
        }
    });    
});