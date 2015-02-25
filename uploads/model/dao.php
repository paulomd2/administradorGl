<?php
require_once 'upload.php';

class UploadDAO extends Banco{
    public function listaUploads(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_UPLOAD." WHERE status != 0";
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        while ($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        
        $this->fechaConexao();
    }
    
    public function listaPastas(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT distinct(pasta) FROM ".TBL_UPLOAD." WHERE status != 0";
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        while ($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        
        $this->fechaConexao();
    }
}

$objUploadDao = new UploadDAO();