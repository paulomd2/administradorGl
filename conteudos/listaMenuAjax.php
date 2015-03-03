<div id="menusordem">
    <ul>
        <?php
        require_once '../model/banco.php';
        require_once 'model/dao.php';
        

        $menus = $objConteudoDao->listaMenus();
        for ($i = 1; $i < count($menus); $i++) {
            echo '<li id="recordsArray_'.$menus[$i]["idMenu"].'">
                    <div class="menu-conteudo">
                        <span class="titMenu">'.$menus[$i]["titulo"].'</span>
                        <a href="altMenu.php?id=' . $menus[$i]["idMenu"] . '">Alterar</a> | <td><a href="javascript:delMenu(' . $menus[$i]["idMenu"] . ')">Excluir</a>
                    </div>
                </li>';
        }
        ?>        
    </ul>
</div>