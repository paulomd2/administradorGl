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
                <a href="index.php">Banners</a>
                <a href="#">Todos os banners</a>
            </div>
            <div class="tenor">
                <h1>Todos os banners</h1>
                <a href="cadBanner.php" class="proPage">Cadastrar banner</a>
                <div id="listaBanners">
                    <?php
                    require_once 'listaBannersAjax.php';
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
