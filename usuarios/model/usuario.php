<?php
class Usuario{
    private $idUsuario;
    private $nome;
    private $nivel;
    private $status;
    private $dataCriacao;
    private $email;
    private $usuario;
    private $senha;
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = seg($idUsuario);
    }
    
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = seg($nome);
    }
        
    
    public function getNivel(){
        return $this->nivel;
    }
    public function setNivel($nivel){
        $this->nivel = seg($nivel);
    }
    
            
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = seg($status);
    }
    
       
    public function getDataCriacao(){
        return $this->dataCriacao;
    }
    public function setDataCriacao($dataCriacao){
        $this->dataCriacao = seg($dataCriacao);
    }
    
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = seg($email);
    }
    
    
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = seg($usuario);
    }
    
    
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = seg($senha);
    }
}

$objUsuario = new Usuario();