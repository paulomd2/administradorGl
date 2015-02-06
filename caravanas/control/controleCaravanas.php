<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';


$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'texto':
        $texto = $_POST['texto'];
        $opcaoTexto = $_POST['opcaoTexto'];

        $objTexto->setTexto($texto);

        if ($opcaoTexto == 'cadastrar') {
            $objCaravanaDao->cadTexto($objTexto);
        } else {
            $objCaravanaDao->altTexto($objTexto);
        }
        break;
        
        
        
}