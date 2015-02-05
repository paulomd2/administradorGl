<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/expositores.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Expositores</a>
                <a href="#">Todos os expositores</a>
            </div>
            <div class="tenor">
                <h1>Todos os expositores</h1>
                <a href="cadExpositor.php" class="proPage">Cadastrar expositores</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Imagem</td>
                            <td>Editar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaExpositores"></tbody>
                </table>
            </div>
        </div>
    </body>
</html>
