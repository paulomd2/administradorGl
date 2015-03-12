<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$idCategoria = $_GET['id'];

$objImagem->setIdCategoria($idCategoria);

if (isset($_GET['count'])) {
    $count = $_GET['count'];
} else {
    $count = 100;
}

$imagem = $objRodapeDao->listaImagens($objImagem);

for ($i = 0; $i < count($imagem); $i++) {
    if($imagem[$i]["status"]==1){
        $classe = 'class="habilitado"';
    }else{
        $classe = 'class="desabilitado"';
    }
    
    echo '<tr>
            <td '.$classe.'>' . utf8_encode($imagem[$i]["nome"]) . '</td>
            <td><img src="../images/'.$imagem[$i]["imagem"].'" width="100merda" /></td>
            <td><a href="altImagem.php?id=' . $imagem[$i]["idImagem"] . '">Alterar</a></td>
            <td><a href="javascript:delImagem(' . $imagem[$i]["idImagem"] . ')">Excluir</a></td>
          </tr>';
}
?>