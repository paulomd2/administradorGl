<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

$submenus = $objConteudoDao->listaSubmenus();
for ($i = 1; $i < count($submenus); $i++) {
    echo '
        <tr>
            <td>' . $submenus[$i]["tituloMenu"] . '</td>
            <td>' . $submenus[$i]["tituloPagina"] . '</td>
            <td>' . $submenus[$i]["link"] . '</td>
            <td>' . $submenus[$i]["target"] . '</td>
            <td>' . $submenus[$i]["status"] . '</td>
            <td>' . $submenus[$i]["texto"] . '</td>
            <td>' . $submenus[$i]["tituloMetaTag"] . '</td>
            <td>' . $submenus[$i]["keywordMetaTag"] . '</td>
            <td>' . $submenus[$i]["descricaoMetaTag"] . '</td>
            <td><a href="altSubmenu.php?id=' . $submenus[$i]['idSubmenu'] . '">Alterar</a></td>
            <td><a href="javascript:delSubmenu(' . $submenus[$i]["idSubmenu"] . ')">Excluir</a></td>
         </tr>';
}
?>