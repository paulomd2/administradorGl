<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$idMenu = $_GET['id'];

$objMenu->setIdMenu($idMenu);

$menu = $objMenuDao->listaMenu1($objMenu);

var_dump($menu);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Notícias</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Alterar menu</h1>
                <form name="altMenu">
                    <input type="hidden" name="idMenu" id="idMenu" value="<?php echo $idMenu ?>" />
                    <table class="tableform">
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" name="titulo" id="titulo" value="<?php echo $menu['titulo']; ?>" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Link:</td>
                            <td>
                                <input type="text" name="link" id="link" value="<?php echo $menu['link']; ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnAlterarMenu" value="Enviar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>