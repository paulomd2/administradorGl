<?php

//var_dump($_FILES);
if ($_FILES['upload']['name']) {

    if (!$_FILES['upload']['error']) {
        $valid_file = true;
        
        $tipoArquivo = pathinfo($_FILES['upload']['name']);
        $tipoArquivo = '.'.$tipoArquivo['extension'];
        
        $new_file_name = strtolower(md5(date('d/m/Y/H:i:s'))).$tipoArquivo;
        if ($_FILES['upload']['size'] > (1024000)) { //can't be larger than 1 MB
            $valid_file = false;
        }

        if ($valid_file) {

            move_uploaded_file($_FILES['upload']['tmp_name'], '../images/' . $new_file_name);
        }
    }
    
}



