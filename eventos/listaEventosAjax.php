<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

$count = $_GET['count'];
$d = $_GET['d'];

if($d == 'proximo'){
    $eventos = $objEventoDao->verEventosProximos($count);
}else{
    $eventos = $objEventoDao->verEventosAnteriores($count);
}

for ($i = 1; $i < count($eventos); $i++) {
    //echo $eventos[$i]["imagem"] ."<br>" ;
    echo '<tr>
    <td>' . $eventos[$i]["nome"] . '</td>
    <td> <img src="../images/' . $eventos[$i]["imagem"] . '" alt="' . $eventos[$i]["nome"] . '" title="' . $eventos[$i]["nome"] . '" width="120" /></td>
    <td><a href = "altEvento.php?id=' . $eventos[$i]['idEvento'] . '">Alterar</a></td>
    <td><a href = "javascript:delEvento(' . $eventos[$i]["idEvento"] . ')">Excluir</a></td>
    </tr>';
}
?>