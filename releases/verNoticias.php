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
                <a href="#"><i class="icon icon-home"></i> Home</a>
                <a href="#">Notícias</a>
            </div>
            <div class="tenor">
                <h1>Ver notícias</h1>

                <form name="cadNoticia">
                    <input type="hidden" value="<?php echo $_GET['mercado']; ?>" id="mercado"/>
                    <table>
                        <thead>
                            <tr>
                                <td>Título</td>
                                <td>Sub-título</td>
                                <td>Fonte</td>
                                <td>Data de Publicação</td>
                                <td>Texto</td>
                                <td>Alterar</td>
                                <td>Excluir</td>
                            </tr>
                        </thead>

                        <tbody id="listaNoticias">
                            <?php
                            require_once 'listaNoticiasAjax.php';
                            ?>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </body>
</html>
