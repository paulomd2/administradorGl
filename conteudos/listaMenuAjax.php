<div id="menusordem">
    <ul>
        <?php
        require_once '../model/banco.php';
        require_once 'model/dao.php';
        
        if(isset($_GET['lingua'])){
            $lingua = $_GET['lingua'];
        }else{
            $lingua = $_SESSION['idioma'];
        }
        
        $menus = $objConteudoDao->listaMenus($lingua);
        for ($i = 1; $i < count($menus); $i++) {
            if($menus[$i]['status'] == 1){
                $classe = 'habilitado';
            }else{
                $classe = 'desabilitado';
            }
            
            
            echo '<li id="recordsArray_'.$menus[$i]["idMenu"].'">
                    <div class="menu-conteudo '.$classe.'" >
                        <span class="titMenu">'.$menus[$i]["titulo"].'</span>
                        <a href="altMenu.php?id=' . $menus[$i]["idMenu"] . '">Alterar</a> | <td><a href="javascript:delMenu(' . $menus[$i]["idMenu"] . ')">Excluir</a>
                    </div>
                </li>';
        }
        ?>        
    </ul>
</div>