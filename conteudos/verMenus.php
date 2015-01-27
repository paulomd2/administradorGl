<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Notícias</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Ver menus</h1>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 80%;">Título</td>
                            <!--<td>Link</td>-->
                            <td style="width: 10%;">Editar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaMenus">
                        <?php
                        require_once './listaMenuAjax.php';
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>