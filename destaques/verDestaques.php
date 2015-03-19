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
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/destaque.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="index.php">Destaques</a>
                <a href="#">Todos os destaques</a>
            </div>
            <div class="tenor">
                <h1>Todos os destaques</h1>
                <a href="cadDestaque.php" class="proPage">Cadastrar destaque</a>
                Selecione o idioma:
                <select id="selLingua">
                    <option value="pt" <?php if($_SESSION['idioma'] == 'pt'){ echo 'selected'; } ?>>Portugês</option>
                    <option value="en" <?php if($_SESSION['idioma'] == 'en'){ echo 'selected'; } ?>>Inglês</option>
                    <option value="es" <?php if($_SESSION['idioma'] == 'es'){ echo 'selected'; } ?>>Espanhol</option>
                </select>
                <div id="listaDestaques">
                    <?php require_once 'listaDestaqueAjax.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>