<?php
$pasta = '../../arquivos/'.$_POST['pasta'];

if($pasta != '' && !is_dir($pasta)){
    mkdir($pasta);
}