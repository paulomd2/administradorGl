<?php

class Categoria {

    private $idCategoria;
    private $nome;
    private $ordem;
    private $identificador;
    private $dataCadastro;
    private $status;

    function getIdCategoria() {
        return $this->idCategoria;
    }
    function setIdCategoria($idCategoria) {
        $this->idCategoria = seg($idCategoria);
    }

    
    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = seg($nome);
    }

    
    function getOrdem() {
        return $this->ordem;
    }
    function setOrdem($ordem) {
        $this->ordem = seg($ordem);
    }

    
    function getIdentificador() {
        return $this->identificador;
    }
    function setIdentificador($identificador) {
        $this->identificador = seg($identificador);
    }
    
    
    function getDataCadastro(){
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro){
        $this->dataCadastro = seg($dataCadastro);
    }
    
    
    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = seg($status);
    }
}

$objCategoria = new Categoria();
?>