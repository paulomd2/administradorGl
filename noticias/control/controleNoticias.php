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
            $status = $_POST['status'];

            $objNoticia->setTitulo($titulo);
            $objNoticia->setSubtitulo($subtitulo);
            $objNoticia->setTexto($texto);
            $objNoticia->setDataPublicacao($DataPublicacao);
            $objNoticia->setFonte($fonte);
            $objNoticia->setMercado($mercado);
            $objNoticia->setStatus($status);

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
            $status = $_POST['status'];

            $objNoticia->setTitulo($titulo);
            $objNoticia->setSubtitulo($subtitulo);
            $objNoticia->setTexto($texto);
            $objNoticia->setDataPublicacao($DataPublicacao);
            $objNoticia->setFonte($fonte);
            $objNoticia->setIdNoticia($idNoticia);
            $objNoticia->setMercado($mercado);
            $objNoticia->setStatus($status);


            $objNoticiaDao->altNoticia($objNoticia);
            break;
        }

    case "excluir": {
            $idNoticia = $_POST['idNoticia'];

            $objNoticia->setIdNoticia($idNoticia);

            $objNoticiaDao->delNoticia($objNoticia);

            break;
        }
}