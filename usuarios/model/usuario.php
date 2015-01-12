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
        $this->idUsuario = $idUsuario;
    }
    
    
    public function getNome(){
        return $this->nome;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
        
    
    public function getNivel(){
        return $this->nivel;
    }
    
    public function setNivel($nivel){
        $this->nivel = $nivel;
    }
    
            
    public function getStatus(){
        return $this->status;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
    
       
    public function getDataCriacao(){
        return $this->dataCriacao;
    }
    
    public function setDataCriacao($dataCriacao){
        $this->dataCriacao = $dataCriacao;
    }
    
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    
    
    public function getSenha(){
        return $this->senha;
    }
    
    public function setSenha($senha){
        $this->senha = md5($senha);
    }
}

$objUsuario = new Usuario();