<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if(isset($_GET['count'])){
    $count = $_GET['count'];
}else{
    $count = 100;
}

$categoria = $objBannersDao->listaBanners($count);

for ($i = 0; $i < count($banners); $i++) {
    echo '<tr>
            <td>' . utf8_encode($banners[$i]["nome"]). '</td>
            <td><a href="altCategoria.php?id=' . $banners[$i]["idCategoria"] . '">Alterar</a></td>
            <td><a href="javascript:delBanner(' . $banners[$i]["idCategoria"] . ')">Excluir</a></td>
          </tr>';
}
?>