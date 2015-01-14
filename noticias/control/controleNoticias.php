<?php
require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao){
    case 'cadastrar':
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $fonte = $_POST['fonte'];
        $dataPublicacao = implode('-', array_reverse(explode('/',$_POST['dataPublicacao'])));
        $texto= $_POST['texto'];
        $dataCadastro = date('Y-m-d H:i:s');
        $mercado = 0;
        
        $objNoticia->setTitulo($titulo);
        $objNoticia->setSubTitulo($subtitulo);
        $objNoticia->setFonte($fonte);
        $objNoticia->setDataPublicacao($dataPublicacao);
        $objNoticia->setTexto($texto);
        $objNoticia->setDataCadastro($dataCadastro);
        $objNoticia->setMercado($mercado);
        
        $objNoticiasDao->cadNoticia($objNoticia);
    break;

    case 'alterar':
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $fonte = $_POST['fonte'];
        $dataPublicacao = implode('-', array_reverse(explode('/',$_POST['dataPublicacao'])));
        $texto= $_POST['texto'];
        $dataCadastro = date('Y-m-d H:i:s');
        $mercado = 0;
        $idNoticia = $_POST['idNoticia'];
        
        $objNoticia->setTitulo($titulo);
        $objNoticia->setSubTitulo($subtitulo);
        $objNoticia->setFonte($fonte);
        $objNoticia->setDataPublicacao($dataPublicacao);
        $objNoticia->setTexto($texto);
        $objNoticia->setDataCadastro($dataCadastro);
        $objNoticia->setMercado($mercado);
        $objNoticia->setIdNoticia($idNoticia);
        
        $objNoticiasDao->altNoticia($objNoticia);
    break;

    case 'excluir':
        $idNoticia = $_POST['idNoticia'];
        
        $objNoticia->setIdNoticia($idNoticia);
        
        $objNoticiasDao->delNoticia($objNoticia);
    break;
}