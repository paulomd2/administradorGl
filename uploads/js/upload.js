function delPasta(pasta) {
    if (confirm('VocÃª tem certeza que deseja excluir essa pasta') == true) {
        $.post('control/controleUpload.php', {opcao: 'delPasta', pasta: pasta});
        carregaPastas();
    }
}
function delArquivo(pasta, arquivo) {
    if (confirm('VocÃª tem certeza que deseja excluir esse arquivo') == true) {
        $.post('control/controleUpload.php', {opcao: 'delArquivo', pasta: pasta, arquivo: arquivo});
        carregaArquivos(pasta);
    }
}


function carregaPastas(wPasta) {
    $.post('control/controleUpload.php', {opcao: 'listaDiretorios'},
    function (r) {
        var elemento = eval(r);
        var option = '';
        var tr = '<tr><td><a href="verArquivo.php?id=.">Pasta Raiz</a></td><td></td></tr>';

        for (i = 0; i < elemento.length; i++) {
            option += '<option value="' + elemento[i] + '">' + elemento[i] + '</option>';
            tr += '<tr><td><a href="verArquivo.php?id=' + elemento[i] + '">' + elemento[i] + '</a></td><td><a href="javascript:delPasta(\'' + elemento[i] + '\')">Excluir</td></tr>';
        }

        $("#criadas").html('');
        $("#criadas").html(option);
        $("#listaPastas").html('');
        $("#listaPastas").html(tr);

        $(".erro").html('').css('display', 'none');
        if (typeof (wPasta) != "undefined") {
            $("#pasta").val(wPasta);
            $("#outraPasta").val('').css('display', 'none');
            $("#spanPasta").css('background-color', 'rgb(106, 152, 20)');
            $("#spanPasta").html('Pasta criada com sucesso').css('display', 'inline-block');
        }

    });
}
function carregaArquivos(pasta) {
    
    $("#listaArquivos").load('listaArquivos.php?pasta='+pasta);
    /*
    $.post('control/controleUpload.php', {opcao: 'listaArquivos', pasta: pasta},
    function (r) {
        var elemento = eval(r);
        var tr = '';

        var raiz = window.location.pathname;
        raiz = raiz.split('/');
        raiz = raiz[1];

        var caminho = window.location.hostname + '/' + raiz+'/arquivos/'+pasta;
        
        for (i = 0; i < elemento.length; i++) {
            var url = caminho+'/'+ elemento[i];
            var extensao = elemento[i].substring(elemento[i].lastIndexOf('.') + 1).toLowerCase();
            var icone = '';
            if(extensao == 'jpeg' || extensao == 'jpg' || extensao == 'bmp' || extensao == 'gif' || extensao == 'png'){
                icone = '<a href="http://'+url+'"><img src="../arquivos/'+pasta+'/'+elemento[i]+'" style="width:150px" /></a>';
            }
            
            tr += '<tr><td>' + icone + '<br />' + url + '</td><td><a href="javascript:delArquivo(\'' + pasta + '\',\'' + elemento[i] + '\')">Excluir</td></tr>';
        }

        $("#listaArquivos").html('');
        $("#listaArquivos").html(tr);
    });
    */
}


$(document).ready(function () {
    if ($("#listaPastas").length) {
        carregaPastas();
    } else {
        carregaArquivos($("#pasta").val());
    }

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
            $("#spanPasta").html('VocÃª deve preencher uma pasta').css('display', 'inline-block');
            $("#outraPasta").focus();
        } else {
            $.post('control/controleUpload.php', {opcao: 'pasta', pasta: pasta});

            carregaPastas(pasta);
        }
    });
});
