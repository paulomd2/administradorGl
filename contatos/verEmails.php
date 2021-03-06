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
                <a href="./">Contatos</a>
                <a href="#">Todos os emails</a>
            </div>
            <div class="tenor">
                <h1>Todos os emails</h1>
                <a href="cadEmail.php" class="proPage">Cadastrar novo email</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 50%;">Email</td>
                            <td style="width: 20%;">Nome</td>
                            <td style="width: 10%;">Principal</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaEmails"></tbody>
                </table>
            </div>
        </div>
    </body>
</html>
