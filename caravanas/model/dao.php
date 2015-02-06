<?php

@include_once 'texto.php';

class CaravanasDAO extends Banco{
    public function listaTexto(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_TEXTO_CARAVANA;
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        
        return $linha;
        
        $this->fechaConexao();
    }
    
    public function cadTexto($objTexto){
        $conexao = $this->abreConexao();
        
        $sql = "INSERT INTO ".TBL_TEXTO_CARAVANA." SET
                texto = '".$objTexto->getTexto()."'
                ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    public function altTexto($objTexto){
        $conexao = $this->abreConexao();
        
        echo $sql = "UPDATE ".TBL_TEXTO_CARAVANA." SET
                texto = '".$objTexto->getTexto()."'
                ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
}

$objCaravanaDao = new CaravanasDAO();