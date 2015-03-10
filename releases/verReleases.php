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
        <script type="text/javascript" src="js/releases.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="/">Releases</a>
                <a href="#">Todos os releases</a>
            </div>
            <div class="tenor">
                <h1>Todos os releases</h1>
                <a href="cadRelease.php" class="proPage">Cadastrar release</a>
                selecione o idioma:
                <select id="selIdioma">
                    <option value="pt">Portugês</option>
                    <option value="en">Inglês</option>
                    <option value="es">Espanhol</option>
                </select>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 60%;">Título</td>
                            <td style="width: 20%;">Mês</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaReleases">
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>
