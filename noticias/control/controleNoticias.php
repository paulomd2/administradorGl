<?php

require_once '../../model/banco.php';
require_once '../../model/log.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case "cadastrar": {

            $titulo = htmlentities($_POST['titulo']);
            $subtitulo = htmlentities($_POST['subtitulo']);
            $texto = htmlentities($_POST['texto']);
            $DataPublicacao = $_POST['dataPublicacao'];
            $mercado = $_POST['mercado'];
            $fonte = $_POST['fonte'];
            $status = $_POST['status'];
            $dataCadastro = date('Y-m-d H:i:s');

            $objNoticia->setTitulo($titulo);
            $objNoticia->setSubtitulo($subtitulo);
            $objNoticia->setTexto($texto);
            $objNoticia->setDataPublicacao($DataPublicacao);
            $objNoticia->setFonte($fonte);
            $objNoticia->setMercado($mercado);
            $objNoticia->setStatus($status);
            $objNoticia->setDataCadastro($dataCadastro);

            $objNoticiaDao->cadNoticia($objNoticia);
            $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'NOTICIAS', 0, $dataCadastro);
            break;
        }

    case "alterar": {
            $idNoticia = $_POST['idNoticia'];
            $titulo = htmlentities($_POST['titulo']);
            $subtitulo = htmlentities($_POST['subtitulo']);
            $texto = htmlentities($_POST['texto']);
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
            $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'NOTICIAS', $objNoticia->getIdNoticia(), date('Y-m-d H:i:s'));
            break;
        }

    case "excluir": {
            $idNoticia = $_POST['idNoticia'];

            $objNoticia->setIdNoticia($idNoticia);

            $objNoticiaDao->delNoticia($objNoticia);
            $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'NOTICIAS', $objNoticia->getIdNoticia(), date('Y-m-d H:i:s'));
            break;
        }
}