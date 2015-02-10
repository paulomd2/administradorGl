<?php

class Destaque {

    private $idDestaque;
    private $titulo;
    private $subtitulo;
    private $conteudo;
    private $imagem;
    private $DataPublicacao;
    private $dataSaida;
    private $link;
    private $dataCadastro;
    private $status;
    

    function getIdDestaque() {
        return $this->idDestaque;
    }
    function setIdDestaque($idDestaque) {
        $this->idDestaque = seg($idDestaque);
    }

    
    function getTitulo() {
        return $this->titulo;
    }
    function setTitulo($titulo) {
        $this->titulo = seg($titulo);
    }

    
    function getSubtitulo() {
        return $this->subtitulo;
    }
    function setSubtitulo($subitulo) {
        $this->subtitulo = seg($subitulo);
    }

    
    function getConteudo() {
        return $this->conteudo;
    }
    function setConteudo($conteudo) {
        $this->conteudo = seg($conteudo);
    }

    
    function getImagem() {
        return $this->imagem;
    }
    function setImagem($imagem) {
        $this->imagem = seg($imagem);
    }

    
    function getDataPublicacao() {
        return $this->DataPublicacao;
    }
    function setDataPublicacao($DataPublicacao) {
        $this->DataPublicacao = seg($DataPublicacao);
    }

    
    function getDataSaida() {
        return $this->dataSaida;
    }    
    function setDataCadastro($DataCadastro) {
        $this->dataCadastro = seg($DataCadastro);
    }

    
    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function setDataSaida($dataSaida) {
        $this->dataSaida = seg($dataSaida);
    }

    
    function getLink() {
        return $this->link;
    }
    function setLink($link) {
        $this->link = seg($link);
    }
    
    
    function getStatus(){
        return $this->status;
    }
    function setStatus($status){
        $this->status = seg($status);
    }

}

$objDestaque = new Destaque();
