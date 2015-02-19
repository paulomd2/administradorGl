<?php
session_start();
setcookie("ck_authorized", "true", 0, "/");
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/destaque.js"></script>
        <script>

            $(document).ready(function () {

                $(" #destaquesordem ul").sortable({
                    opacity: 0.6,
                    cursor: 'move',
                    update: function () {
                        var order = $(this).sortable("serialize") + '&opcao=ordena';
                        $.post("control/controleDestaque.php", order, function (theResponse) {
                            console.log(theResponse);
                        });
                    }
                });

            });
        </script>
        <style>
            .lista_destaque{
                width: 600px;
                height: auto;
                background: none;
                border: 1px solid #a2a5a6;
                border-radius: 5px;
                margin-bottom: 10px;
                background: white;
                padding: 5px;
                overflow: hidden;
            }
            .menu-conteudo span.titMenu{
                font-size: 16px;
                color: black;
                display: block;
            }
            .menu-conteudo a{
                display: inline-block;
                font-size: 14px;
                color: #3366ff;
                text-decoration: none;
            }
            .menu-conteudo a:hover{
                text-decoration: underline;
            }
            a.linkIcon{
                color: #333;
                text-decoration: none;
            }
            ul{
                list-style: none;
            }
        </style>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="index.php">Destaques</a>
                <a href="#">Todos os destaques</a>
            </div>
            <div class="tenor">
                <h1>Todos os destaques</h1>
                <a href="cadDestaque.php" class="proPage">Cadastrar destaque</a>
                <div id="listaDestaques">
                    <div id="destaquesordem">
                        <ul>
                            <?php
                            require_once '../model/banco.php';
                            require_once 'model/dao.php';

                            $destaques = $objDestaqueDao->verDestaques(100);

                            for ($i = 1; $i < count($destaques); $i++) {

                                echo '
                                    <li id="recordsArray_' . $destaques[$i]["idDestaque"] . '">
                                        <div class = "lista_destaque">
                                            <img src = "../images/' . $destaques[$i]["imagem"] . '" alt = "' . $destaques[$i]["titulo"] . '" title = "' . $destaques[$i]["titulo"] . '" width = "300" style = "float: left; margin-right: 10px;"/>
                                            <span>' . $destaques[$i]["titulo"] . '</span><br/>
                                            <a href="altBanner.php?id=' . $destaques[$i]['idDestaque'] . '">Alterar</a> | <a href="javascript:delBanner(' . $destaques[$i]["idDestaque"] . ')">Excluir</a>
                                            </a>
                                        </div>
                                    </li>
                                ';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>