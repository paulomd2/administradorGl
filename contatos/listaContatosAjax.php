<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$contatos = $objContatoDao->verContatos();

for ($i = 0; $i < count($contatos); $i++) {

//    $principal = '';
//    if($emails[$i]['indPrincipal'] == 1){
//        $principal = 'checked';
//    }
    
    
    //$explodeData = explode(' ',$contatos[$i]["dataEnvio"]);
    $dataEnvio = implode('/', array_reverse(explode('-',$contatos[$i]["dataEnvio"])));
    //$horaEnvio = $explodeData[1];
    echo '<tr>
            <td>' . $contatos[$i]["nome"] . '</td>
            <td>' . $contatos[$i]["email"] . '</td>
            <td>' . $contatos[$i]["assunto"] . '</td>
            <td>' . $dataEnvio . '</td>
            <td></td>
          </tr>';
}
?>