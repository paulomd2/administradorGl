<?php
@session_start();
@$idUsuario = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/blog.js"></script>
    </head>
</head>
<body>
    <?php include_once '../include/header.php'; ?>
    <?php include_once '../include/lateral.php'; ?>

    <div class="main-admin">
        <div class="guia-site">
            <a href="../home"><i class="icon icon-home"></i> Home</a>
            <a href="./">Blog</a>
            <a href="#">Todas Postagens</a>
        </div>
        <div class="tenor" style="overflow: hidden!important;">
            <h1>Todas Postagens</h1> <a href="cadPostagem.php" class="proPage">Cadastrar postagens</a>
            <table class="tableAll">
                <thead>
                    <tr>
                        <td>Título</td>
                        <td>Editar</td>
                        <td>Excluir</td>
                    </tr>
                </thead>
                <tbody id="listaPostagens"></tbody>
            </table>
        </div>
    </div>
</body>
</html>
