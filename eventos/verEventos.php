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
                <a href="#">Ver evento</a>
            </div>
            <div class="tenor">
                <h1>Ver evento</h1>
                <form name="cadNoticia">
                    <input type="hidden" value="<?php echo $_GET['mercado']; ?>" id="mercado"/>
                    <table class="tableAll">
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
                        <tbody id="listaEventos">
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
                                        <td><img src="../images/' . $eventos[$i]["imagem"] . '" width="10" /></td>
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
        </div>
    </body>
</html>
