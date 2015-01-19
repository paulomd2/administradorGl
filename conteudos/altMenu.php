<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$idMenu = $_GET['id'];

$objMenu->setIdMenu($idMenu);

$menu = $objMenuDao->listaMenu1($objMenu);

var_dump($menu);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
    </head>
    <body>
        <div>
            <form name="altMenu">
                <input type="hidden" name="idMenu" id="idMenu" value="<?php echo $idMenu ?>" />
                <table>
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
    </body>
</html>