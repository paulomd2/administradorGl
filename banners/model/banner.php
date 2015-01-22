<?php

class Banners {

    private $idBanner;
    private $nome;
    private $imagem;
    private $dataPublicacao;
    private $link;
    private $target;
    private $dataCadastro;
    private $ordem;
    private $status;
    private $dataSaida;

    function getIdBanner() {
        return $this->idBanner;
    }

    function setIdBanner($idBanner) {
        $this->idBanner = $idBanner;
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

    function getTarget() {
        return $this->target;
    }

    function setTarget($target) {
        $this->target = $target;
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

    function getDataSaida() {
        return $this->dataSaida;
    }

    function setDataSaida($dataSaida) {
        $this->dataSaida = $dataSaida;
    }

}

$objBanner = new Banners();
?>