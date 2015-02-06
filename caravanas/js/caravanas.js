$.validaEmail = function (email) {
    er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
    if (er.exec(email))
        return true;
    else
        return false;
}

$(document).ready(function () {
    $("#listaTexto").load('listaTextoAjax.php');

    if ($("#telefone").length) {
        $("#telefone").mask('(99)9999-9999');
        $("#celular").mask('(99)99999-9999');
    }
    
    $("#btnCadastrarCaravana").click(function(){
        var nome = $("#nome").val().trim();
        var responsavel = $("#responsavel").val();
        var email = $("#email").val().trim();
        var telefone = $("#telefone").val();
        var celular = $("#celular").val();
        var estado = $("#estado").val().trim();
        var cidade = $("#cidade").val().trim();
        var local = $("#local").val().trim();
        
        $('.erro').html('').css('display','none');
        if(nome == ''){
            $("#nome").focus();
            $('#spanErro').html('Você deve preencher um nome!').css('display','inline-block');    
        }else if(responsavel == ''){
            $("#responsavel").focus();
            $('#spanResponsavel').html('Você deve preencher um responsável!').css('display','inline-block');    
        }else if(email == ''){
            $("#email").focus();
            $('#spanEmail').html('Você deve preencher um email!').css('display','inline-block');    
        }else if(!$.validaEmail(email)){
            $("#responsavel").focus();
            $('#spanResponsavel').html('Você deve preencher um responsável!').css('display','inline-block');    
        }
    }
    
    $("#btnCadastrarTexto").click(function () {
        CKEDITOR.instances.texto.updateElement();
        var texto = CKEDITOR.instances.texto.getData();
        var opcaoTexto = $("#opcao").val();

        $(".erro").html('Você deve preencher o texto!').css('display', 'none');
        if (texto == '') {
            texto.focus;
            $("#spanTexto").html('Você deve preencher o texto!').css('display', 'inline-block');
        } else {
            $.post('control/controleCaravanas.php', {opcao: 'texto', opcaoTexto: opcaoTexto, texto: texto},
            function (r) {
                console.log(r);
            });
            $("#listaTexto").load('listaTextoAjax.php');
        }
    })
});