<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/eventos.js"></script>
    </head>
    <body>
        <div>
            <form name="cadNoticia">
                <input type="hidden" value="<?php echo $_GET['mercado']; ?>" id="mercado"/>
                <table>
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Título</td>
                            <td>Data de Início</td>
                            <td>Data de Fim</td>
                            <td>Imagem</td>
                            <td>Texto</td>
                            <td>Metatag título</td>
                            <td>Keywords título</td>
                            <td>Descricao título</td>
                            <td>Data de Cadastro</td>
                            <td>Eduitar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaEventos"
                           <?php
                           require_once 'listaEventosAjax.php';
                           ?>
                    </tbody>
            </table>
        </form>
    </div>
</body>
</html>