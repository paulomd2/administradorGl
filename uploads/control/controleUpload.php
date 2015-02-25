<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];

switch ($opcao) {

    case 'pasta':
        echo $pasta = '../../arquivos/' . $_POST['pasta'].'/';

        if ($pasta != '' && is_dir($pasta) === false) {
            mkdir($pasta);
        }
        
        break;
        
    case 'cadastrar':
        $nome = $_POST['nome'];
        $pasta = $_POST['pasta'];
        $arquivo = uploadArquivos();
        $satus = $_POST['status'];
        $dataCadastro = date("Y-m-d H:i:s");

        break;
    
    case 'listaDiretorios':
                $caminho = '../../arquivos';
                $pastas = array();
                $arquivos = array();
                $itens = array();
                
                $ponteiro = scandir($caminho);

                foreach ($ponteiro as $listar) {
                    
                    if ($listar != "." && $listar != "..") {

                        if (is_dir($caminho.'/'.$listar)) {
                            $itens[] = $listar;
                        }else {
                            //$itens['arquivos'][] = $listar;
                        }
                    }
                }

                $itens = json_encode($itens);
                print_r($itens);
        break;
}

function uploadArquivos() {
// Define a destination
    $targetFolder = '../arquivos'; // Relative to the root
    $folderName = $_POST['pasta'];

    $verifyToken = md5('unique_salt' . $_POST['timestamp']);

    if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
        $tempFile = $_FILES['Filedata']['tmp_name'];
        //$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
        $targetPath = $targetFolder;
        $targetFile = rtrim($targetPath, '/') . '/' . $_FILES['Filedata']['name'];

        // Validate the file type
        $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
        $fileParts = pathinfo($_FILES['Filedata']['name']);

        if (in_array($fileParts['extension'], $fileTypes)) {
            move_uploaded_file($tempFile, $targetFile);
            echo '1';
        }

        return $targetFile;
    }
}
