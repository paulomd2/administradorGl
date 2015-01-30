<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$emails = $objContatoDao->verEmails();

for ($i = 0; $i < count($emails); $i++) {

    $principal = '';
    if($emails[$i]['indPrincipal'] == 1){
        $principal = 'checked';
    }
    
    echo '<tr>
            <td>' . $emails[$i]["email"] . '</td>
            <td>' . $emails[$i]["nome"] . '</td>
            <td><input type="radio" name="radio" id="radio" '.$principal.' onchange="attPrincipal('.$emails[$i]["idEmail"].');" /></td>
            <td><a href="altEmail.php?id=' . $emails[$i]['idEmail'] . '">Alterar</a></td>
            <td><a href="javascript:delEmail(' . $emails[$i]["idEmail"] . ')">Excluir</a></td>
          </tr>';
}
?>