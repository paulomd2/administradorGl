function trocaSenha() {
    var email = $("#email").val();
    var mensagem = '';

    $(".erro").html('').css('display', 'none');
    if (email == '') {
        $("#spanEmail").html('Você deve preencher um email').css('display', 'inline-block');
        $("#email").focus();
    } else {
        $.post('control/controleIndex.php', {opcao: 'esqueciSenha', email: email},
        function (r) {
            if (r == 0) {
                $("#spanEmail").html('este usuário não está cadastrado').css('display', 'inline-block');
                $("#email").focus();
            } else {
                $("#spanEmail").html('Alteração de senha realizada com sucesso, por favor verifique o seu email!').css('display', 'inline-block');
                $("#spanEmail").css('background-color','#6a9814');
                $("#email").focus();
            }
        })
    }
}

function logar() {
    var usuario = $("#usuario").val().trim();
    var senha = $("#senha").val().trim();

    $('.erro').html('').css('display', 'none');
    if (usuario == '') {
        $("#usuario").focus();
        $("#spanUsuario").html('Você deve preencher um usuário').css('display', 'inline-block');
    } else if (senha == '') {
        $("#senha").focus();
        $("#spanUsuario").html('Você deve preencher uma senha').css('display', 'inline-block');
    } else {
        $.post('control/controleIndex.php', {opcao: 'verificaLogin', usuario: usuario, senha: senha},
        function (r) {
            if (r == 0) {
                $("#usuario").focus();
                $("#senha").val('');
                $("#spanUsuario").html('Usuário ou senha incorretos, tente novamente!').css('display', 'inline-block');
            } else {
                window.location = 'home';
            }
        })
    }
}
$(document).ready(function () {
    $("#btnLogar").click(function () {
        logar();
    });
    $('#frmLogin').keypress(function (e) {
        /* * verifica se o evento é Keycode (para IE e outros browsers) * se não for pega o evento Which (Firefox) */
        var tecla = (e.keyCode ? e.keyCode : e.which);
        /* verifica se a tecla pressionada foi o ENTER */
        if (tecla == 13) {
            logar();
        }
    });



    $("#btnTrocarSenha").click(function () {
        trocaSenha();
    });
    $('#frmTrocarSenha').keypress(function (e) {
        var tecla = (e.keyCode ? e.keyCode : e.which);

        console.log(tecla);

        if (tecla == 13) {
            e.preventDefault();
            trocaSenha();
        }
    });

});