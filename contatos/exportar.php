<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

$dados = '';
$filtro = $_GET['f'];

if ($filtro == 'mes') {
    $file_path = 'contatoMes.xls';
    $filtro = 'mes';
} else {
    $file_path = 'contatoAno.xls';
    $filtro = 'ano';
}

$contatos = $objContatoDao->verContatos($filtro);
$html = '<table border="1">';
$html .= '<tr>';
$html .= '<td>Nome</td>';
$html .= '<td>Empresa</td>';
$html .= '<td>Email</td>';
$html .= '<td>cidade</td>';
$html .= '<td>estado</td>';
$html .= '<td>Telefone</td>';
$html .= '<td>Celular</td>';
$html .= '<td>Interesses</td>';
$html .= '</tr>';

for ($i = 0; $i < count($contatos); $i++) {
    $html .= '
        <tr>
            <td>'.$contatos[$i]['nome'].'</td>
            <td>'.$contatos[$i]['empresa'].'</td>
            <td>'.$contatos[$i]['email'].'</td>
            <td>'.$contatos[$i]['cidade'].'</td>
            <td>'.$contatos[$i]['estado'].'</td>
            <td>'.$contatos[$i]['telefone'].'</td>
            <td>'.$contatos[$i]['celular'].'</td>
            <td>'.$contatos[$i]['interesses'].'</td>
        </tr>
         ';
}
$html .= '</table>';

// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$file_path}\"" );
header ("Content-Description: PHP Generated Data" );

echo $html;
exit;
?>