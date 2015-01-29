<?php

require_once '../model/banco.php';
require_once 'model/dao.php';

$file_path = 'news.csv';

$dados = '';
$emails = $objNewsDao->listaEmail();

//tell the browser it's going to be a csv file
header('Content-Type: application/csv');
// tell the browser we want to save it instead of displaying it
header('Content-Disposition: attachement; filename="' . $file_path . '";');

for ($i = 1; $i < count($emails); $i++) {
    echo $emails[$i]['email'].', ';
}

// Verifica se vc tem permissão de leitura e escrita neste diretorio  
$file = fopen($file_path, 'w+');
fwrite($file, $dados);
//fpassthru($file);
fclose($file);
?>