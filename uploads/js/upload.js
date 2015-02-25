function carregaPastas(wPasta) {
    $.post('control/controleUpload.php', {opcao: 'listaDiretorios'},
    function (r) {
        var elemento = eval(r);
        var option = '';


        console.log(elemento);
        for (i = 0; i < elemento.length; i++) {
            //  console.log('<option value="' + elemento[i] + '">' + elemento[i] + '</option>');
            option += '<option value="' + elemento[i] + '">' + elemento[i] + '</option>';
        }

        $("#criadas").html('');
        $("#criadas").html(option);

        $(".erro").html('').css('display', 'none');
        if (typeof (wPasta) != "undefined") {
            $("#pasta").val(wPasta);
            $("#outraPasta").val('').css('display', 'none');
            $("#spanPasta").css('background-color','rgb(106, 152, 20)');
            $("#spanPasta").html('Pasta criada com sucesso').css('display', 'inline-block');
        }

    });
}

$(document).ready(function () {
    carregaPastas();

    $('#file_upload').uploadify();
    
    $("#pasta").change(function () {
        var pasta = $("#pasta").val();

        if (pasta == 'nova') {
            $("#outraPasta").css('display', 'inline-block');
            $("#outraPasta").val('');
        } else {
            $("#outraPasta").css('display', 'none');
            $("#outraPasta").val('');
        }
        
        $('#file_upload').uploadify({
            'formData': {
                'folder': $("#pasta").val()
            },
            'swf': '../plugin/uploadify/uploadify.swf',
            'uploader': '../plugin/uploadify/uploadify.php'
        });
    });

    $("#btnPasta").click(function () {
        var select = $("#pasta").val();
        var pasta = '';

        if (select == 'nova') {
            pasta = $("#outraPasta").val();
        } else if (select != '') {
            pasta = $("#pasta").val();
        }

        $(".erro").html('').css('display', 'none');
        if (select == 'nova' && pasta == '') {
            $("#spanPasta").html('Você deve preencher uma pasta').css('display', 'inline-block');
            $("#outraPasta").focus();
        } else {
            $.post('control/controleUpload.php', {opcao: 'pasta', pasta: pasta});

            carregaPastas(pasta);
        }
    });
});