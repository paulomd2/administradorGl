<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if(isset($_GET['count'])){
    $count = $_GET['count'];
}else{
    $count = 100;
}

$eventos = $objEventoDao->verEventos($count);

for ($i = 1; $i < count($eventos); $i++) {
    echo '<tr>
    <td>' . $eventos[$i]["nome"] . '</td>
    <td>' . $eventos[$i]["titulo"] . '</td>
    <td>' . $eventos[$i]["dataInicio"] . '</td>
    <td>' . $eventos[$i]["dataFim"] . '</td>
    <td><img src="../images/' . $eventos[$i]["imagem"] . '"</td>
    <td>' . $eventos[$i]["texto"] . '</td>
    <td>' . $eventos[$i]["tituloMetaTag"] . '</td>
    <td>' . $eventos[$i]["keywordsMetaTag"] . '</td>
    <td>' . $eventos[$i]["descricaoMetaTag"] . '</td>
    <td>' . $eventos[$i]["dataCadastro"] . '</td>
    <td><a href = "altEvento.php?id=' . $eventos[$i]['idEvento'] . '">Alterar</a></td>
    <td><a href = "javascript:delEvento(' . $eventos[$i]["idEvento"] . ')">Excluir</a></td>
    </tr>';
}
?>