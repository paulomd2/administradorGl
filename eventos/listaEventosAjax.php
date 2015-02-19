<?php
if( !isset($busca) && $_GET['d'] == 'proximo' ){
    $busca = 'Proximo';
}  elseif (!isset($busca) && $_GET['d'] == 'anterior') {
    $busca = 'Anterior';
}
?>
<div id="listaEventos<?php echo $busca; ?>">
    <div id="eventosordem">
        <ul>
            <?php
            require_once '../model/banco.php';
            require_once 'model/dao.php';

            $count = 100;

            if ($busca == 'Proximo') {
                $eventos = $objEventoDao->verEventosProximos($count);
            } else {
                $eventos = $objEventoDao->verEventosAnteriores($count);
            }
            for ($i = 1; $i < count($eventos); $i++) {
                echo '
                        <li id="recordsArray_' . $eventos[$i]["idEvento"] . '">
                            <div class = "lista_evento">
                                <span>' . $eventos[$i]["nome"] . '</span><br/>
                                <a href = "altEvento.php?id=' . $eventos[$i]['idEvento'] . '">Alterar</a> | <a href = "javascript:delEvento(' . $eventos[$i]["idEvento"] . ')">Excluir</a>
                                </a>
                            </div>
                        </li>
                    ';
            }
            ?>
        </ul>
    </div>
</div>