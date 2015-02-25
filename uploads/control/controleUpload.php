<?php
require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];

switch($opcao){
    case 'cadastrar':
        $nome = $_POST['nome'];
        $pasta = $_POST['pasta'];
        $arquivo = uploadArquivos();
        $satus = $_POST['status'];
        $dataCadastro = date("Y-m-d H:i:s");
        
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
