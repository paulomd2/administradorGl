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

            $objMenuDao->cadMenu($objMenu);

            break;
        }
    case "alterarMenu": {
            $titulo = $_POST['titulo'];
            $link = $_POST['link'];
            $idMenu = $_POST['idMenu'];

            $objMenu->setIdMenu($idMenu);
            $objMenu->setTitulo($titulo);
            $objMenu->setLink($link);

            $objMenuDao->altMenu($objMenu);

            break;
        }
    case "excluirMenu": {
            $idMenu = $_POST['idMenu'];

            $objMenu->setIdMenu($idMenu);

            $objMenuDao->delMenu($objMenu);

            break;
        }
}