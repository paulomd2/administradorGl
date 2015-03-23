<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

$count = $_GET['count'];


if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}
$min = (($pagina - 1) * $count);
$paginacao = $min . ',' . $count;

$noticias = $objNoticiaDao->verNoticias($paginacao);
$quantidade = $objNoticiaDao->numNoticias();

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

for ($i = 0; $i < count($noticias); $i++) {
    if ($noticias[$i]['status'] == 1) {
        $classe = 'class="habilitado"';
    } else {
        $classe = 'class="desabilitado"';
    }

    echo '<tr ' . $classe . '>
            <td>' . $noticias[$i]["titulo"] . '</td>
            <td>' . $noticias[$i]["dataPublicacao"] . '</td>
            <td><a href="altNoticia.php?id=' . $noticias[$i]['idNoticia'] . '">Alterar</a></td>
            <td><a href="javascript:delNoticia(' . $noticias[$i]["idNoticia"] . ')">Excluir</a></td>
          </tr>';
}

if ($count < $quantidade) {
    echo '<tr>
            <td colspan="4" style="text-align:center">' . $paginas . '</td>
        </tr>';
}
?>