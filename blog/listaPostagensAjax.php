<?php
@session_start();
//$idUsuario = $_SESSION['id'];
$idUsuario = 1;

require_once '../model/banco.php';
require_once 'model/dao.php';

$usuarios = $objBlogDao->listaPostagens($idUsuario);

for ($i = 0; $i < count($usuarios); $i++) {

    echo '<tr>
            <td>' . $usuarios[$i]["titulo"] . '</td>
            <td><a href="altPostagem.php?id=' . $usuarios[$i]['idPostagem'] . '">Alterar</a></td>
            <td><a href="javascript:delPostagem(' . $usuarios[$i]["idPostagem"] . ')">Excluir</a></td>
          </tr>';
}
?>