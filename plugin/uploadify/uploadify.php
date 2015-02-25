<?php

/*
  Uploadify
  Copyright (c) 2012 Reactive Apps, Ronnie Garcia
  Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */

$targetFolder = '../../arquivos/'; // Relative to the root
$folderName = $_POST['folder'];

if ($folderName != 'nova') {
    $tipoArquivo = pathinfo($_FILES['Filedata']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];
    $nomeArquivo = md5(date("Y-m-d H:i:s"). ' ' .$_FILES['Filedata']['name']).$tipoArquivo;
    $tempFile = $_FILES['Filedata']['tmp_name'];
    
    $targetPath = $targetFolder .  $folderName.'/';
    $targetFile = $targetPath. $nomeArquivo;


    move_uploaded_file($tempFile, $targetFile);
}
?>