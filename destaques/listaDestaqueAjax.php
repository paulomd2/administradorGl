<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$count = $_GET['count'];

$count = 5;

$destaques = $objDestaqueDao->verDestaques($count);

for ($i = 1; $i < count($destaques); $i++) {

    echo '<tr>
            <td>' . $destaques[$i]["titulo"] . '</td>
            <td>' . $destaques[$i]["dataPublicacao"] . '</td>
            <td><a href="altDestaque.php?id=' . $destaques[$i]['idDestaque'] . '">Alterar</a></td>
            <td><a href="javascript:delDestaque(' . $destaques[$i]["idDestaque"] . ')">Excluir</a></td>
          </tr>';
}
?>