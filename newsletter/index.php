<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
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
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 60%;">Nome</td>
                            <td style="width: 20%;">Email</td>
                            <td style="width: 20%;">Data de Cadastro</td>
                        </tr>
                    </thead>
                    <tbody id="listaNews">
                        <?php
                        require_once '../model/banco.php';
                        require_once 'model/dao.php';

                        $news = $objNewsDao->listaEmail();

                        for ($i = 1; $i < count($news); $i++) {
                            echo '
                                        <tr>
                                            <td>' . $news[$i]["nome"] . '</td>
                                            <td>' . $news[$i]["email"] . '</td>
                                            <td>' . $news[$i]["dataCadastro"] . '</td>
                                        </tr>
                                     ';
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>
