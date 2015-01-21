<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST["opcao"];

switch ($opcao) {

    case "cadastrarMenu": {
            $titulo = $_POST['titulo'];
            $link = $_POST['link'];

            $objMenu->setTitulo($titulo);
            $objMenu->setLink($link);

            $objConteudoDao->cadMenu($objMenu);

            break;
        }
    case "alterarMenu": {
            $titulo = $_POST['titulo'];
            $link = $_POST['link'];
            $idMenu = $_POST['idMenu'];

            $objMenu->setIdMenu($idMenu);
            $objMenu->setTitulo($titulo);
            $objMenu->setLink($link);

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
}