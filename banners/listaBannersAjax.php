<div id="bannersordem">
    <ul>
        <?php
        require_once '../model/banco.php';
        require_once 'model/dao.php';

        if (isset($_GET['count'])) {
            $count = $_GET['count'];
        } else {
            $count = 10;
        }

        if (isset($_GET['pagina'])) {
            $pagina = $_GET['pagina'];
        } else {
            $pagina = 1;
        }

        if (isset($_GET['lingua'])) {
            $lingua = $_GET['lingua'];
        } else {
            $lingua = $_SESSION['idioma'];
        }


        $min = (($pagina - 1) * $count);
        $paginacao = $min . ',' . $count;

        $quantidade = $objBannersDao->numBanners($lingua);

        $banners = $objBannersDao->listaBanners($lingua, $paginacao);

        $numPaginas = ceil($quantidade / $count);
        $paginas = '';

        for ($j = 1; $j <= $numPaginas; $j++) {
            if ($j == $pagina) {
                $classe = 'selecionado';
            } else {
                $classe = '';
            }
            $paginas .= '<span style="padding:2px;" class="' . $classe . '"><a href="javascript:paginacao(' . $j . ')">' . $j . '</a></span>';
        }

        for ($i = 0; $i < count($banners); $i++) {
            if ($banners[$i]['status'] == 1) {
                $classe = 'habilitado';
            } else {
                $classe = 'desabilitado';
            }

            echo '
                    <li id="recordsArray_' . $banners[$i]["idBanner"] . '">
                        <div class = "lista_banner ' . $classe . '">
                            <img src = "../images/' . $banners[$i]["imagem"] . '" alt = "' . $banners[$i]["nome"] . '" title = "' . $banners[$i]["nome"] . '" width = "300" style = "float: left; margin-right: 10px;"/>
                            <span>' . $banners[$i]["nome"] . '</span><br/>
                            <a href="altBanner.php?id=' . $banners[$i]['idBanner'] . '">Alterar</a> | <a href="javascript:delBanner(' . $banners[$i]["idBanner"] . ')">Excluir</a>
                            </a>
                        </div>
                    </li>';
        }

        if ($count < $quantidade) {
            echo '<tr>
                <td colspan="4" style="text-align:center">' . $paginas . '</td>
            </tr>';
        }
        ?>
    </ul>
</div>