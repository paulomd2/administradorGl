<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$count = $_GET['count'];

$expositor = $objExpositorDao->listaExpositores($count);

for ($i = 0; $i < count($expositor); $i++) {
    echo '<tr>
    <td>' . $expositor[$i]["nome"] . '</td>
    <td> <img src="../images/' . $expositor[$i]["imagem"] . '" alt="' . $expositor[$i]["nome"] . '" title="' . $expositor[$i]["nome"] . '" width="100" /></td>
    <td><a href = "altExpositor.php?id=' . $expositor[$i]['idExpositor'] . '">Alterar</a></td>
    <td><a href = "javascript:delExpositor(' . $expositor[$i]["idExpositor"] . ')">Excluir</a></td>
    </tr>';
}
?>