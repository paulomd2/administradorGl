<?php

class Palestrante {

    private $idPalestrante;
    private $nome;
    private $imagem;
    private $data;
    private $curriculo;
    private $cargo;
    private $status;

    function getIdPalestrante() {
        return $this->idPalestrante;
    }
    function setIdPalestrante($idExpositor) {
        $this->idPalestrante = seg($idExpositor);
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

    
    function getData() {
        return $this->data;
    }
    function setData($data) {
        $this->data = seg($data);
    }
    

    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = seg($status);
    }

    
    
    public function getCurriculo(){
        return $this->curriculo;
    }
    public function setCurriculo($curriculo){
        $this->curriculo = seg($curriculo);
    }
    
    
    public function getCargo(){
        return $this->cargo;
    }
    public function setCargo($cargo){
        $this->cargo = seg($cargo);
    }
}

$objPalestrante = new Palestrante();
?>