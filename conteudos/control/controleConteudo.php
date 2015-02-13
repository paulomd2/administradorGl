<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST["opcao"];

switch ($opcao) {

    case "cadastrarMenu": {
            $titulo = $_POST['titulo'];
            $link = $_POST['link'];
            $target = $_POST['target'];

            $objMenu->setTitulo($titulo);
            $objMenu->setLink($link);
            $objMenu->setTarget($target);

            $objConteudoDao->cadMenu($objMenu);

            break;
        }
    case "alterarMenu": {
            $titulo = $_POST['titulo'];
            $link = $_POST['link'];
            $idMenu = $_POST['idMenu'];
            $target = $_POST['target'];

            $objMenu->setIdMenu($idMenu);
            $objMenu->setTitulo($titulo);
            $objMenu->setLink($link);
            $objMenu->setTarget($target);

            $objConteudoDao->altMenu($objMenu);

            break;
        }
    case "excluirMenu": {
            $idMenu = $_POST['idMenu'];

            $objMenu->setIdMenu($idMenu);

            $objConteudoDao->delMenu($objMenu);

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

            $objConteudoDao->cadSubmenu($objSubMenu);
            break;
        }

    case 'excluirSubmenu': {

            $idSubmenu = $_POST['idSubmenu'];

            $objSubMenu->setIdSubmenu($idSubmenu);

            $objConteudoDao->delSubmenu($objSubMenu);
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
        }


    case 'ordenaMenu': {
            //$action = mysql_real_escape_string($_POST['action']);
            $updateRecordsArray = $_POST['recordsArray'];

            $listingCounter = 1;
            foreach ($updateRecordsArray as $recordIDValue) {
                $objConteudoDao->ordenaMenu($listingCounter, $recordIDValue);
                $listingCounter++;
            }
        }

    case 'cadastrarPagina':
        $titulo= $_POST['titulo'];
        $link = $_POST['link'];
        $status = $_POST['status'];
        $texto = $_POST['texto'];
        $tituloSeo = $_POST['tituloMetaTag'];
        $keywordsSeo = $_POST['keywordsMetaTag'];
        $descricaoSeo = $_POST['descricaoMetaTag'];

        $objPagina->setTitulo($titulo);
        $objPagina->setLink($link);
        $objPagina->setStatus($status);
        $objPagina->setTexto($texto);
        $objPagina->setTituloSeo($tituloSeo);
        $objPagina->setKeywordSeo($keywordsSeo);
        $objPagina->setDescricaoSeo($descricaoSeo);

        $objConteudoDao->cadPagina($objPagina);
        break;
    
    case 'alterarPagina':
        $idPagina = $_POST['idPagina'];
        $titulo= $_POST['titulo'];
        $link = $_POST['link'];
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