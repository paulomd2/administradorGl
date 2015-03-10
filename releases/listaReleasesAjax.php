<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

$count = $_GET['count'];

if (isset($_GET['lingua'])) {
    $lingua = $_GET['lingua'];
} else {
    $lingua = 'pt';
}

$releases = $objReleasesDao->verReleases($count, $lingua);

for ($i = 1; $i < count($releases); $i++) {

    echo '<tr>
            <td>' . $releases[$i]["titulo"] . '</td>
            <td>' . $releases[$i]["mes"] . '</td>
            <td><a href="altRelease.php?id=' . $releases[$i]['idRelease'] . '">Alterar</a></td>
            <td><a href="javascript:delRelease(' . $releases[$i]["idRelease"] . ')">Excluir</a></td>
          </tr>';
}
?>