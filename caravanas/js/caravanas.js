var url = document.URL;
var split = url.split('/');
var pagina = split[split.length - 1];

count = '';
if (pagina == 'verNoticias.php') {
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

function delCaravana(id) {
    if (confirm("Você tem certeza que deseja excluir essa caravana?") == true) {
        $.post('control/controleCaravanas.php', {opcao: 'excluirCaravana', idCaravana: id});
        
        $("#listaCaravanas").load('listaCaravanasAjax.php?count=' + count);
    }
}


function delCaravanaBusca(id,busca) {
    if (confirm("Você tem certeza que deseja excluir essa caravana?") == true) {
        $.post('../caravanas/control/controleCaravanas.php', {opcao: 'excluirCaravana', idCaravana: id});
        
        $(".tableAll").load('listaBuscaAjax.php?modulo=caravanas&busca='+busca);
    }
}

$(document).ready(function () {
    $("#listaCaravanas").load('listaCaravanasAjax.php?count=' + count);

    if ($("#telefone").length) {
        $("#telefone").mask('(99)9999-9999');
        $("#celular").mask('(99)99999-9999');
    }

    $("#btnCadastrarCaravana").click(function () {
        var nome = $("#nome").val().trim();
        var responsavel = $("#responsavel").val();
        var email = $("#email").val();
        var telefone = $("#telefone").val();
        var celular = $("#celular").val();
        var estado = $("#estado").val().trim();
        var cidade = $("#cidade").val().trim();
        var local = $("#local").val().trim();

        $('.erro').html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $('#spanNome').html('Você deve preencher um nome!').css('display', 'inline-block');
        } else if (responsavel == '') {
            $("#responsavel").focus();
            $('#spanResponsavel').html('Você deve preencher um responsável!').css('display', 'inline-block');
        } else if (email != '' && !$.validaEmail(email)) {
            $("#email").focus();
            $('#spanEmail').html('Você deve preencher um email válido!').css('display', 'inline-block');
        } else if (telefone == '' && celular == '') {
            $("#telefone").focus();
            $('#spanTelefone').html('Você deve preencher, pelo menos, um telefone!').css('display', 'inline-block');
        } else if (estado == '') {
            $("#estado").focus();
            $('#spanEstado').html('Você deve selecionar um estado!').css('display', 'inline-block');
        } else if (cidade == '') {
            $("#cidade").focus();
            $('#spanCidade').html('Você deve preencher uma cidade!').css('display', 'inline-block');
        } else if (local == '') {
            $("#local").focus();
            $('#spanLocal').html('Você deve preencher um local!').css('display', 'inline-block');
        } else {
            $.post('control/controleCaravanas.php', {opcao: 'cadastrarCaravana', nome: nome, responsavel: responsavel, email: email, telefone: telefone, celular: celular, estado: estado, cidade: cidade, local: local});
            window.location = 'verCaravanas.php';
        }

    });

    $("#btnAlterarCaravana").click(function () {
        var nome = $("#nome").val().trim();
        var responsavel = $("#responsavel").val();
        var email = $("#email").val().trim();
        var telefone = $("#telefone").val();
        var celular = $("#celular").val();
        var estado = $("#estado").val().trim();
        var cidade = $("#cidade").val().trim();
        var local = $("#local").val().trim();
        var idCaravana = $("#idCaravana").val();

        $('.erro').html('').css('display', 'none');
        if (nome == '') {
            $("#nome").focus();
            $('#spanNome').html('Você deve preencher um nome!').css('display', 'inline-block');
        } else if (responsavel == '') {
            $("#responsavel").focus();
            $('#spanResponsavel').html('Você deve preencher um responsável!').css('display', 'inline-block');
        } else if (email == '') {
            $("#email").focus();
            $('#spanEmail').html('Você deve preencher um email!').css('display', 'inline-block');
        } else if (!$.validaEmail(email)) {
            $("#email").focus();
            $('#spanEmail').html('Você deve preencher um email válido!').css('display', 'inline-block');
        } else if (telefone == '' && celular == '') {
            $("#telefone").focus();
            $('#spanTelefone').html('Você deve preencher, pelo menos, um telefone!').css('display', 'inline-block');
        } else if (estado == '') {
            $("#estado").focus();
            $('#spanEstado').html('Você deve selecionar um estado!').css('display', 'inline-block');
        } else if (cidade == '') {
            $("#cidade").focus();
            $('#spanCidade').html('Você deve preencher uma cidade!').css('display', 'inline-block');
        } else if (local == '') {
            $("#local").focus();
            $('#spanLocal').html('Você deve preencher um local!').css('display', 'inline-block');
        } else {
            $.post('control/controleCaravanas.php', {opcao: 'alterarCaravana', idCaravana: idCaravana, nome: nome, responsavel: responsavel, email: email, telefone: telefone, celular: celular, estado: estado, cidade: cidade, local: local});
            window.location = 'verCaravanas.php';
        }

    });

    $("#btnCadastrarTexto").click(function () {
        CKEDITOR.instances.texto.updateElement();
        var texto = CKEDITOR.instances.texto.getData();
        var opcaoTexto = $("#opcao").val();

        $(".erro").html('Você deve preencher o texto!').css('display', 'none');
        if (texto == '') {
            texto.focus;
            $("#spanTexto").html('Você deve preencher o texto!').css('display', 'inline-block');
        } else {
            $.post('control/controleCaravanas.php', {opcao: 'texto', opcaoTexto: opcaoTexto, texto: texto});
        }
    });
});