<?php

class Evento {

    private $idEvento;
    private $titulo;
    private $nome;
    private $dataInicio;
    private $dataFim;
    private $dataCadastro;
    private $imagem;
    private $texto;
    private $tituloMetaTag;
    private $keywordsMetaTag;
    private $descricaoMetaTag;
    private $status;

    function getIdEvento() {
        return $this->idEvento;
    }
    function setIdEvento($idEvento) {
        $this->idEvento = seg($idEvento);
    }

    
    function getTitulo() {
        return $this->titulo;
    }
    function setTitulo($titulo) {
        $this->titulo = seg($titulo);
    }

    
    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = seg($nome);
    }

    
    function getDataInicio() {
        return $this->dataInicio;
    }
    function setDataInicio($dataInicio) {
        $this->dataInicio = seg($dataInicio);
    }

    
    function getDataFim() {
        return $this->dataFim;
    }
    function setDataFim($dataFim) {
        $this->dataFim = $dataFim;
    }

    
    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function getTexto() {
        return $this->texto;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function getTituloMetaTag() {
        return $this->tituloMetaTag;
    }

    function setTituloMetaTag($tituloMetaTag) {
        $this->tituloMetaTag = $tituloMetaTag;
    }

    function getKeywordsMetatag() {
        return $this->keywordsMetaTag;
    }
    function setKeywordsMetatag($keywordsMetatag) {
        $this->keywordsMetaTag = $keywordsMetatag;
    }

    
    function getDescricaoMetaTag() {
        return $this->descricaoMetaTag;
    }
    function setDescricaoMetaTag($descricaoMetaTag) {
        $this->descricaoMetaTag = $descricaoMetaTag;
    }
    
    
    function getStatus(){
        return $this->status;
    }
    function setStatus($status){
        $this->status = $status;
    }
}

$objEvento = new Evento();
?>