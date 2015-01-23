<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if(isset($_GET['count'])){
    $count = $_GET['count'];
}else{
    $count = 777;
}

$releases = $objReleasesDao->verReleases($count);

for ($i = 1; $i < count($releases); $i++) {

    echo '<tr>
            <td>' . $releases[$i]["titulo"] . '</td>
            <td>' . $releases[$i]["mes"] . '</td>
            <td><a href="altRelease.php?id=' . $releases[$i]['idRelease'] . '">Alterar</a></td>
            <td><a href="javascript:delRelease(' . $releases[$i]["idRelease"] . ')">Excluir</a></td>
          </tr>';
}
?>