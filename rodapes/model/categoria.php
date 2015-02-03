<?php

class Categoria {

    private $idCategoria;
    private $nome;
    private $ordem;
    private $identificador;

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
    function setImagem($ordem) {
        $this->ordem = $ordem;
    }

    function getIdentificador() {
        return $this->identificador;
    }
    function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }

}

$objCategoria = new Categoria();
?>