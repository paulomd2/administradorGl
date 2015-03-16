idioma = 'pt';

function delMenu(id) {
    if (confirm("Você tem certeza que deseja excluir esse Menu?") == true) {
        $.post('control/controleConteudo.php', {opcao: 'excluirMenu', idMenu: id});
        $("#listaMenus").load('listaMenuAjax.php?lingua='+idioma);
    }
}

function delSubmenu(id) {
    if (confirm("Você tem certeza que deseja excluir esse Submenu?") == true) {
        $.post('control/controleConteudo.php', {opcao: 'excluirSubmenu', idSubmenu: id});

        var idMenu = $("#idMenu").val();
        $("#listaSubmenus").load('listaSubmenuAjax.php?id=' + idMenu);
    }
}

function delPagina(id) {
    if (confirm("Você tem certeza que deseja excluir essa Página?") == true) {
        $.post('control/controleConteudo.php', {opcao: 'excluirPagina', idPagina: id});
        $("#listaPaginas").load('listaPaginasAjax.php');
    }
}

$(document).ready(function () {
    $("#btnCadastrarSubmenu").click(function () {
        CKEDITOR.instances.texto.updateElement();
        //CKEDITOR.instances.descricaoMetaTag.updateElement();

        var idMenu = $("#idMenu").val();
        var tituloMenu = $("#tituloMenu").val().trim();
        var tituloPagina = $("#tituloPagina").val().trim();
        var link = $("#link").val().trim();
        var target = $("#target").val();
        var status = $("#status").val();
        var texto = CKEDITOR.instances.texto.getData();
        var tituloMetaTag = $("#tituloMetaTag").val().trim();
        var keywordsMetaTag = $("#keywordsMetaTag").val().trim();
        //var descricaoMetaTag = CKEDITOR.instances.descricaoMetaTag.getData();
        var descricaoMetaTag = $("#descricaoMetaTag").val().trim();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();
        var lingua = $("input[name='lingua']:checked").val();

        $(".erro").html('').css('display', 'none');
        if (idMenu == '') {
            $("#idMenu").focus();
            $("#spanIdMenu").html('Você precisa selecionar o Menu').css('display', 'inline-block');
        } else if (tituloMenu == '') {
            $("#tituloMenu").focus();
            $("#spanTituloMenu").html('Você precisa preencher o Título do Menu').css('display', 'inline-block');
        } else if (tituloPagina == '') {
            $("#tituloPagina").focus();
            $("#spanTituloPagina").html('Você precisa preencher o Título da Página').css('display', 'inline-block');
        } else if (target == '') {
            $("#target").focus();
            $("#spanTarget").html('Você precisa selecionar um Target para o link').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você precisa selecionar um Status').css('display', 'inline-block');
        }else if (link == '' && texto == '') {
            $("#spanBtn").html('Você precisa preencher o Link ou o texto, por favor preencha apenas uma opção').css('display', 'inline-block');
        } else if (link !== '' && texto !== '') {
            $("#spanBtn").html('Você preencheu o Link e o texto, por favor preencha apenas uma opção').css('display', 'inline-block');
        } else {
            $.post('control/controleConteudo.php', {opcao: 'cadastrarSubmenu', tituloMenu: tituloMenu, idMenu: idMenu, tituloPagina: tituloPagina, link: link, target: target, status: status, texto: texto, tituloMetaTag: tituloMetaTag, keywordsMetaTag: keywordsMetaTag, descricaoMetaTag: descricaoMetaTag, dataEntrada: dataEntrada, dataSaida: dataSaida, lingua: lingua});
            window.location = 'verSubmenus.php?id=' + idMenu;
        }
    });


    $("#btnAlterarSubmenu").click(function () {
        CKEDITOR.instances.texto.updateElement();
//        CKEDITOR.instances.descricaoMetaTag.updateElement();

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
        //var descricaoMetaTag = CKEDITOR.instances.descricaoMetaTag.getData();
        var descricaoMetaTag = $("#descricaoMetaTag").val().trim();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();
        var lingua = $("input[name='lingua']:checked").val();

        $(".erro").html('').css('display', 'none');
        if (idMenu == '') {
            $("#idMenu").focus();
            $("#spanIdMenu").html('Você precisa selecionar o Menu').css('display', 'inline-block');
        } else if (tituloMenu == '') {
            $("#tituloMenu").focus();
            $("#spanTituloMenu").html('Você precisa preencher o Título do Menu').css('display', 'inline-block');
        } else if (tituloPagina == '') {
            $("#tituloPagina").focus();
            $("#spanTituloPagina").html('Você precisa preencher o Título da Página').css('display', 'inline-block');
        } else if (target == '') {
            $("#target").focus();
            $("#spanTarget").html('Você precisa selecionar um Target para o link').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você precisa selecionar um Status').css('display', 'inline-block');
        } else if (link == '' && texto == '') {
            $("#spanBtn").html('Você precisa preencher o Link ou o texto, por favor preencha um dos dois').css('display', 'inline-block');
        } else if (link !== '' && texto !== '') {
            $("#spanBtn").html('Você preencheu o Link e o texto, por favor preencha apenas um').css('display', 'inline-block');
        } else {
            $.post('control/controleConteudo.php', {opcao: 'AlterarSubmenu', idSubmenu: idSubmenu, tituloMenu: tituloMenu, idMenu: idMenu, tituloPagina: tituloPagina, link: link, target: target, status: status, texto: texto, tituloMetaTag: tituloMetaTag, keywordsMetaTag: keywordsMetaTag, descricaoMetaTag: descricaoMetaTag, dataEntrada: dataEntrada, dataSaida: dataSaida, lingua: lingua});
            window.location = 'verSubmenus.php?id=' + idMenu;
        }
    });

    $("#btnCadastrarMenu").click(function () {
        var titulo = $("#titulo").val().trim();
        var link = $("#link").val().trim();
        var target = $("#target").val();
        var lingua = $("input[name='lingua']:checked").val();

        $(".erro").html('').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!').css('display', 'inline-block');
        } else if (target == '') {
            $("#target").focus();
            $("#spanTarget").html('Você deve selecionar um Target!').css('display', 'inline-block');
        } else {
            $.post('control/controleConteudo.php', {opcao: 'cadastrarMenu', titulo: titulo, link: link, target: target, lingua: lingua});
            window.location = 'index.php';
        }
    });


    $("#btnAlterarMenu").click(function () {
        var titulo = $("#titulo").val().trim();
        var link = $("#link").val().trim();
        var target = $("#target").val();
        var idMenu = $("#idMenu").val();
        var lingua = $("input[name='lingua']:checked").val();

        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você deve preencher o Título!');
        } else if (target == '') {
            $("#target").focus();
            $("#spanTarget").html('Você deve selecionar um Target!').css('display', 'inline-block');
        } else {
            $.post('control/controleConteudo.php', {opcao: 'alterarMenu', titulo: titulo, link: link, idMenu: idMenu, target: target, lingua: lingua});
            window.location = 'index.php';
        }
    });


    $("#btnCadastrarPagina").click(function () {
        CKEDITOR.instances.texto.updateElement();
        CKEDITOR.instances.descricaoMetaTag.updateElement();

        var titulo = $("#titulo").val().trim();
        var link = $("#link").val().trim();
        var texto = CKEDITOR.instances.texto.getData();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();
        var status = $("#status").val();
        var tituloMetaTag = $("#tituloMetaTag").val().trim();
        var keywordsMetaTag = $("#keywordsMetaTag").val().trim();
        var descricaoMetaTag = CKEDITOR.instances.descricaoMetaTag.getData();


        $(".erro").html('').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você precisa preencher o Título da Página').css('display', 'inline-block');
        } else if (link == '') {
            $("#link").focus();
            $("#spanLink").html('Você precisa preencher o link').css('display', 'inline-block');
        } else if (texto == '') {
            texto.focus;
            $("#spanTexto").html('Você precisa preencher o texto').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você precisa selecionar um Status').css('display', 'inline-block');
        } else {
            $.post('control/controleConteudo.php', {opcao: 'cadastrarPagina', titulo: titulo, link: link, status: status, texto: texto, tituloMetaTag: tituloMetaTag, keywordsMetaTag: keywordsMetaTag, descricaoMetaTag: descricaoMetaTag, dataEntrada: dataEntrada, dataSaida: dataSaida});
            window.location = 'verPaginas.php';
        }
    });


    $("#btnAlterarPagina").click(function () {
        CKEDITOR.instances.texto.updateElement();
        CKEDITOR.instances.descricaoMetaTag.updateElement();

        var idPagina = $("#idPagina").val();
        var titulo = $("#titulo").val().trim();
        var link = $("#link").val().trim();
        var texto = CKEDITOR.instances.texto.getData();
        var dataEntrada = $("#dataPublicacao").val();
        var dataSaida = $("#dataSaida").val();
        var status = $("#status").val();
        var tituloMetaTag = $("#tituloMetaTag").val().trim();
        var keywordsMetaTag = $("#keywordsMetaTag").val().trim();
        var descricaoMetaTag = CKEDITOR.instances.descricaoMetaTag.getData();


        $(".erro").html('').css('display', 'none');
        if (titulo == '') {
            $("#titulo").focus();
            $("#spanTitulo").html('Você precisa preencher o Título da Página').css('display', 'inline-block');
        } else if (link == '') {
            $("#link").focus();
            $("#spanLink").html('Você precisa preencher o link').css('display', 'inline-block');
        } else if (texto == '') {
            texto.focus;
            $("#spanTexto").html('Você precisa preencher o texto').css('display', 'inline-block');
        } else if (status == '') {
            $("#status").focus();
            $("#spanStatus").html('Você precisa selecionar um Status').css('display', 'inline-block');
        } else {
            $.post('control/controleConteudo.php', {opcao: 'alterarPagina', idPagina: idPagina, titulo: titulo, link: link, status: status, texto: texto, tituloMetaTag: tituloMetaTag, keywordsMetaTag: keywordsMetaTag, descricaoMetaTag: descricaoMetaTag, dataEntrada: dataEntrada, dataSaida: dataSaida});
            window.location = 'verPaginas.php';
        }
    });


    $("#link").blur(function () {
        var link = $("#link").val();

        $.post('control/controleConteudo.php', {opcao: 'verificaLink', link: link},
        function (r) {
            $(".erro").html('').css('display', 'none');
            if (r != 0) {
                $("#link").focus();
                $("#spanLink").html('Este link já existe').css('display', 'inline-block');
            }
        })
    });
    
    
    $("#selLingua").change(function(){
        idioma = $("#selLingua").val();
        
        $("#listaMenus").load('listaMenuAjax.php?lingua='+idioma);
    });
});