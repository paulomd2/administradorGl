<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$contatos = $objContatoDao->verContatos();

for ($i = 0; $i < count($contatos); $i++) {

    $explodeData = explode(' ',$contatos[$i]["dataEnvio"]);
    $dataEnvio = implode('/', array_reverse(explode('-',$explodeData[0])));
    $horaEnvio = $explodeData[1];
    echo '<tr>
            <td>
                <strong>' . $contatos[$i]["nome"] . '</strong> <br />
                '. $contatos[$i]["email"] . '
            </td>
            <td>' . $contatos[$i]["assunto"] . '</td>
            <td>' . $dataEnvio . ' '.$horaEnvio.'</td>
            <td><a href="responderContato.php?id='.$contatos[$i]["idEmail"].'">Responder</a></td>
          </tr>';
}
?>