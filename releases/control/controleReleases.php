<?php
require_once '../../model/banco.php';
require_once '../../model/log.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao){
    case 'cadastrar':
        $titulo = $_POST['titulo'];
        $status = $_POST['status'];
        $texto= $_POST['texto'];
        $mes = $_POST['mes'];
        $dataCadastro = date('Y-m-d H:i:s');
        $dataEntrada = $_POST['dataEntrada'];
        $dataSaida = $_POST['dataSaida'];
        
        $objRelease->setTitulo($titulo);
        $objRelease->setMes($mes);
        $objRelease->setStatus($status);
        $objRelease->setTexto($texto);
        $objRelease->setDataCadastro($dataCadastro);
        $objRelease->setDataEntrada($dataEntrada);
        $objRelease->setDataSaida($dataSaida);
        
        $objReleasesDao->cadRelease($objRelease);
        $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'RELEASES', 0, $dataCadastro);
    break;

    case 'alterar':
        $titulo = $_POST['titulo'];
        $status = $_POST['status'];
        $texto= $_POST['texto'];
        $mes = $_POST['mes'];
        $idRelease = $_POST['idRelease'];
        $dataEntrada = implode('-', array_reverse(explode('/', $_POST['dataEntrada'])));
        $dataSaida = implode('-', array_reverse(explode('/', $_POST['dataSaida'])));
        
        $objRelease->setTitulo($titulo);
        $objRelease->setMes($mes);
        $objRelease->setStatus($status);
        $objRelease->setTexto($texto);
        $objRelease->setIdRelease($idRelease);
        $objRelease->setDataEntrada($dataEntrada);
        $objRelease->setDataSaida($dataSaida);
        
        $objReleasesDao->altRelease($objRelease);
        $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'RELEASES', $objRelease->setIdRelease($idRelease), date('Y-m-d H:i:s'));
    break;

    case 'excluir':
        $idRelease = $_POST['idRelease'];
        
        $objRelease->setIdRelease($idRelease);
        
        $objReleasesDao->delRelease($objRelease);
        $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'RELEASES', $objRelease->setIdRelease($idRelease), date('Y-m-d H:i:s'));
    break;
}