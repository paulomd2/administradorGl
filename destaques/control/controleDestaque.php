<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case "cadastrar": {
            $titulo = $_POST['titulo'];
            $subitulo = $_POST['subitulo'];
            $conteudo = $_POST['conteudo'];
            $imagem = $_POST['imagem'];
            $DataPublicacao = $_POST['DataPublicacao'];
            $dataSaida = $_POST['dataSaida'];
            $link = $_POST['link'];
            $dataCadastro = date('Y-m-d H:i:s');

            $objDestaques->setTitulo($titulo);
            $objDestaques->setSubitulo($subitulo);
            $objDestaques->setConteudo($conteudo);
            $objDestaques->setImagem($imagem);
            $objDestaques->setDataPublicacao($DataPublicacao);
            $objDestaques->setDataSaida($dataSaida);
            $objDestaques->setDataCadastro($dataCadastro);
            $objDestaques->setLink($link);

            $$objDestaquesDao->cadDestaque($objDestaques);

            break;
        }

    case "alterar": {
            $titulo = $_POST['titulo'];
            $subitulo = $_POST['subitulo'];
            $conteudo = $_POST['conteudo'];
            $imagem = $_POST['imagem'];
            $DataPublicacao = $_POST['DataPublicacao'];
            $dataSaida = $_POST['dataSaida'];
            $link = $_POST['link'];

            $objDestaques->setTitulo($titulo);
            $objDestaques->setSubitulo($subitulo);
            $objDestaques->setConteudo($conteudo);
            $objDestaques->setImagem($imagem);
            $objDestaques->setDataPublicacao($DataPublicacao);
            $objDestaques->setDataSaida($dataSaida);
            $objDestaques->setLink($link);

            $$objDestaquesDao->altDestaque($objDestaques);
            break;
        }

    case "excluir": {
            $idDestaque = $_POST['id_destaques'];

            $objDestaques->setIdDestaque($idDestaque);

            $$objDestaquesDao->delDestaques($objDestaques);

            break;
        }
}