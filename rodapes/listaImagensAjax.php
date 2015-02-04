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
    echo '<tr>
            <td>' . utf8_encode($imagem[$i]["nome"]) . '</td>
            <td><img src="../images/'.$imagem[$i]["imagem"].'" /></td>
            <td><a href="altImagem.php?id=' . $imagem[$i]["idImagem"] . '">Alterar</a></td>
            <td><a href="javascript:delCategoria(' . $imagem[$i]["idImagem"] . ')">Excluir</a></td>
          </tr>';
}
?>