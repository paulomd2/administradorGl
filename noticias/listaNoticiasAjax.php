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
$min = (($pagina - 1) * $count);
$paginacao = $min . ',' . $count;

$noticias = $objNoticiaDao->verNoticias($paginacao);
$quantidade = count($noticias);

if ($paginacao == 0) {
    $numPaginas = 2;
} else {
    $numPaginas = ceil($quantidade / $count);
}

$paginas = '';

for ($j = 1; $j <= $numPaginas; $j++) {
    if ($j == $pagina) {
        $classe = 'selecionado';
    } else {
        $classe = '';
    }
    $paginas .= '<span style="padding:2px;" class="' . $classe . '"><a href="javascript:paginacao(' . $j . ')">' . $j . '</a></span>';
}

for ($i = 0; $i < $quantidade; $i++) {
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
echo '<tr>
            <td colspan="3" style="text-align:center">' . $paginas . '</td>
        </tr>';
?>