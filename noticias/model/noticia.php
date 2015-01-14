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

    public function getIdNoticia() {
        return $this->idNoticia;
    }

    public function setIdNoticia($idNoticia) {
        $this->idNoticia = $idNoticia;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getSubTitulo() {
        return $this->subtitulo;
    }

    public function setSubTitulo($subtitulo) {
        $this->subtitulo = $subtitulo;
    }

    public function getFonte() {
        return $this->fonte;
    }

    public function setFonte($fonte) {
        $this->fonte = $fonte;
    }

    function getTexto() {
        return $this->texto;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function getDataPublicacao() {
        return $this->dataPublicacao;
    }

    function setDataPublicacao($dataPublicacao) {
        $this->dataPublicacao = $dataPublicacao;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function getMercado() {
        return $this->mercado;
    }

    function setMercado($mercado) {
        $this->mercado = $mercado;
    }

}

$objNoticia = new Noticia();
