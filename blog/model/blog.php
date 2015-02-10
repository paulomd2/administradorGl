<?php

class Blog {

    private $idPostagem;
    private $titulo;
    private $texto;
    private $dataPublicacao;
    private $dataSaida;
    private $dataCadastro;
    private $idUsuario;
    private $imagem;
    private $tagSeo;
    private $descricaoSeo;
    private $status;

    public function getIdPostagem() {
        return $this->idPostagem;
    }

    public function setIdPostagem($idPostagem) {
        $this->idPostagem = $idPostagem;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getDataPublicacao() {
        return $this->dataPublicacao;
    }

    public function setDataPublicacao($dataPublicacao) {
        $this->dataPublicacao = $dataPublicacao;
    }

    public function getDataSaida() {
        return $this->dataSaida;
    }

    public function setDataSaida($dataSaida) {
        $this->dataSaida = $dataSaida;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getTituloSeo() {
        return $this->tituloSeo;
    }

    public function setTituloSeo($tituloSeo) {
        $this->tituloSeo = $tituloSeo;
    }

    public function getTagSeo() {
        return $this->tagSeo;
    }

    public function setTagSeo($tagSeo) {
        $this->tagSeo = $tagSeo;
    }

    public function getDescricaoSeo() {
        return $this->descricaoSeo;
    }

    public function setDescricaoSeo($descricaoSeo) {
        $this->descricaoSeo = $descricaoSeo;
    }
    
    
    public function getStatus(){
        return $this->status;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }

}

$objBlog = new Blog();