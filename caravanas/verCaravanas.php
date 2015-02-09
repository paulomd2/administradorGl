<?php
session_start();
setcookie("ck_authorized", "true", 0, "/");
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/caravanas.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="index.php">Notícias</a>
                <a href="#">Todas as notícias</a>
            </div>
            <div class="tenor">
                <h1>Últimas Caravanas</h1><a href="cadCaravana.php" class="proPage">Cadastrar Caravanas</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td>nome</td>
                            <td>responsável</td>
                            <td>email</td>
                            <td>telefone</td>
                            <td>celular</td>
                            <td>local</td>
                            <td>cidade</td>
                            <td>estado</td>
                            <td>alterar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaCaravanas"></tbody>
                </table>
            </div>
        </div>
    </body>
</html>
