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
        $this->idExpositor = seg($idExpositor);
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

    
    function getDataPublicacao() {
        return $this->dataPublicacao;
    }
    function setDataPublicacao($dataPublicacao) {
        $this->dataPublicacao = seg($dataPublicacao);
    }
    

    function getLink() {
        return $this->link;
    }
    function setLink($link) {
        $this->link = seg($link);
    }
    

    function getEstande() {
        return $this->estande;
    }
    function setEstande($estande) {
        $this->estande = seg($estande);
    }
    

    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }
    

    function getOrdem() {
        return $this->ordem;
    }
    function setOrdem($ordem) {
        $this->ordem = seg($ordem);
    }
    

    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = seg($status);
    }

}

$objExpositor = new Expositor();
?>