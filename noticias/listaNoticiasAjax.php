<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$count = $_GET['count'];

$noticias = $objNoticiaDao->verNoticias($count);

for ($i = 0; $i < count($noticias); $i++) {
    if($noticias[$i]['status'] == 1){
        $classe = 'class="habilitado"';
    }else{
        $classe = 'class="desabilitado"';
    }

    echo '<tr>
            <td '.$classe.'>' . $noticias[$i]["titulo"] . '</td>
            <td>' . $noticias[$i]["dataPublicacao"] . '</td>
            <td><a href="altNoticia.php?id=' . $noticias[$i]['idNoticia'] . '">Alterar</a></td>
            <td><a href="javascript:delNoticia(' . $noticias[$i]["idNoticia"] . ')">Excluir</a></td>
          </tr>';
}
?>