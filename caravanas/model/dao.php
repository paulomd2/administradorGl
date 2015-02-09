<?php

include_once 'texto.php';
include_once 'caravana.php';

class CaravanasDAO extends Banco {

    public function listaTexto() {
        $conexao = $this->abreConexao();

        $sql = "SELECT * FROM " . TBL_TEXTO_CARAVANA;

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

    public function cadTexto($objTexto) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_TEXTO_CARAVANA . " SET
                texto = '" . $objTexto->getTexto() . "'
                ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altTexto($objTexto) {
        $conexao = $this->abreConexao();

        echo $sql = "UPDATE " . TBL_TEXTO_CARAVANA . " SET
                texto = '" . $objTexto->getTexto() . "'
                ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaCaravanas($count) {
        $conexao = $this->abreConexao();

        echo $sql = "
                SELECT * FROM " . TBL_CARAVANA . " WHERE status = 1 LIMIT ".$count."
               ";
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        
        $this->fechaConexao();
    }

    public function cadCaravana($objCaravana) {
        $conexao = $this->abreConexao();
      echo  $sql = 'INSERT INTO ' . TBL_CARAVANA . ' SET
                nome = "' . $objCaravana->getNome() . '", 
                responsavel = "' . $objCaravana->getResponsavel() . '", 
                email = "' . $objCaravana->getEmail() . '", 
                telefone = "' . $objCaravana->getTelefone() . '", 
                celular = "' . $objCaravana->getCelular() . '", 
                local = "' . $objCaravana->getLocal() . '", 
                cidade = "' . $objCaravana->getCidade() . '", 
                estado = "' . $objCaravana->getEstado() . '", 
                status = ' . $objCaravana->getStatus() . ', 
                dataCadastro = "' . $objCaravana->getDataCadastro() . '"
                ';
        $conexao->query($sql)or die($conexao->error);
        
        $this->fechaConexao();
    }
    
    public function altCaravana($objCaravana) {
        $conexao = $this->abreConexao();
      echo  $sql = 'UPDATE ' . TBL_CARAVANA . ' SET
                nome = "' . $objCaravana->getNome() . '", 
                responsavel = "' . $objCaravana->getResponsavel() . '", 
                email = "' . $objCaravana->getEmail() . '", 
                telefone = "' . $objCaravana->getTelefone() . '", 
                celular = "' . $objCaravana->getCelular() . '", 
                local = "' . $objCaravana->getLocal() . '", 
                cidade = "' . $objCaravana->getCidade() . '", 
                estado = "' . $objCaravana->getEstado() . '"
                    WHERE idCaravana = '.$objCaravana->getIdCaravana().'
                ';
        $conexao->query($sql)or die($conexao->error);
        
        $this->fechaConexao();
    }
    
    
    public function listaCaravana1($objCaravana){
        $conexao = $this->abreConexao();

        $sql = "
                SELECT * FROM " . TBL_CARAVANA . " WHERE idCaravana = ".$objCaravana->getIdCaravana();
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        
        return $linha;
        $this->fechaConexao();
    }
    
    public function delCaravana($objCaravana){
        $conexao = $this->abreConexao();

        $sql = "
                UPDATE " . TBL_CARAVANA . " set STATUS = 0 WHERE idCaravana = ".$objCaravana->getIdCaravana();
        
        $banco = $conexao->query($sql);
        
        $this->fechaConexao();
    }

}

$objCaravanaDao = new CaravanasDAO();
