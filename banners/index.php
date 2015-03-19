<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/banners.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <script>

            $(document).ready(function () {

                $("#bannersordem ul").sortable({
                    opacity: 0.6,
                    cursor: 'move',
                    update: function () {
                        var order = $(this).sortable("serialize") + '&opcao=ordena';
                        $.post("control/controleBanners.php", order, function (theResponse) {
                            console.log(theResponse);
                        });
                    }
                });

            });
        </script>
        <style>
            .lista_banner{
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
        </style>

    </head>
    <body>
        <?php
        include_once '../include/header.php';
        include_once '../include/lateral.php';
        ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Banners</a>
            </div>
            <div class="tenor">
                <h1>Todos os banners</h1>
                <a href="cadBanner.php" class="proPage">Cadastrar banner</a>
                Selecione o idioma:
                <select id="selLingua">
                    <option value="pt" <?php if ($_SESSION['idioma'] == 'pt') {
            echo 'selected';
        } ?>>Portugês</option>
                    <option value="en" <?php if ($_SESSION['idioma'] == 'en') {
            echo 'selected';
        } ?>>Inglês</option>
                    <option value="es" <?php if ($_SESSION['idioma'] == 'es') {
                        echo 'selected';
                    } ?>>Espanhol</option>
                </select>
                <div id="listaBanners">
<?php
require_once 'listaBannersAjax.php';
?>
                </div>
            </div>
        </div>
    </body>
</html>
