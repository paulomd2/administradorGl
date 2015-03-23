<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if(isset($_GET['lingua'])){
    $lingua = $_GET['lingua'];
}else{
    $lingua = $_SESSION['idioma'];
}

if(isset($_GET['count'])){
    $count = $_GET['count'];
}else{
    $count = 10;
}


if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

$min = (($pagina - 1) * $count);
$paginacao = $min . ',' . $count;

if ($_GET['d'] == 'Proximo') {
    $eventos = $objEventoDao->verEventosProximos($lingua, $paginacao);
    $quantidade = $objEventoDao->numEventosProximo($_SESSION['idioma']);
} else {
    $eventos = $objEventoDao->verEventosAnteriores($lingua, $paginacao);
    $quantidade = $objEventoDao->numEventosAnterior($_SESSION['idioma']);
}

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

for ($i = 1; $i < count($eventos); $i++) {
    if($eventos[$i]['status'] == 1){
        $classe = 'class="habilitado"';
    }else{
        $classe = 'class="desabilitado"';
    }
    
    if($eventos[$i]["dataInicio"] == $eventos[$i]["dataFim"]){
        $data = $eventos[$i]["dataInicio"];
    }else{
        $data = $eventos[$i]["dataInicio"] . ' a ' . $eventos[$i]["dataFim"];
    }
    
    echo '
            <tr '.$classe.'>
                <td>' . $eventos[$i]["nome"] . '</td>
                <td>' . $data . '</td>
                <td><a href="altEvento.php?id=' . $eventos[$i]["idEvento"] . '">Alterar</a></td>
                <td><a href="javascript:delEvento(' . $eventos[$i]["idEvento"] . ')">Excluir</a></td>
            </tr>
        ';
}
if ($numPaginas > 1) {
    echo '<tr>
            <td colspan="4" style="text-align:center">' . $paginas . '</td>
        </tr>';
}
?>