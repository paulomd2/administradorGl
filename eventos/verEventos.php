<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/eventos.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="/">Eventos</a>
                <a href="#">Todos os evento</a>
            </div>
            <div class="tenor">
                <h1>Todos os eventos</h1>
                <form name="cadNoticia">
                    <input type="hidden" value="<?php echo $_GET['mercado']; ?>" id="mercado"/>
                    <table class="tableAll">
                        <thead>
                            <tr>
                                <td>Nome</td>
                                <td>Título</td>
                                <td>Imagem</td>
                                <td>Editar</td>
                                <td>Excluir</td>
                            </tr>
                        </thead>
                        <tbody id="listaEventos">
                            <?php
                            require_once 'listaEventosAjax.php'
                            ?>
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </body>
</html>
