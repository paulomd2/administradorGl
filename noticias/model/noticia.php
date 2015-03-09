<?php

class Noticia {

    private $idNoticia;
    private $titulo;
    private $subtitulo;
    private $fonte;
    private $texto;
    private $dataPublicacao;
    private $dataCadastro;
    private $mercado;
    private $status;

    public function getIdNoticia() {
        return $this->idNoticia;
    }
    public function setIdNoticia($idNoticia) {
        $this->idNoticia = seg($idNoticia);
    }
    

    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = seg($titulo);
    }
    

    public function getSubTitulo() {
        return $this->subtitulo;
    }
    public function setSubTitulo($subtitulo) {
        $this->subtitulo = seg($subtitulo);
    }

    
    public function getFonte() {
        return $this->fonte;
    }
    public function setFonte($fonte) {
        $this->fonte = seg($fonte);
    }

    
    function getTexto() {
        return $this->texto;
    }
    function setTexto($texto) {
        $this->texto = seg($texto);
    }

    
    function getDataPublicacao() {
        return $this->dataPublicacao;
    }
    function setDataPublicacao($dataPublicacao) {
        $this->dataPublicacao = seg($dataPublicacao);
    }

    
    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }

    
    function getMercado() {
        return $this->mercado;
    }
    function setMercado($mercado) {
        $this->mercado = seg($mercado);
    }
    
    
    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = seg($status);
    }
}

$objNoticia = new Noticia();
