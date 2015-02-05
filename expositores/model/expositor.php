<?php

class Expositor {

    private $idExpositor;
    private $nome;
    private $imagem;
    private $dataPublicacao;
    private $link;
    private $estande;
    private $dataCadastro;
    private $ordem;
    private $status;

    function getIdExpositor() {
        return $this->idExpositor;
    }
    function setIdExpositor($idExpositor) {
        $this->idExpositor = $idExpositor;
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

    function getDataPublicacao() {
        return $this->dataPublicacao;
    }
    function setDataPublicacao($dataPublicacao) {
        $this->dataPublicacao = $dataPublicacao;
    }

    function getLink() {
        return $this->link;
    }
    function setLink($link) {
        $this->link = $link;
    }

    function getEstande() {
        return $this->estande;
    }
    function setEstande($estande) {
        $this->estande = $estande;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function getOrdem() {
        return $this->ordem;
    }
    function setOrdem($ordem) {
        $this->ordem = $ordem;
    }

    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = $status;
    }

}

$objExpositor = new Expositor();
?>