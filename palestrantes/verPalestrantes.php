<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/palestrantes.js"></script>
    </head>
    <body>
        <?php
        include_once '../include/header.php';
        include_once '../include/lateral.php';
        ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Palestrantes</a>
                <a href="#">Todos os palestrantes</a>
            </div>
            <div class="tenor">
                <h1>Todos os palestrantes</h1>
                <a href="cadPalestrante.php" class="proPage">Cadastrar palestrante</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Imagem</td>
                            <td>alterar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaPalestrantes"></tbody>
                </table>
            </div>
        </div>
    </body>
</html>
