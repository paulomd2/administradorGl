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
        $this->idCategoria = $idCategoria;
    }

    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }

    function getOrdem() {
        return $this->ordem;
    }
    function setOrdem($ordem) {
        $this->ordem = $ordem;
    }

    function getIdentificador() {
        return $this->identificador;
    }
    function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }
    
    function getDataCadastro(){
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }
    
    
    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = $status;
    }
}

$objCategoria = new Categoria();
?>