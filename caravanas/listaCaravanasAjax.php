<?php

require_once '../model/banco.php';
require_once 'model/dao.php';


$count = $_GET['count'];

$caravana = $objCaravanaDao->listaCaravanas($count);

for($i = 0; $i < count($caravana); $i++){
echo '<tr>
        <td>' . $caravana[$i]["nome"] . '</td>
        <td>' . $caravana[$i]["responsavel"] . '</td>
        <td>' . $caravana[$i]["email"] . '</td>
        <td>' . $caravana[$i]["telefone"] . '</td>
        <td>' . $caravana[$i]["celular"] . '</td>
        <td>' . $caravana[$i]["local"] . '</td>
        <td>' . $caravana[$i]["cidade"] . '</td>
        <td>' . $caravana[$i]["estado"] . '</td>
        <td><a href="altCaravana.php?id='.$caravana[$i]["idCaravana"].'">Alterar</a></td>
        <td><a href="javascript:delCaravana('.$caravana[$i]["idCaravana"].')">Excluir</a></td>
      </tr>';
}
?>