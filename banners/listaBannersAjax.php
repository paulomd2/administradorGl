<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if(isset($_GET['count'])){
    $count = $_GET['count'];
}else{
    $count = 100;
}

$banners = $objBannersDao->listaBanners($count);

for ($i = 0; $i < count($banners); $i++) {
    echo '<tr>
            <td>' . utf8_encode($banners[$i]["nome"]). '</td>
            <td><img src="../images/' . $banners[$i]["imagem"] . '" alt="' . utf8_encode($banners[$i]["nome"]). '" title="' . utf8_encode($banners[$i]["nome"]). '" width="130" /></td>
            <td><a href="altBanner.php?id=' . $banners[$i]['idBanner'] . '">Alterar</a></td>
            <td><a href="javascript:delBanner(' . $banners[$i]["idBanner"] . ')">Excluir</a></td>
          </tr>';
}
?>