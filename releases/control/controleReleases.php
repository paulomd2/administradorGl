<?php
require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao){
    case 'cadastrar':
        $titulo = $_POST['titulo'];
        $status = $_POST['status'];
        $texto= $_POST['texto'];
        $mes = $_POST['mes'];
        $dataCadastro = date('Y-m-d H:i:s');
        
        $objRelease->setTitulo($titulo);
        $objRelease->setMes($mes);
        $objRelease->setStatus($status);
        $objRelease->setTexto($texto);
        $objRelease->setDataCadastro($dataCadastro);
        
        $objReleasesDao->cadRelease($objRelease);
    break;

    case 'alterar':
        $titulo = $_POST['titulo'];
        $status = $_POST['status'];
        $texto= $_POST['texto'];
        $mes = $_POST['mes'];
        $idRelease = $_POST['idRelease'];
        
        $objRelease->setTitulo($titulo);
        $objRelease->setMes($mes);
        $objRelease->setStatus($status);
        $objRelease->setTexto($texto);
        $objRelease->setIdRelease($idRelease);
        
        $objReleasesDao->altRelease($objRelease);
    break;

    case 'excluir':
        $idRelease = $_POST['idRelease'];
        
        $objRelease->setIdRelease($idRelease);
        
        $objReleasesDao->delRelease($objRelease);
    break;
}