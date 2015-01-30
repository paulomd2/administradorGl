<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if (isset($_GET['count'])) {
    $count = $_GET['count'];
} else {
    $count = 100;
}

$eventos = $objEventoDao->verEventos($count);



for ($i = 1; $i < count($eventos); $i++) {
    //echo $eventos[$i]["imagem"] ."<br>" ;
    echo '<tr>
    <td>' . $eventos[$i]["nome"] . '</td>
    <!--<td>' . $eventos[$i]["imagem"] . '</td>-->
    <td><img src="../images/d991c0f3c7dfb0021404cbe817912500.jpg"/></td>
    <!--<td> <img src="../imagaes/' . $eventos[$i]["imagem"] . '" alt="' . $eventos[$i]["nome"] . '" title="' . $eventos[$i]["nome"] . '" width="120" /></td>-->
    <td><a href = "altEvento.php?id=' . $eventos[$i]['idEvento'] . '">Alterar</a></td>
    <td><a href = "javascript:delEvento(' . $eventos[$i]["idEvento"] . ')">Excluir</a></td>
    </tr>';
}
?>