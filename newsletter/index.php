<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script src="js/newsletter.js"></script>
    </head>
    <body>
        <?php
        include_once '../include/header.php';
        include_once '../include/lateral.php';
        ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Administração</a>
                <a href="./">newsletter</a>
            </div>
            <div class="tenor">
                <h1>Todos os emails</h1>
                <a href="exportar.php" class="proPage">Exportar CSV</a>
                Exibir por página <select id="numNews">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 50%;">Nome</td>
                            <td style="width: 30%;">E-mail</td>
                            <td style="width: 20%; text-align: center;">Data de Cadastro</td>
                        </tr>
                    </thead>
                    <tbody id="listaNews"></tbody>
                </table>

            </div>
        </div>
    </body>
</html>
