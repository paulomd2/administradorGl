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
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/noticias.js"></script>
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
                <h1>Todas as notícias</h1>

                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 60%;">Título</td>
                            <td style="width: 20%;">Data de Publicação</td>
                            <!--<td>Sub-título</td>-->
                            <!--<td>Fonte</td>-->
                            <!--<td>Texto</td>-->
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>

                    <tbody id="listaNoticias"></tbody>
                </table>
                <a href="index.php" class="proPage">Voltar</a>
                <a href="cadNoticia.php" class="proPage">Cadastrar nova notícia</a>

            </div>
        </div>
    </body>
</html>
