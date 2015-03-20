<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/destaque.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
        
        <script src="../plugin/ckfinder/ckfinder.js"></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <!-- polyfiller file to detect and load polyfills -->
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
        <script>
            webshims.setOptions('waitReady', false);
            webshims.setOptions('forms-ext', {types: 'date'});
            webshims.polyfill('forms forms-ext');
        </script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <style>
            .lista_destaque{
                width: 600px;
                height: auto;
                background: none;
                border: 1px solid #a2a5a6;
                border-radius: 5px;
                margin-bottom: 10px;
                background: white;
                padding: 5px;
                overflow: hidden;
            }
            .menu-conteudo span.titMenu{
                font-size: 16px;
                color: black;
                display: block;
            }
            .menu-conteudo a{
                display: inline-block;
                font-size: 14px;
                color: #3366ff;
                text-decoration: none;
            }
            .menu-conteudo a:hover{
                text-decoration: underline;
            }
            a.linkIcon{
                color: #333;
                text-decoration: none;
            }
            ul{
                list-style: none;
            }
        </style>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Destaques</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Todos os destaques</h1>
                <a href="cadDestaque.php" class="proPage">Cadastrar destaque</a>
                Selecione o idioma:
                <select id="selLingua">
<<<<<<< HEAD
                    <option value="pt" <?php if ($_SESSION['idioma'] == 'pt') {
            echo 'selected';
        } ?>>Portugês</option>
                    <option value="en" <?php if ($_SESSION['idioma'] == 'en') {
            echo 'selected';
        } ?>>Inglês</option>
                    <option value="es" <?php if ($_SESSION['idioma'] == 'es') {
                        echo 'selected';
                    } ?>>Espanhol</option>
=======
                    <option value="pt" <?php if ($_SESSION['idioma'] == 'pt') { echo 'selected'; } ?>>Português</option>
                    <option value="en" <?php if ($_SESSION['idioma'] == 'en') { echo 'selected'; } ?>>Inglês</option>
                    <option value="es" <?php if ($_SESSION['idioma'] == 'es') { echo 'selected'; } ?>>Espanhol</option>
>>>>>>> origin/master
                </select>
                <div id="listaDestaques">
<?php
require_once 'listaDestaqueAjax.php';
?>
                </div>
            </div>
        </div>
        <script>
            $("#destaquesordem ul").sortable({
                opacity: 0.6,
                cursor: 'move',
                update: function () {
                    var order = $(this).sortable("serialize") + '&opcao=ordena';
                    $.post("control/controleDestaque.php", order, function (theResponse) {
                        console.log(theResponse);
                    });
                }
            });
        </script>
    </body>
</html>
