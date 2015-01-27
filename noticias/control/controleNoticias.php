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

            $objDestaques->setTitulo($titulo);
            $objDestaques->setSubitulo($subitulo);
            $objDestaques->setConteudo($conteudo);
            $objDestaques->setImagem($imagem);
            $objDestaques->setDataPublicacao($DataPublicacao);
            $objDestaques->setDataSaida($dataSaida);
            $objDestaques->setLink($link);

            $objDestaquesDao->cadDestaques($objDestaques);

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

            //setando dados recebidos
            $objDestaques->setTitulo($titulo);
            $objDestaques->setSubitulo($subitulo);
            $objDestaques->setConteudo($conteudo);
            $objDestaques->setImagem($imagem);
            $objDestaques->setDataPublicacao($DataPublicacao);
            $objDestaques->setDataSaida($dataSaida);
            $objDestaques->setLink($link);

            //inserindo dados
            $objDestaquesDao->atualizaDestaques($objDestaques);

            //redirecionando
            echo "<script>window.location='../view/manter_destaques.php';</script>";

            break;
        }

    case "deletar": {

            //recebendo identifica��o
            $idDestaque = $_POST['id_destaques'];

            //setando identifica��o recebida
            $objDestaques->setIdDestaque($idDestaque);

            //apagando registro
            $objDestaquesDao->deletaDestaques($objDestaques);

            //redirecionando
            echo "<script>window.location='../view/manter_destaques.php';</script>";

            break;
        }
}