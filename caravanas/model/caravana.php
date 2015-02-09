<?php

class Caravana {

    private $idCaravana;
    private $nome;
    private $responsavel;
    private $email;
    private $telefone;
    private $celular;
    private $local;
    private $cidade;
    private $estado;
    private $status;
    private $dataCadastro;

    function getIdCaravana() {
        return $this->idCaravana;
    }
    function setIdCaravana($idCaravana) {
        $this->idCaravana = $idCaravana;
    }

    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }

    function getResponsavel() {
        return $this->responsavel;
    }
    function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    function getEmail() {
        return $this->email;
    }
    function setEmail($email) {
        $this->email = $email;
    }

    function getTelefone() {
        return $this->telefone;
    }
    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function getCelular() {
        return $this->celular;
    }
    function setCelular($celular) {
        $this->celular = $celular;
    }

    function getLocal() {
        return $this->local;
    }
    function setLocal($local) {
        $this->local = $local;
    }

    function getCidade() {
        return $this->cidade;
    }
    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function getEstado() {
        return $this->estado;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }

    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = $status;
    }

    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

}
$objCaravana = new Caravana();
?>