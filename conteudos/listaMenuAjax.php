<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

$menus = $objMenuDao->listaMenus();
for ($i = 1; $i < count($menus); $i++) {
    echo '<tr>
    <td>' . $menus[$i]["titulo"] . '</td>
    <td>' . $menus[$i]["link"] . '</td>
    <td><a href="altMenu.php?id=' . $menus[$i]['idMenu'] . '">Alterar</a></td>
    <td><a href="javascript:delMenu(' . $menus[$i]["idMenu"] . ')">Excluir</a></td>
</tr>';
}
?>