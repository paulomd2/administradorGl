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

$quantidade = $objNewsDao->numNews();

$news = $objNewsDao->listaEmail($paginacao);
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

//$news = $objNewsDao->listaEmail();

for ($i = 0; $i < count($news); $i++) {
    echo '
            <tr>
                <td>'. $news[$i]["nome"] . '</td>
                <td>' . $news[$i]["email"] . '</td>
                <td>' . $news[$i]["dataCadastro"] . '</td>
            </tr>
        ';
}
echo '<tr>
            <td colspan="3" style="text-align:center">' . $paginas . '</td>
        </tr>';
?>