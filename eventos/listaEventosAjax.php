<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

if(isset($_GET['lingua'])){
    $lingua = $_GET['lingua'];
}else{
    $lingua = $_SESSION['idioma'];
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
    
    if($eventos[$i]["dataInicio"] == $eventos[$i]["dataFim"]){
        $data = $eventos[$i]["dataInicio"];
    }else{
        $data = $eventos[$i]["dataInicio"] . ' à ' . $eventos[$i]["dataFim"];
    }
    
    echo '
            <tr>
                <td '.$classe.'>' . $eventos[$i]["nome"] . '</td>
                <td>' . $data . '</td>
                <td><a href="altEvento.php?id=' . $eventos[$i]["idEvento"] . '">Alterar</a></td>
                <td><a href="javascript:delEvento(' . $eventos[$i]["idEvento"] . ')">Excluir</a></td>
            </tr>
        ';
}
?>