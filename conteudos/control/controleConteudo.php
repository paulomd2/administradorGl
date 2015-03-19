<?php

require_once '../../model/banco.php';
require_once '../../model/log.php';
require_once '../model/dao.php';

$opcao = $_POST["opcao"];

switch ($opcao) {

    case "cadastrarMenu": {
            $titulo = $_POST['titulo'];
            $link = $_POST['link'];
            $target = $_POST['target'];
            $dataCadastro = date('Y-m-d H:i:s');
            $lingua = $_POST['lingua'];
            $status = $_POST['status'];

            $objMenu->setTitulo($titulo);
            $objMenu->setLink($link);
            $objMenu->setTarget($target);
            $objMenu->setDataCadastro($dataCadastro);
            $objMenu->setLingua($lingua);
            $objMenu->setStatus($status);

            $objConteudoDao->cadMenu($objMenu);
            $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'MENU', 0, $dataCadastro);
            break;
        }
    case "alterarMenu": {
            $titulo = $_POST['titulo'];
            $link = $_POST['link'];
            $idMenu = $_POST['idMenu'];
            $target = $_POST['target'];
            $lingua = $_POST['lingua'];
            $status = $_POST['status'];

            $objMenu->setIdMenu($idMenu);
            $objMenu->setTitulo($titulo);
            $objMenu->setLink($link);
            $objMenu->setTarget($target);
            $objMenu->setLingua($lingua);
            $objMenu->setStatus($status);

            $objConteudoDao->altMenu($objMenu);
            $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'MENU', $objMenu->getIdMenu(), date('Y-m-d H:i:s'));

            break;
        }
    case "excluirMenu": {
            $idMenu = $_POST['idMenu'];

            $objMenu->setIdMenu($idMenu);

            $objConteudoDao->delMenu($objMenu);
            $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'MENU', $objMenu->getIdMenu(), date('Y-m-d H:i:s'));

            break;
        }

    case 'cadastrarSubmenu': {
            $idMenu = $_POST['idMenu'];
            $tituloMenu = $_POST['tituloMenu'];
            $tituloPagina = $_POST['tituloPagina'];
            $link = $_POST['link'];
            $target = $_POST['target'];
            $status = $_POST['status'];
            $texto = $_POST['texto'];
            $tituloMetaTag = $_POST['tituloMetaTag'];
            $keywordsMetaTag = $_POST['keywordsMetaTag'];
            $descricaoMetaTag = $_POST['descricaoMetaTag'];
            $dataEntrada = implode('-', array_reverse(explode('/', $_POST['dataEntrada'])));
            $dataSaida = implode('-', array_reverse(explode('/', $_POST['dataSaida'])));
            $dataCadastro = date('Y-m-d H:i:s');

            $objSubMenu->setIdMenu($idMenu);
            $objSubMenu->setTituloMenu($tituloMenu);
            $objSubMenu->setTituloPagina($tituloPagina);
            $objSubMenu->setLink($link);
            $objSubMenu->setTarget($target);
            $objSubMenu->setStatus($status);
            $objSubMenu->setTexto($texto);
            $objSubMenu->setTituloMetaTag($tituloMetaTag);
            $objSubMenu->setKeywordMetaTag($keywordsMetaTag);
            $objSubMenu->setDescricaoMetaTag($descricaoMetaTag);
            $objSubMenu->setDataEntrada($dataEntrada);
            $objSubMenu->setDataSaida($dataSaida);
            $objSubMenu->setDataCadastro($dataCadastro);

            $objConteudoDao->cadSubmenu($objSubMenu);
            $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'SUBMENU', 0, $dataCadastro);
            break;
        }

    case 'excluirSubmenu': {

            $idSubmenu = $_POST['idSubmenu'];

            $objSubMenu->setIdSubmenu($idSubmenu);

            $objConteudoDao->delSubmenu($objSubMenu);
            $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'SUBMENU', $objSubMenu->getIdSubmenu(), date('Y-m-d H:i:s'));
            break;
        }


    case 'AlterarSubmenu': {
            $idSubmenu = $_POST['idSubmenu'];
            $idMenu = $_POST['idMenu'];
            $tituloMenu = $_POST['tituloMenu'];
            $tituloPagina = $_POST['tituloPagina'];
            $link = $_POST['link'];
            $target = $_POST['target'];
            $status = $_POST['status'];
            $texto = $_POST['texto'];
            $tituloMetaTag = $_POST['tituloMetaTag'];
            $keywordsMetaTag = $_POST['keywordsMetaTag'];
            $descricaoMetaTag = $_POST['descricaoMetaTag'];
            $dataEntrada = implode('-', array_reverse(explode('/', $_POST['dataEntrada'])));
            $dataSaida = implode('-', array_reverse(explode('/', $_POST['dataSaida'])));

            $objSubMenu->setIdSubmenu($idSubmenu);
            $objSubMenu->setIdMenu($idMenu);
            $objSubMenu->setTituloMenu($tituloMenu);
            $objSubMenu->setTituloPagina($tituloPagina);
            $objSubMenu->setLink($link);
            $objSubMenu->setTarget($target);
            $objSubMenu->setStatus($status);
            $objSubMenu->setTexto($texto);
            $objSubMenu->setTituloMetaTag($tituloMetaTag);
            $objSubMenu->setKeywordMetaTag($keywordsMetaTag);
            $objSubMenu->setDescricaoMetaTag($descricaoMetaTag);
            $objSubMenu->setDataEntrada($dataEntrada);
            $objSubMenu->setDataSaida($dataSaida);

            $objConteudoDao->altSubmenu($objSubMenu);
            $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'SUBMENU', $objSubMenu->getIdSubmenu(), date('Y-m-d H:i:s'));
            break;
        }

    case 'ordenaSubmenu': {

            //$action = mysql_real_escape_string($_POST['action']);
            $updateRecordsArray = $_POST['recordsArray'];

            $listingCounter = 1;
            foreach ($updateRecordsArray as $recordIDValue) {
                $objConteudoDao->ordenaSubmenu($listingCounter, $recordIDValue);
                $listingCounter++;
            }
            break;
        }


    case 'ordenaMenu': {
            //$action = mysql_real_escape_string($_POST['action']);
            $updateRecordsArray = $_POST['recordsArray'];

            $listingCounter = 1;
            foreach ($updateRecordsArray as $recordIDValue) {
                $objConteudoDao->ordenaMenu($listingCounter, $recordIDValue);
                $listingCounter++;
            }

            break;
        }

    case 'cadastrarPagina': {
            $titulo = $_POST['titulo'];
            $link = converteLink($_POST['link']);
            $status = $_POST['status'];
            $texto = $_POST['texto'];
            $tituloSeo = $_POST['tituloMetaTag'];
            $keywordsSeo = $_POST['keywordsMetaTag'];
            $descricaoSeo = $_POST['descricaoMetaTag'];
            $dataCadastro = date('Y-m-d H:i:s');

            $objPagina->setTitulo($titulo);
            $objPagina->setLink($link);
            $objPagina->setStatus($status);
            $objPagina->setTexto($texto);
            $objPagina->setTituloSeo($tituloSeo);
            $objPagina->setKeywordSeo($keywordsSeo);
            $objPagina->setDescricaoSeo($descricaoSeo);
            $objPagina->setDataCadastro($dataCadastro);

            $objConteudoDao->cadPagina($objPagina);
            $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'PÁGINA', 0, $dataCadastro);
            break;
        }

    case 'alterarPagina': {
            $idPagina = $_POST['idPagina'];
            $titulo = $_POST['titulo'];
            $link = converteLink($_POST['link']);
            $status = $_POST['status'];
            $texto = $_POST['texto'];
            $tituloSeo = $_POST['tituloMetaTag'];
            $keywordsSeo = $_POST['keywordsMetaTag'];
            $descricaoSeo = $_POST['descricaoMetaTag'];

            $objPagina->setIdPagina($idPagina);
            $objPagina->setTitulo($titulo);
            $objPagina->setLink($link);
            $objPagina->setStatus($status);
            $objPagina->setTexto($texto);
            $objPagina->setTituloSeo($tituloSeo);
            $objPagina->setKeywordSeo($keywordsSeo);
            $objPagina->setDescricaoSeo($descricaoSeo);

            $objConteudoDao->altPagina($objPagina);
            break;
        }

    case 'excluirPagina': {
            $idPagina = $_POST['idPagina'];

            $objPagina->setIdPagina($idPagina);

            $objConteudoDao->delPagina($objPagina);
        }

    case 'verificaLink': {
            $link = converteLink($_POST['link']);

            $objPagina->setLink($link);

            $retorno = $objConteudoDao->verificaLink($objPagina);

            print_r($retorno['link']);
            break;
        }
}

function converteLink($post) {
    $link = strtolower($post);
    $link = str_replace(' ', '-', $link);
    $link = preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $link));


    return $link;
}
