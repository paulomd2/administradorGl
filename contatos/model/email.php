<?php

class Email {

    private $idEmail;
    private $nome;
    private $email;
    private $dataCadastro;
    private $principal;

    public function getIdEmail() {
        return $this->idEmail;
    }

    public function setIdEmail($idEmail) {
        $this->idEmail = $idEmail;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function getPrincipal() {
        return $this->principal;
    }

    function setPrincipal($principal) {
        $this->principal = $principal;
    }

}

$objEmail = new Email();
