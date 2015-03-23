<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if (isset($_GET['lingua'])) {
    $lingua = $_GET['lingua'];
} else {
    $lingua = $_SESSION['idioma'];
}

$releases = $objReleasesDao->verReleases(5, $lingua);

for ($i = 1; $i < count($releases); $i++) {
    if ($releases[$i]["status"] == 1) {
        $classe = 'class="habilitado"';
    } else {
        $classe = 'class="desabilitado"';
    }

    echo '<tr ' . $classe . '>
            <td>' . $releases[$i]["titulo"] . '</td>
            <td>' . $releases[$i]["mes"] . '</td>
            <td><a href="altRelease.php?id=' . $releases[$i]['idRelease'] . '">Alterar</a></td>
            <td><a href="javascript:delRelease(' . $releases[$i]["idRelease"] . ')">Excluir</a></td>
          </tr>';
}
?>