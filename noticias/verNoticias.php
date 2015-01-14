<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/noticias.js"></script>
    </head>
    <body>
        <div>
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

                    <tbody id="listaNoticias"
                           <?php
                           require_once 'listaNoticiasAjax.php';
                           ?>
                    </tbody>
            </table>
        </form>
    </div>
</body>
</html>