<?php

class Email {

    private $idEmail;
    private $nome;
    private $email;
    private $dataCadastro;
    private $principal;
    private $mensagem;
    private $idContato;
    
    
    public function getIdContato(){
        return $this->idContato;
    }
    public function setIdContato($idContato){
        $this->idContato = seg($idContato);
    }
    
    
    public function getMensagem(){
        return $this->mensagem;
    }
    public function setMensagem($mensagem){
        $this->mensagem = seg($mensagem);
    }

    
    public function getIdEmail() {
        return $this->idEmail;
    }
    public function setIdEmail($idEmail) {
        $this->idEmail = seg($idEmail);
    }

    
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = seg($nome);
    }

    
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = seg($email);
    }

    
    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }

    
    function getPrincipal() {
        return $this->principal;
    }
    function setPrincipal($principal) {
        $this->principal = seg($principal);
    }
}

$objEmail = new Email();
