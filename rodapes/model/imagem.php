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
        $this->idImagem = seg($idImagem);
    }

    
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

    
    function getImagem() {
        return $this->imagem;
    }
    function setImagem($imagem) {
        $this->imagem = seg($imagem);
    }

    
    function getLink() {
        return $this->link;
    }
    function setLink($link) {
        $this->link = seg($link);
    }

    
    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }

    
    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = seg($status);
    }
    

    function getOrdem() {
        return $this->ordem;
    }
    function setOrdem($ordem) {
        $this->ordem = seg($ordem);
    }

}

$objImagem = new ImagemRodape();
?>