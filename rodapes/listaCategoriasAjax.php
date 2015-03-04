<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if(isset($_GET['count'])){
    $count = $_GET['count'];
}else{
    $count = 100;
}

$categorias = $objRodapeDao->listaCategoria($count);

for ($i = 0; $i < count($categorias); $i++) {
    if($categorias[$i]["identificador"] == 0){
        $identificador = 'Sem identificador';
    }elseif ($categorias[$i]["identificador"] == 1) {
        $identificador = 'Patrocinador';
    }else{
        $identificador = 'Apoio';
    }
    
    echo '<tr>
            <td>' . utf8_encode($categorias[$i]["nome"]). '</td>
            <!--td>' . $identificador. '</td-->
            <td><a href="altCategoria.php?id=' . $categorias[$i]["idCategoria"] . '">Alterar</a></td>
            <td><a href="javascript:delCategoria(' . $categorias[$i]["idCategoria"] . ')">Excluir</a></td>
            <td><a href="verImagens.php?id=' . $categorias[$i]["idCategoria"] . '">Ver imagens</a></td>
          </tr>';
}
?>