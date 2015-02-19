<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/banners.js"></script>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <script>

            $(document).ready(function() {

                $("#contentLeft ul").sortable({
                    opacity: 0.6,
                    cursor: 'move',
                    update: function() {
                        var order = $(this).sortable("serialize") + '&opcao=ordena';
                        $.post("control/controleBanners.php", order, function(theResponse) {
                            console.log(theResponse);
                        });
                    }
                });

            });
        </script>
        <style>
            .lista_banner{
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
                <a href="index.php">Banners</a>
                <a href="#">Todos os banners</a>
            </div>
            <div class="tenor">
                <h1>Todos os banners</h1>
                <a href="cadBanner.php" class="proPage">Cadastrar banner</a>
<!--                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 50%;">Nome</td>
                            <td style="width: 30%;">Banner</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>

                    <tbody id="listaReleases">
                <?php
                require_once 'listaBannersAjax.php';
                ?>
                    </tbody>
                </table>-->
                <div id="submenusordem">
                    <ul>
                        <li id="recordsArray_A">
                            <div class="lista_banner">
                                <img src="" alt="NOME DO BANNER" title="NOME DO BANNER" width="300" style="float: left; margin-right: 10px;"/>
                                <span>NOME DO BANNER</span><br/>
                                <a href="altSubmenu.php?id=<?php echo $submenus[$i]['idSubmenu']; ?>">Alterar</a> | <a href="javascript:delSubmenu('<?php echo $submenus[$i]['idSubmenu']; ?>')">Excluir</a>
                            </div>
                        </li>   
                        <li id="recordsArray_A">
                            <div class="lista_banner">
                                <img src="" alt="NOME DO BANNER" title="NOME DO BANNER" width="300" style="float: left; margin-right: 10px;"/>
                                <span>NOME DO BANNER</span><br/>
                                <a href="altSubmenu.php?id=<?php echo $submenus[$i]['idSubmenu']; ?>">Alterar</a> | <a href="javascript:delSubmenu('<?php echo $submenus[$i]['idSubmenu']; ?>')">Excluir</a>
                            </div>
                        </li>   
                    </ul>
                </div>

            </div>
        </div>
    </body>
</html>
