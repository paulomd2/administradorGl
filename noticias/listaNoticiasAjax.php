<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$noticias = $objNoticiasDao->verNoticias();

//for ($i = 1; $i < count($noticias); $i++) {
//
//    echo '<tr>
//            <td>' . $noticias[$i]["titulo"] . '</td>
//            <td>' . $noticias[$i]["subTitulo"] . '</td>
//            <td>' . $noticias[$i]["fonte"] . '</td>
//            <td>' . $noticias[$i]["dataPublicacao"] . '</td>
//            <td>' . $noticias[$i]["texto"] . '</td>
//            <td><a href="altNoticia.php?id=' . $noticias[$i]['idNoticia'] . '">Alterar</a></td>
//            <td><a href="javascript:delNoticia(' . $noticias[$i]["idNoticia"] . ')">Excluir</a></td>
//          </tr>';
//}
for ($i = 1; $i < count($noticias); $i++) {

    echo '<tr>
            <td>' . $noticias[$i]["titulo"] . '</td>
            <td>' . $noticias[$i]["dataPublicacao"] . '</td>
            <td><a href="altNoticia.php?id=' . $noticias[$i]['idNoticia'] . '">Alterar</a></td>
            <td><a href="javascript:delNoticia(' . $noticias[$i]["idNoticia"] . ')">Excluir</a></td>
          </tr>';
}
?>