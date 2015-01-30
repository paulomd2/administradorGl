<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case "cadastrar": {

            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $texto = $_POST['texto'];
            $DataPublicacao = $_POST['dataPublicacao'];
            $mercado = $_POST['mercado'];
            $fonte = $_POST['fonte'];

            $objNoticia->setTitulo($titulo);
            $objNoticia->setSubtitulo($subtitulo);
            $objNoticia->setTexto($texto);
            $objNoticia->setDataPublicacao($DataPublicacao);
            $objNoticia->setFonte($fonte);
            $objNoticia->setMercado($mercado);

            $objNoticiaDao->cadNoticia($objNoticia);

            break;
        }

    case "alterar": {
            $idNoticia = $_POST['idNoticia'];
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $texto = $_POST['texto'];
            $DataPublicacao = $_POST['dataPublicacao'];
            $mercado = $_POST['mercado'];
            $fonte = $_POST['fonte'];

            $objNoticia->setTitulo($titulo);
            $objNoticia->setSubtitulo($subtitulo);
            $objNoticia->setTexto($texto);
            $objNoticia->setDataPublicacao($DataPublicacao);
            $objNoticia->setFonte($fonte);
            $objNoticia->setIdNoticia($idNoticia);
            $objNoticia->setMercado($mercado);


            $objNoticiaDao->altNoticia($objNoticia);
            break;
        }

    case "deletar": {

            //recebendo identifica��o
            $idDestaque = $_POST['id_destaques'];

            //setando identifica��o recebida
            $objNoticia->setIdDestaque($idDestaque);

            //apagando registro
            $objNoticiaDao->deletaDestaques($objNoticia);

            //redirecionando
            echo "<script>window.location='../view/manter_destaques.php';</script>";

            break;
        }
}