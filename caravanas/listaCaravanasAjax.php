<?php

require_once '../model/banco.php';
require_once 'model/dao.php';


$count = $_GET['count'];

$caravana = $objCaravanaDao->listaCaravanas($count);

for($i = 0; $i < count($caravana); $i++){
    if($caravana[$i]["status"] == 1){
        $classe = "class='habilitado'";
    }else{
        $classe = "class='desabilitado'";
    }
    
echo '<tr '.$classe.'>
        <td>' . $caravana[$i]["nome"] . '</td>
        <td>' . $caravana[$i]["responsavel"] . '</td>
        <td>' . $caravana[$i]["cidade"] . ' - ' . $caravana[$i]["estado"] . '</td>
        <td><a href="altCaravana.php?id='.$caravana[$i]["idCaravana"].'">Alterar</a></td>
        <td><a href="javascript:delCaravana('.$caravana[$i]["idCaravana"].')">Excluir</a></td>
      </tr>';
}
?>