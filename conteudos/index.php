<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/conteudo.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>        
        <script>
            $(document).ready(function () {

                $("#menusordem ul").sortable({
                    opacity: 0.6,
                    cursor: 'move',
                    update: function () {
                        var order = $(this).sortable("serialize") + '&opcao=ordenaMenu';

                        $.post("control/controleConteudo.php", order,  function (theResponse) {
                            console.log(theResponse);
                        });
                    }
                });
            });
        </script>
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
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Conteúdo</a>
                <a href="#">Gerenciar menus</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Gerenciar menus</h1><a href="cadMenu.php" class="proPage">Adicionar novo menu</a>
                Selecione o idioma:
                <select id="selLingua">
                    <option value="pt">Portugês</option>
                    <option value="en">Inglês</option>
                    <option value="es">Espanhol</option>
                </select>
                <div id="listaMenus">
                    <?php
                    require_once 'listaMenuAjax.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>