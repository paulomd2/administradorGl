<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/banners.js"></script>
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
