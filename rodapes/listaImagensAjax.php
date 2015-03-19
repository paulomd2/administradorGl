<div id="imagensOrdem">
    <ul>
        <?php
        require_once '../model/banco.php';
        require_once 'model/dao.php';

        $idCategoria = $_GET['id'];

        $objImagem->setIdCategoria($idCategoria);

        if (isset($_GET['count'])) {
            $count = $_GET['count'];
        } else {
            $count = 100;
        }

        $imagem = $objRodapeDao->listaImagens($objImagem);

        for ($i = 0; $i < count($imagem); $i++) {
            if ($imagem[$i]["status"] == 1) {
                $classe = 'habilitado';
            } else {
                $classe = 'desabilitado';
            }

            echo '
                <li id="recordsArray_' . $imagem[$i]['idImagem'] . '">
                    <div class="i-allRodape ' . $classe . '">
                        <img src="../images/' . $imagem[$i]["imagem"] . '" alt="' . utf8_encode($imagem[$i]["nome"]) . '" title="' . utf8_encode($imagem[$i]["nome"]) . '" />
                        <a href="altImagem.php?id=' . $imagem[$i]["idImagem"] . '" class="alterar"><i class="icon icon-pencil2"></i></a> | <a href="javascript:delImagem(' . $imagem[$i]["idImagem"] . ')" class="delete"><i class="icon icon-cross"></i></a>
                    </div>
                </li>
          ';
        }
        ?>
    </ul>
</div>