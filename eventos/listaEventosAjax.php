<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

$count = 100;

if ($_GET['d'] == 'Proximo') {
    $eventos = $objEventoDao->verEventosProximos($count);
} else {
    $eventos = $objEventoDao->verEventosAnteriores($count);
}

for ($i = 1; $i < count($eventos); $i++) {
    echo '
            <tr>
                <td>' . $eventos[$i]["nome"] . '</td>
                <td>de ' . $eventos[$i]["dataInicio"] . ' até ' . $eventos[$i]["dataFim"] . '</td>
                <td><a href="altEvento.php?id=' . $eventos[$i]["idEvento"] . '">Alterar</a></td>
                <td><a href="javascript:delEvento(' . $eventos[$i]["idEvento"] . ')">Excluir</a></td>
            </tr>
        ';
}
?>