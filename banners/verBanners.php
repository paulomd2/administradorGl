<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/banners.js"></script>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <script>

            $(document).ready(function () {

                $("#contentLeft ul").sortable({
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
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Banners</a>
            </div>
            <div class="tenor">
                <h1>Ver banners</h1>

                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 60%;">titulo</td>
                            <td style="width: 20%;">mes</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>

                    <tbody id="listaReleases">
                        <?php
                        require_once 'listaBannersAjax.php';
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>
