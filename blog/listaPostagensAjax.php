<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if ($_SESSION['nivel'] == 3) {
    $idUsuario = $_SESSION['id'];
}else{
    $idUsuario = 0;
}
$usuarios = $objBlogDao->listaPostagens($idUsuario);

for ($i = 0; $i < count($usuarios); $i++) {
    if ($usuarios[$i]['status'] == 1) {
        $classe = "class='habilitado'";
    } else {
        $classe = "class='habilitado'";
    }

    echo '<tr ' . $classe . '>
            <td>' . $usuarios[$i]["titulo"] . '</td>
            <td><a href="altPostagem.php?id=' . $usuarios[$i]['idPostagem'] . '">Alterar</a></td>
            <td><a href="javascript:delPostagem(' . $usuarios[$i]["idPostagem"] . ')">Excluir</a></td>
          </tr>';
}
?>