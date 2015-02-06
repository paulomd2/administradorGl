<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

$texto = $objCaravanaDao->listaTexto();

echo '<tr>
        <td>' . $texto["texto"] . '</td>
      </tr>';
?>