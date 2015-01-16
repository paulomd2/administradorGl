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
                           require_once '../model/banco.php';
                           require_once 'model/dao.php';

                           $eventos = $objEventoDao->verEventos();

                           for ($i = 1; $i < count($eventos); $i++) {
                               echo '<tr>
                                        <td>' . $eventos[$i]["nome"] . '</td>
                                        <td>' . $eventos[$i]["titulo"] . '</td>
                                        <td>' . $eventos[$i]["dataInicio"] . '</td>
                                        <td>' . $eventos[$i]["dataFim"] . '</td>
                                        <td><img src="../images/' . $eventos[$i]["imagem"] . '"</td>
                                        <td>' . $eventos[$i]["texto"] . '</td>
                                        <td>' . $eventos[$i]["tituloMetaTag"] . '</td>
                                        <td>' . $eventos[$i]["keywordsMetaTag"] . '</td>
                                        <td>' . $eventos[$i]["descricaoMetaTag"] . '</td>
                                        <td>' . $eventos[$i]["dataCadastro"] . '</td>
                                        <td><a href = "altEvento.php?id=' . $eventos[$i]['idEvento'] . '">Alterar</a></td>
                                        <td><a href = "javascript:delEvento(' . $eventos[$i]["idEvento"] . ')">Excluir</a></td>
                                    </tr>';
                           }
                           ?>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>