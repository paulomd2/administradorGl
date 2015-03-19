<?php
require_once '../model/banco.php';
require_once 'model/dao.php';


$objMenu->setIdMenu($_GET['id']);
$menu1 = $objConteudoDao->listaMenu1($objMenu);
$submenus = $objConteudoDao->listaSubmenus($_GET['id']);
?>
<div id="submenusordem">
    <ul>
        <?php
        for ($i = 1; $i < count($submenus); $i++) {
            $classe = 'habilitado';
            if ($submenus[$i]['status'] == 2) {
                $classe = 'desabilitado';
            }
            echo '
                <li id="recordsArray_'.$submenus[$i]['idSubmenu'].'">
                    <div class="menu-conteudo '.$classe.'">
                        <span class="titMenu">'.$submenus[$i]['tituloSubmenu'].'</span>
                        <a href="altSubmenu.php?id='.$submenus[$i]['idSubmenu'].'">Alterar</a> | <a href="javascript:delSubmenu('.$submenus[$i]['idSubmenu'].')">Excluir</a>
                    </div>
                </li>
            ';
        }
        ?>
    </ul>
</div>