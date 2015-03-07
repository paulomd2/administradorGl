<?php
@$opcao = $_POST['opcao'];

switch ($opcao) {

    case 'pasta':
        echo $pasta = '../../arquivos/' . $_POST['pasta'] . '/';

        if ($pasta != '' && is_dir($pasta) === false) {
            mkdir($pasta);
            $objLogDao->cadLog($_SESSION['id'], 'CRIOU', 'PASTA_UPLOAD '.$_POST['pasta'], 0, date('Y-m-d H:i:s'));
        }

        break;

    case 'listaDiretorios':
        $caminho = '../../arquivos';
        $pastas = lista($caminho);
        $pastas = $pastas['pastas'];

        $pastas = json_encode($pastas);
        print_r($pastas);
        break;

    case 'delPasta':
        $pasta = $_POST['pasta'];
        $caminho = '../../arquivos/';


        delTree($caminho . $pasta);
        $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'PASTA_UPLOAD '.$_POST['pasta'], 0, date('Y-m-d H:i:s'));
        break;

    case 'listaArquivos':
        $pasta = $_POST['pasta'];
        $caminho = '../../arquivos/'.$pasta;
        
        $arquivos = lista($caminho);
        $arquivos = $arquivos['arquivos'];

        $arquivos = json_encode($arquivos);
        print_r($arquivos);
        break;
    
    case 'delArquivo':
        $pasta = $_POST['pasta'];
        $arquivo = $_POST['arquivo'];
        echo $caminho = '../../arquivos/'.$pasta.'/'.$arquivo;
        
        unlink($caminho);
        $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'ARQUIVO_UPLOAD '.$_POST['arquivo'], 0, date('Y-m-d H:i:s'));
        break;
}

function delTree($dir) {
    $files = array_diff(scandir($dir), array('.', '..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
}

function lista($caminho) {
    $itens = array();

    $ponteiro = scandir($caminho);

    foreach ($ponteiro as $listar) {

        if ($listar != "." && $listar != "..") {

            if (is_dir($caminho . '/' . $listar)) {
                $itens['pastas'][] = $listar;
            } else {
                $itens['arquivos'][] = $listar;
            }
        }
    }
    
    return $itens;
}
