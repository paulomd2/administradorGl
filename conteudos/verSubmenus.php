<?php
require_once '../model/banco.php';
require_once 'model/dao.php';


$objMenu->setIdMenu($_GET['id']);
$menu1 = $objConteudoDao->listaMenu1($objMenu);
$submenus = $objConteudoDao->listaSubmenus($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
        <style>
            .menu-conteudo{
                width: 600px;
                height: auto;
                /*padding: 8px;*/
                /*background: white;*/
                background: none;
                border: 1px solid #a2a5a6;
                /*box-shadow: 3px 3px #a2a5a6;*/
                border-radius: 5px;
                margin-bottom: 10px;
                background: white;
                padding: 5px;
            }
            .menu-conteudo span.titMenu{
                font-size: 16px;
                /*font-weight: bold;*/
                color: black;
                display: block;
                /*margin-bottom: 5px;*/
                /*border-bottom: 1px solid #a2a5a6;*/
                /*padding: 5px;*/
            }
            .menu-conteudo a{
                display: inline-block;
                font-size: 14px;
                color: #3366ff;
                text-decoration: none;
                /*padding: 5px;*/
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
                <a href="./">Conteúdo</a>
                <a href="#">Ver submenu</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1><?php echo $menu1['titulo']; ?></h1>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td>Título do Menu</td>
                            <td>Título da Página</td>
                            <td>Link Externo</td>
                            <td>Target</td>
                            <td>Status</td>
                            <td>Texto</td>
                            <td>Título da Metatag</td>
                            <td>Keywords da Metatag</td>
                            <td>Descrição da Metatag</td>
                            <td>Editar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaSubmenus">
                        <?php
                        for ($i = 1; $i < count($submenus); $i++) {
                            echo '<tr>
                                <td>' . $submenus[$i]["tituloMenu"] . '</td>
                                <td>' . $submenus[$i]["tituloPagina"] . '</td>
                                <td>' . $submenus[$i]["link"] . '</td>
                                <td>' . $submenus[$i]["target"] . '</td>
                                <td>' . $submenus[$i]["status"] . '</td>
                                <td>' . $submenus[$i]["texto"] . '</td>
                                <td>' . $submenus[$i]["tituloMetaTag"] . '</td>
                                <td>' . $submenus[$i]["keywordMetaTag"] . '</td>
                                <td>' . $submenus[$i]["descricaoMetaTag"] . '</td>
                                <td><a href="altSubmenu.php?id=' . $submenus[$i]['idSubmenu'] . '">Alterar</a></td>
                                <td><a href="javascript:delSubmenu(' . $submenus[$i]["idSubmenu"] . ')">Excluir</a></td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>