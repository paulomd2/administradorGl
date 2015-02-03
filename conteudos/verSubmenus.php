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
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>        
        <script>
            $(document).ready(function() {

                $("#submenusordem ul").sortable({
                    opacity: 0.6,
                    cursor: 'move',
                    update: function() {
                        var order = $(this).sortable("serialize") + '&opcao=ordenaSubmenu';
                        
                        $.post("control/controleConteudo.php", order, function(theResponse) {
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
                <a href="#"><?php echo $menu1['titulo']; ?></a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1><?php echo $menu1['titulo']; ?></h1> <a href="cadSubmenu.php?id=<?php echo $_GET['id']; ?>" class="proPage">Adicionar nova página</a>
                <div id="submenusordem">
                    <ul>
                        <?php
                        for ($i = 1; $i < count($submenus); $i++) {
                            ?>
                            <li id="recordsArray_<?php echo $submenus[$i]['idSubmenu']; ?>">
                                <div class="menu-conteudo">
                                    <span class="titMenu"><?php echo $submenus[$i]['tituloSubmenu']; ?></span>
                                    <a href="altSubmenu.php?id=<?php echo $submenus[$i]['idSubmenu']; ?>">Alterar</a> | <a href="javascript:delSubmenu('<?php echo $submenus[$i]['idSubmenu']; ?>')">Excluir</a>
                                </div>
                            </li>   
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>