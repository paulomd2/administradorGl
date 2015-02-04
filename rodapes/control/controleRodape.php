<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadastrarCategoria':
        $nome = $_POST['nome'];
        $identificador = $_POST['identificador'];
        $dataCadastro = date('Y-m-d H:i:s');
        $status = 1;

        $objCategoria->setNome($nome);
        $objCategoria->setIdentificador($identificador);
        $objCategoria->setDataCadastro($dataCadastro);
        $objCategoria->setStatus($status);
        
        $objRodapeDao->cadCategoria($objCategoria);
        break;

    case 'alterarCategoria':
        $nome = $_POST['nome'];
        $identificador = $_POST['identificador'];
        $idCategoria = $_POST['idCategoria'];

        $objCategoria->setNome($nome);
        $objCategoria->setIdentificador($identificador);
        $objCategoria->setIdCategoria($idCategoria);
        
        $objRodapeDao->altCategoria($objCategoria);
        break;

    case 'excluirCategoria':
        $idCategoria = $_POST['idCategoria'];

        $objCategoria->setIdCategoria($idCategoria);

        $objRodapeDao->delCategoria($objCategoria);
        break;

    case 'ordena':
        $action = mysql_real_escape_string($_POST['action']);
        $updateRecordsArray = $_POST['recordsArray'];

        $listingCounter = 1;
        foreach ($updateRecordsArray as $recordIDValue) {
            $objCategoriasDao->testaOrdem($listingCounter, $recordIDValue);
            $listingCounter++;
        }

        break;
}