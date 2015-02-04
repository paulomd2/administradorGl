<?php

class ImagemRodape {

    private $idImagem;
    private $idCategoria;
    private $nome;
    private $imagem;
    private $link;
    private $dataCadastro;
    private $status;
    private $ordem;

    function getIdImagem() {
        return $this->idImagem;
    }
    function setIdImagem($idImagem) {
        $this->idImagem = $idImagem;
    }

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

    function getImagem() {
        return $this->imagem;
    }
    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function getLink() {
        return $this->link;
    }
    function setLink($link) {
        $this->link = $link;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = $status;
    }

    function getOrdem() {
        return $this->ordem;
    }
    function setOrdem($ordem) {
        $this->ordem = $ordem;
    }

}

$objImagem = new ImagemRodape();
?>