<?php
session_start();
setcookie("ck_authorized", "true", 0, "/");
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once 'http://localhost/githubpaulo/administradorGl/include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/noticias.js"></script>
    </head>
    <body>
        <?php include_once 'http://localhost/githubpaulo/administradorGl/include/header.php'; ?>
        <?php include_once 'http://localhost/githubpaulo/administradorGl/include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../painel.php"><i class="icon icon-home"></i> Home</a>
                <a href="index.php">Notícias</a>
                <a href="#">Todas as notícias</a>
            </div>
            <div class="tenor">
                <h1>Todas as notícias</h1>

                <form name="cadNoticia">
                    <input type="hidden" value="<?php echo $_GET['mercado']; ?>" id="mercado"/>
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

                        <tbody id="listaNoticias">
                            <?php
                            require_once 'listaNoticiasAjax.php';
                            ?>
                        </tbody>
                    </table>
                </form>
                <a href="index.php" class="proPage">Voltar</a>
                <a href="cadNoticia.php" class="proPage">Cadastrar nova notícia</a>

            </div>
        </div>
    </body>
</html>
