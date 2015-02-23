<table class="tableAll">
    <thead>
        <tr>
            <td style="width: 60%;">Título</td>
            <td style="width: 20%;">Data de Publicação</td>
            <td style="width: 10%;">Alterar</td>
            <td style="width: 10%;">Excluir</td>
        </tr>
    </thead>
    <?php
    require_once '../model/banco.php';

    $modulo = $_GET['modulo'];
    $busca = $_GET['busca'];

    switch ($modulo) {
        case 'noticias':
            require_once '../noticias/model/dao.php';
            echo '<script src="../noticias/js/noticias.js"></script>';

            $objNoticia->setTitulo($busca);

            $conteudo = $objNoticiaDao->busca($objNoticia);

            for ($i = 0; $i < count($conteudo); $i++) {
                echo '
                    <tbody id="listaNoticiasBusca">
                        <tr>
                            <td>' . $conteudo[$i]["titulo"] . '</td>
                            <td>' . $conteudo[$i]["dataPublicacao"] . '</td>
                            <td><a href="../noticias/altNoticia.php?id=' . $conteudo[$i]["idNoticia"] . '">Alterar</a></td>
                            <td><a href="javascript:delNoticiaBusca(' . $conteudo[$i]["idNoticia"] . ',\''.$busca.'\')">Excluir</a></td>
                        </tr>';
            }
            break;
        case 'releases':
            require_once '../releases/model/dao.php';

            $objRelease->setTitulo($busca);

            $conteudo = $objReleasesDao->busca($objRelease);
            break;
        case 'eventos':
            require_once '../eventos/model/dao.php';

            $objEvento->setTitulo($busca);

            $conteudo = $objEventoDao->busca($objEvento);
            break;
    }
    ?>
</tbody>
</table>