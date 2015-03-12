<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if(isset($_GET['lingua'])){
    $lingua = $_GET['lingua'];
}else{
    $lingua = 'pt';
}

if ($_GET['d'] == 'Proximo') {
    $eventos = $objEventoDao->verEventosProximos($lingua);
} else {
    $eventos = $objEventoDao->verEventosAnteriores($lingua);
}

for ($i = 1; $i < count($eventos); $i++) {
    if($eventos[$i]['status'] == 1){
        $classe = 'class="habilitado"';
    }else{
        $classe = 'class="desabilitado"';
    }
    
    echo '
            <tr>
                <td '.$classe.'>' . $eventos[$i]["nome"] . '</td>
                <td>' . $eventos[$i]["dataInicio"] . ' à ' . $eventos[$i]["dataFim"] . '</td>
                <td><a href="altEvento.php?id=' . $eventos[$i]["idEvento"] . '">Alterar</a></td>
                <td><a href="javascript:delEvento(' . $eventos[$i]["idEvento"] . ')">Excluir</a></td>
            </tr>
        ';
}
?>