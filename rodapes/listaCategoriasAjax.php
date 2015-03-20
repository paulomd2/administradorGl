<div id="ordemCategoria">
    <ul>

        <?php
        require_once '../model/banco.php';
        require_once 'model/dao.php';

        if (isset($_GET['count'])) {
            $count = $_GET['count'];
        } else {
            $count = 100;
        }

        if (isset($_GET['lingua'])) {
            $lingua = $_GET['lingua'];
        } else {
            $lingua = $_SESSION['idioma'];
        }

        $categorias = $objRodapeDao->listaCategoria($count, $lingua);

        for ($i = 0; $i < count($categorias); $i++) {
            if ($categorias[$i]["status"] == 1) {
                $classe = 'habilitado';
            } else {
                $classe = 'desabilitado';
            }

//    echo '<tr>
//            <td '.$classe.'>' . utf8_encode($categorias[$i]["nome"]). '</td>
//            <td><a href="altCategoria.php?id=' . $categorias[$i]["idCategoria"] . '">Alterar</a></td>
//            <td><a href="javascript:delCategoria(' . $categorias[$i]["idCategoria"] . ')">Excluir</a></td>
//            <td><a href="verImagens.php?id=' . $categorias[$i]["idCategoria"] . '">Ver imagens</a></td>
//          </tr>';

            echo '<li id="recordsArray_' . $categorias[$i]["idCategoria"] . '">
                    <div class="lista_rodape ' . $classe . '" >
                        <span class="titMenu">' . utf8_encode($categorias[$i]["nome"]) . '</span>
                        <a href="altCategoria.php?id=' . $categorias[$i]["idCategoria"] . '">Alterar</a> |
                        <a href="javascript:delCategoria(' . $categorias[$i]["idCategoria"] . ')">Excluir</a> |
                        <a href="verImagens.php?id=' . $categorias[$i]["idCategoria"] . '">Ver imagens</a>
                    </div>
                </li>';
        }
        ?>


    </ul>
</div>