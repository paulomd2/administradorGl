<div id="menusordem">
    <ul>
        <?php
        require_once '../model/banco.php';
        require_once 'model/dao.php';
        
        if(isset($_GET['lingua'])){
            $lingua = $_GET['lingua'];
        }else{
            $lingua = 'pt';
        }
        
        $menus = $objConteudoDao->listaMenus($lingua);
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