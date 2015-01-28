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
        $this->idDestaque = $idDestaque;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function getSubtitulo() {
        return $this->subtitulo;
    }

    function setSubtitulo($subitulo) {
        $this->subtitulo = $subitulo;
    }

    function getConteudo() {
        return $this->conteudo;
    }

    function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function getDataPublicacao() {
        return $this->DataPublicacao;
    }

    function setDataPublicacao($DataPublicacao) {
        $this->DataPublicacao = $DataPublicacao;
    }

    function getDataSaida() {
        return $this->dataSaida;
    }
    
    
    function setDataCadastro($DataCadastro) {
        $this->dataCadastro = $DataCadastro;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function setDataSaida($dataSaida) {
        $this->dataSaida = $dataSaida;
    }

    function getLink() {
        return $this->link;
    }

    function setLink($link) {
        $this->link = $link;
    }
    
    
    function getStatus(){
        return $this->status;
    }
    
    function setStatus($status){
        $this->status = $status;
    }

}

$objDestaque = new Destaque();
