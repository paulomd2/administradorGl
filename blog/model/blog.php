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
        $this->idPostagem = seg($idPostagem);
    }

    
    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = seg($titulo);
    }

    
    public function getTexto() {
        return $this->texto;
    }
    public function setTexto($texto) {
        $this->texto = seg($texto);
    }

    
    public function getDataPublicacao() {
        return $this->dataPublicacao;
    }
    public function setDataPublicacao($dataPublicacao) {
        $this->dataPublicacao = seg($dataPublicacao);
    }

    
    public function getDataSaida() {
        return $this->dataSaida;
    }
    public function setDataSaida($dataSaida) {
        $this->dataSaida = seg($dataSaida);
    }

    
    public function getDataCadastro() {
        return $this->dataCadastro;
    }
    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }

    
    public function getIdUsuario() {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = seg($idUsuario);
    }

    
    public function getImagem() {
        return $this->imagem;
    }
    public function setImagem($imagem) {
        $this->imagem = seg($imagem);
    }

    
    public function getTituloSeo() {
        return $this->tituloSeo;
    }
    public function setTituloSeo($tituloSeo) {
        $this->tituloSeo = seg($tituloSeo);
    }

    
    public function getTagSeo() {
        return $this->tagSeo;
    }
    public function setTagSeo($tagSeo) {
        $this->tagSeo = seg($tagSeo);
    }

    
    public function getDescricaoSeo() {
        return $this->descricaoSeo;
    }
    public function setDescricaoSeo($descricaoSeo) {
        $this->descricaoSeo = seg($descricaoSeo);
    }
    
    
    public function getStatus(){
        return $this->status;
    }    
    public function setStatus($status){
        $this->status = seg($status);
    }

}

$objBlog = new Blog();