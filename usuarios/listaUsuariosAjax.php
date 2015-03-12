<?php

session_start();

if ($_SESSION['nivel'] != 1) {
    header('Location: ../home');
}

require_once '../model/banco.php';
require_once 'model/dao.php';

$count = $_GET['count'];

$usuarios = $objUsuarioDao->verUsuarios($count);
for ($i = 0; $i < count($usuarios); $i++) {
    if ($usuarios[$i]["status"] == 1) {
        $classe = 'class="habilitado"';
//        $classe = 'class="color: red;"';
    } else {
        $classe = 'class="desabilitado"';
    }
    
    echo '<tr>
            <td '.$classe.'>' . $usuarios[$i]["nome"] . '</td>
            <td>' . $usuarios[$i]["email"] . '</td>
            <td>' . $usuarios[$i]["usuario"] . '</td>
            <td>' . $usuarios[$i]["nivel"] . '</td>
            <td><a href="altUsuario.php?id=' . $usuarios[$i]['idUsuario'] . '">Alterar</a></td>
            <td><a href="javascript:delUsuario(' . $usuarios[$i]["idUsuario"] . ')">Excluir</a></td>
          </tr>';
}
?>