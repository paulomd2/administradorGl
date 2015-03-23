<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if (isset($_GET['lingua'])) {
    $lingua = $_GET['lingua'];
} else {
    $lingua = $_SESSION['idioma'];
}

$categorias = $objRodapeDao->listaCategoria(10, $lingua);

for ($i = 0; $i < count($categorias); $i++) {
    if ($categorias[$i]["status"] == 1) {
        $classe = 'class="habilitado"';
    } else {
        $classe = 'class="desabilitado"';
    }

    echo '<tr ' . $classe . '>
            <td>' . utf8_encode($categorias[$i]["nome"]) . '</td>
            <td><a href="altCategoria.php?id=' . $categorias[$i]["idCategoria"] . '">Alterar</a></td>
            <td><a href="javascript:delCategoria(' . $categorias[$i]["idCategoria"] . ')">Excluir</a></td>
            <td><a href="verImagens.php?id=' . $categorias[$i]["idCategoria"] . '">Ver imagens</a></td>
          </tr>';
}
?>