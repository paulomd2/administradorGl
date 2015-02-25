<?php

/*
  Uploadify
  Copyright (c) 2012 Reactive Apps, Ronnie Garcia
  Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */

// Define a destination
$targetFolder = '../../arquivos'; // Relative to the root
$folderName = $_POST['folder'];

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
    $tipoArquivo = pathinfo($_FILES['Filedata']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];
    $nomeArquivo = md5(date("Y-m-d H:i:s"). ' ' .$_FILES['Filedata']['name']).$tipoArquivo;
    $tempFile = $_FILES['Filedata']['tmp_name'];
    
    
    //$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    $targetPath = $targetFolder . '/' . $folderName;
    $targetFile = rtrim($targetPath, '/') . '/' . $nomeArquivo;

    /*
      // Validate the file type
      $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
      $fileParts = pathinfo($_FILES['Filedata']['name']);

      if (in_array($fileParts['extension'],$fileTypes)) {
      move_uploaded_file($tempFile,$targetFile);
      echo '1';
      } else {
      echo 'Invalid file type.';
      }
     * 
     */

    move_uploaded_file($tempFile, $targetFile);
}
?>