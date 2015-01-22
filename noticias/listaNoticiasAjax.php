<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

if(isset($_GET['count'])){
    $count = $_GET['count'];
}else{
    $count = 100;
}

$noticias = $objNoticiasDao->verNoticias($count);

for ($i = 1; $i < count($noticias); $i++) {

    echo '<tr>
            <td>' . $noticias[$i]["titulo"] . '</td>
            <td>' . $noticias[$i]["dataPublicacao"] . '</td>
            <td><a href="altNoticia.php?id=' . $noticias[$i]['idNoticia'] . '">Alterar</a></td>
            <td><a href="javascript:delNoticia(' . $noticias[$i]["idNoticia"] . ')">Excluir</a></td>
          </tr>';
}
?>