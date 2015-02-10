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
        $this->idCaravana = seg($idCaravana);
    }

    
    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = seg($nome);
    }

    
    function getResponsavel() {
        return $this->responsavel;
    }
    function setResponsavel($responsavel) {
        $this->responsavel = seg($responsavel);
    }

    
    function getEmail() {
        return $this->email;
    }
    function setEmail($email) {
        $this->email = seg($email);
    }
    

    function getTelefone() {
        return $this->telefone;
    }
    function setTelefone($telefone) {
        $this->telefone = seg($telefone);
    }

    
    function getCelular() {
        return $this->celular;
    }
    function setCelular($celular) {
        $this->celular = seg($celular);
    }
    

    function getLocal() {
        return $this->local;
    }
    function setLocal($local) {
        $this->local = seg($local);
    }

    
    function getCidade() {
        return $this->cidade;
    }
    function setCidade($cidade) {
        $this->cidade = seg($cidade);
    }

    
    function getEstado() {
        return $this->estado;
    }
    function setEstado($estado) {
        $this->estado = seg($estado);
    }

    
    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = seg($status);
    }

    
    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }

}
$objCaravana = new Caravana();
?>