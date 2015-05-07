<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$count = $_GET['count'];

$palestrante = $objPalestranteDao->listaPalestrantes($count);

for ($i = 0; $i < count($palestrante); $i++) {
    if($palestrante[$i]['status'] == 1){
        $classe = 'class="habilitado"';
    }else{
        $classe = 'class="desabilitado"';
    }
    
    echo '<tr '.$classe.'>
    <td>' . $palestrante[$i]["nome"] . '</td>
    <td> <img src="../images/' . $palestrante[$i]["imagem"] . '" alt="' . $palestrante[$i]["nome"] . '" title="' . $palestrante[$i]["nome"] . '" width="100" /></td>
    <td><a href = "altExpositor.php?id=' . $palestrante[$i]['idExpositor'] . '">Alterar</a></td>
    <td><a href = "javascript:delExpositor(' . $palestrante[$i]["idExpositor"] . ')">Excluir</a></td>
    </tr>';
}
?>