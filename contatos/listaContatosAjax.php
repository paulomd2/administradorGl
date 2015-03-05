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
$paginacao = $min.','.$count;
        
$quantidade = $objContatoDao->numContatos();
$contatos = $objContatoDao->verContatos('', $paginacao);
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

for ($i = 0; $i < count($contatos) - 1; $i++) {

    $explodeData = explode(' ', $contatos[$i]["dataEnvio"]);
    $dataEnvio = implode('/', array_reverse(explode('-', $explodeData[0])));
    $horaEnvio = $explodeData[1];
    echo '<tr>
            <td>
                <strong>'.$contatos[$i]["idEmail"].' '. $contatos[$i]["nome"] . '</strong> <br />
                ' . $contatos[$i]["email"] . '
            </td>
            <td>' . $contatos[$i]["assunto"] . '</td>
            <td>' . $dataEnvio . ' ' . $horaEnvio . '</td>
            <td><a href="responderContato.php?id=' . $contatos[$i]["idEmail"] . '">Responder</a></td>
          </tr>
          
        ';
}
echo '<tr>
            <td colspan="4" style="text-align:center">' . $paginas . '</td>
        </tr>';
?>