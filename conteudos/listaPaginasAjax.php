<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

$paginas = $objConteudoDao->listaPaginas();
for ($i = 0; $i < count($paginas); $i++) {
    if($paginas[$i]['status'] == 1){
                $classe = 'habilitado';
            }else{
                $classe = 'desabilitado';
            }
    echo '
        <tr class="'.$classe.'">
            <td>' . $paginas[$i]["titulo"] . '</td>
            <td><a href="altPagina.php?id=' . $paginas[$i]['idPagina'] . '">Alterar</a></td>
            <td><a href="javascript:delPagina(' . $paginas[$i]["idPagina"] . ')">Excluir</a></td>
         </tr>';
}
?>