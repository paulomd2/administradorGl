<?php

class Pagina {

    private $idPagina;
    private $titulo;
    private $texto;
    private $link;
    private $status;
    private $dataEntrada;
    private $dataSaida;
    private $tituloSeo;
    private $keywordSeo;
    private $descricaoSeo;
    private $dataCadastro;

    function getIdPagina() {
        return $this->idPagina;
    }
    function setIdPagina($idPagina) {
        $this->idPagina = seg($idPagina);
    }
    

    function getTitulo() {
        return $this->titulo;
    }
    function setTitulo($titulo) {
        $this->titulo= seg($titulo);
    }
    
    
    function getTexto() {
        return $this->texto;
    }
    function setTexto($texto) {
        $this->texto = seg($texto);
    }

    
    function getLink() {
        return $this->link;
    }
    function setLink($link) {
        $this->link = seg($link);
    }
    
    
    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = seg($status);
    }


    function getTituloSeo() {
        return $this->tituloSeo;
    }
    function setTituloSeo($tituloSeo) {
        $this->tituloSeo = seg($tituloSeo);
    }
    

    function getKeywordSeo() {
        return $this->keywordSeo;
    }
    function setKeywordSeo($keywordSeo) {
        $this->keywordSeo = seg($keywordSeo);
    }

    
    function getDescricaoSeo() {
        return $this->descricaoSeo;
    }
    function setDescricaoSeo($descricaoSeo) {
        $this->descricaoSeo = seg($descricaoSeo);
    }
    
    
    function getDataCadastro(){
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro){
        $this->dataCadastro = seg($dataCadastro);
    }
}

$objPagina = new Pagina();
