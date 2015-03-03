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
            ?>
            <li id="recordsArray_<?php echo $submenus[$i]['idSubmenu']; ?>">
                <div class="menu-conteudo">
                    <span class="titMenu"><?php echo $submenus[$i]['tituloSubmenu']; ?></span>
                    <a href="altSubmenu.php?id=<?php echo $submenus[$i]['idSubmenu']; ?>">Alterar</a> | <a href="javascript:delSubmenu(<?php echo $submenus[$i]['idSubmenu']; ?>)">Excluir</a>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>