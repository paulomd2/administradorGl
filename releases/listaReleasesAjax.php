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

$quantidade = $objReleasesDao->numRelease($_SESSION['idioma']);

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

if (isset($_GET['lingua'])) {
    $lingua = $_GET['lingua'];
} else {
    $lingua = $_SESSION['idioma'];
}

$releases = $objReleasesDao->verReleases($paginacao, $lingua);

for ($i = 1; $i < count($releases); $i++) {
    if ($releases[$i]["status"] == 1) {
        $classe = 'class="habilitado"';
    } else {
        $classe = 'class="desabilitado"';
    }

    echo '<tr ' . $classe . '>
            <td>' . $releases[$i]["titulo"] . '</td>
            <td>' . $releases[$i]["mes"] . '</td>
            <td><a href="altRelease.php?id=' . $releases[$i]['idRelease'] . '">Alterar</a></td>
            <td><a href="javascript:delRelease(' . $releases[$i]["idRelease"] . ')">Excluir</a></td>
          </tr>';
}
if ($numPaginas > 1) {
    echo '<tr>
            <td colspan="4" style="text-align:center">' . $paginas . '</td>
        </tr>';
}
?>