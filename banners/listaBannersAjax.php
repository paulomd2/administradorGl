<div id="bannersordem">
    <ul>
        <?php
        require_once '../model/banco.php';
        require_once 'model/dao.php';
        
        if (isset($_GET['lingua'])) {
            $lingua = $_GET['lingua'];
        } else {
            $lingua = $_SESSION['idioma'];
        }

        $banners = $objBannersDao->listaBanners($lingua);

        for ($i = 0; $i < count($banners); $i++) {
            if($banners[$i]['status'] == 1){
                $classe = 'class="habilitado"';
            }else{
                $classe = 'class="desabilitado"';
            }
            
            echo '
                    <li id="recordsArray_' . $banners[$i]["idBanner"] . '">
                        <div class = "lista_banner">
                            <img src = "../images/' . $banners[$i]["imagem"] . '" alt = "' . $banners[$i]["nome"] . '" title = "' . $banners[$i]["nome"] . '" width = "300" style = "float: left; margin-right: 10px;"/>
                            <span '.$classe.'>' . $banners[$i]["nome"] . '</span><br/>
                            <a href="altBanner.php?id=' . $banners[$i]['idBanner'] . '">Alterar</a> | <a href="javascript:delBanner(' . $banners[$i]["idBanner"] . ')">Excluir</a>
                            </a>
                        </div>
                    </li>';
        }
        ?>
    </ul>
</div>