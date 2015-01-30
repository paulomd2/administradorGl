<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$emails = $objContatoDao->verEmails();

for ($i = 0; $i < count($emails); $i++) {

    if($emails[$i]['indPrincipal'] == 1){
        $principal = 'Sim';
    }else{
        $principal = 'Não';
    }
    
    echo '<tr>
            <td>' . $emails[$i]["email"] . '</td>
            <td>' . $emails[$i]["nome"] . '</td>
            <td>' . $principal . '</td>
            <td><a href="altEmail.php?id=' . $emails[$i]['idEmail'] . '">Alterar</a></td>
            <td><a href="javascript:delNoticia(' . $emails[$i]["idEmail"] . ')">Excluir</a></td>
          </tr>';
}
?>