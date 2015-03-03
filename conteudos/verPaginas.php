<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$paginas = $objConteudoDao->listaPaginas();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/conteudo.js"></script>
        <style>
            .menu-conteudo{
                width: 600px;
                height: auto;
                background: none;
                border: 1px solid #a2a5a6;
                border-radius: 5px;
                margin-bottom: 10px;
                background: white;
                padding: 5px;
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
        <?php
        include_once '../include/header.php'; 
        include_once '../include/lateral.php';
        ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Conteúdo</a>
                <a href="#"> Páginas </a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Gerenciar páginas</h1> <a href="cadPagina.php" class="proPage">Adicionar nova página</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 80%;">Título</td>
                            <!--<td>Link</td>-->
                            <td style="width: 10%;">Editar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaPaginas">
                        <?php
                        require_once './listaPaginasAjax.php';
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>