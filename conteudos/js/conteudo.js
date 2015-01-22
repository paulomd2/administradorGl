function delMenu(id) {
    if (confirm("Você tem certeza que deseja excluir esse Menu?") == true) {
        $.post('control/controleConteudo.php', {opcao: 'excluirMenu', idMenu: id});
        $("#listaMenus").load('listaMenuAjax.php');
    }
}

function delSubmenu(id) {
    if (confirm("Você tem certeza que deseja excluir esse Submenu?") == true) {
        $.post('control/controleConteudo.php', {opcao: 'excluirSubmenu', idSubmenu: id},
        function (r) {
            console.log(r);
        });
        $("#listaSubmenus").load('listaSubmenuAjax.php');
    }
}

$(document).ready(function () {

    $("#dataPublicacao").mask('99/99/9999');
    $("#dataSaida").mask('99/99/9999');
    
    $("#btnCadastrarSubmenu").click(function () {
        CKEDITOR.instances.texto.updateElement();

        var idMenu = $("#idMenu").val();
        var tituloMenu = $("#tituloMenu").val().trim();
        var tituloPagina = $("#tituloPagina").val().trim();
        var link = $("#link").val().trim();
        var target = $("#target").val();
        var status = $("#status").val();
        var texto = CKEDITOR.instances.texto.getData();
        var tituloMetaTag = $("#tituloMetaTag").val().trim();
        var keywordsMetaTag = $("#keywordsMetaTag").val().trim();
        var descricaoMetaTag = $("#descricaoMetaTag").val().trim();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();

        $(".erro").html('');
        if (idMenu == '') {
            $("#idMenu").focus();
            $("#spanIdMenu").html('Você precisa selecionar o Menu');
        } else if (tituloMenu == '') {
            $("#tituloMenu").focus();
            $("#spanTituloMenu").html('Você precisa preencher o Título do Menu');
        } else if (tituloPagina == '') {
            $("#tituloPagina").focus();
            $("#spanTituloPagina").html('Você precisa preencher o Título da Página');
        } else if (target == '') {
            $("#target").focus();
            $("#spanTarget").html('Você precisa selecionar um Target para o link');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você precisa selecionar um Status');
        } else if (tituloMetaTag == '') {
            $("#tituloMetaTag").focus();
            $("#spanTituloMetaTag").html('Você precisa preencher o Título da Metatag');
        } else if (keywordsMetaTag == '') {
            $("#keywordsMetaTag").focus();
            $("#spanKeywordsMetaTag").html('Você precisa preencher as Keywords da Metatag');
        } else if (descricaoMetaTag == '') {
            $("#descricaoMetaTag").focus();
            $("#spanDescricaoMetaTag").html('Você precisa preencher a Descrição da Metatag');
        } else if (link == '' && texto == '') {
            $("#spanBtn").html('Você precisa preencher o Link ou o texto, por favor preencha um dos dois');
        } else if (link !== '' && texto !== '') {
            $("#spanBtn").html('Você preencheu o Link e o texto, por favor preencha apenas um');
        } else {
            $.post('control/controleConteudo.php',{opcao: 'cadastrarSubmenu', tituloMenu: tituloMenu, idMenu: idMenu, tituloPagina: tituloPagina, link: link, target: target, status: status, texto: texto, tituloMetaTag: tituloMetaTag, keywordsMetaTag: keywordsMetaTag, descricaoMetaTag: descricaoMetaTag, dataEntrada:dataEntrada, dataSaida:dataSaida});
        }
    });


    $("#btnAlterarSubmenu").click(function () {
        CKEDITOR.instances.texto.updateElement();

        var idSubmenu = $("#idSubmenu").val();
        var idMenu = $("#idMenu").val();
        var tituloMenu = $("#tituloMenu").val().trim();
        var tituloPagina = $("#tituloPagina").val().trim();
        var link = $("#link").val().trim();
        var target = $("#target").val();
        var status = $("#status").val();
        var texto = CKEDITOR.instances.texto.getData();
        var tituloMetaTag = $("#tituloMetaTag").val().trim();
        var keywordsMetaTag = $("#keywordsMetaTag").val().trim();
        var descricaoMetaTag = $("#descricaoMetaTag").val().trim();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();

        $(".erro").html('');
        if (idMenu == '') {
            $("#idMenu").focus();
            $("#spanIdMenu").html('Você precisa selecionar o Menu');
        } else if (tituloMenu == '') {
            $("#tituloMenu").focus();
            $("#spanTituloMenu").html('Você precisa preencher o Título do Menu');
        } else if (tituloPagina == '') {
            $("#tituloPagina").focus();
            $("#spanTituloPagina").html('Você precisa preencher o Título da Página');
        } else if (target == '') {
            $("#target").focus();
            $("#spanTarget").html('Você precisa selecionar um Target para o link');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você precisa selecionar um Status');
        } else if (tituloMetaTag == '') {
            $("#tituloMetaTag").focus();
            $("#spanTituloMetaTag").html('Você precisa preencher o Título da Metatag');
        } else if (keywordsMetaTag == '') {
            $("#keywordsMetaTag").focus();
            $("#spanKeywordsMetaTag").html('Você precisa preencher as Keywords da Metatag');
        } else if (descricaoMetaTag == '') {
            $("#descricaoMetaTag").focus();
            $("#spanDescricaoMetaTag").html('Você precisa preencher a Descrição da Metatag');
        } else if (link == '' && texto == '') {
            $("#spanBtn").html('Você precisa preencher o Link ou o texto, por favor preencha um dos dois');
        } else if (link !== '' && texto !== '') {
            $("#spanBtn").html('Você preencheu o Link e o texto, por favor preencha apenas um');
        } else {
            $.post('control/controleConteudo.php', {opcao: 'AlterarSubmenu', idSubmenu: idSubmenu, tituloMenu: tituloMenu, idMenu: idMenu, tituloPagina: tituloPagina, link: link, target: target, status: status, texto: texto, tituloMetaTag: tituloMetaTag, keywordsMetaTag: keywordsMetaTag, descricaoMetaTag: descricaoMetaTag, dataEntrada: dataEntrada, dataSaida: dataSaida},
            function(r){
                console.log(r);
            });
            //window.location = 'verSubmenus.php';
        }
    });

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
            $.post('control/controleConteudo.php', {opcao: 'alterarMenu', titulo: titulo, link: link, idMenu: idMenu});
            window.location = 'verMenus.php';
        }
    });

    $("#dataSaida").blur(function () {
        if ($("#dataSaida").val() == '') {
            $("#dataSaida").val('00/00/0000');
        }
    });
    
    $("#dataPublicacao").blur(function () {
        if ($("#dataPublicacao").val() == '') {
            $("#dataPublicacao").val('00/00/0000');
        }
    });
});