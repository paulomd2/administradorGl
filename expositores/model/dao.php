<?php

require_once 'expositor.php';

class ExpositoresDAO extends Banco {

    public function listaExpositores($count) {
        $conexao = $this->abreConexao();

       $sql = "SELECT *
                FROM " . TBL_EXPOSITORES . "
                    WHERE status != 0
                    LIMIT " . $count . "
                ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

    public function listaExpositor1($objExpositor) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                FROM " . TBL_EXPOSITORES . "
                    WHERE idExpositor = " . $objExpositor->getIdExpositor() . "
                ";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;
        
        $this->fechaConexao();
    }
    
    
    public function cadExpositor($objExpositor) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_EXPOSITORES . " SET
                nome = '".$objExpositor->getNome()."',
                link = '".$objExpositor->getLink()."',
                estande = '".$objExpositor->getEstande()."',
                dataCadastro = '".$objExpositor->getDataCadastro()."',
                dataPublicacao = '".$objExpositor->getDataPublicacao()."',
                imagem = '".$objExpositor->getImagem()."'
                ";

        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function altExpositor($objExpositor) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_EXPOSITORES . " SET
                nome = '".$objExpositor->getNome()."',
                link = '".$objExpositor->getLink()."',
                estande = '".$objExpositor->getEstande()."',
                dataCadastro = '".$objExpositor->getDataCadastro()."',
                dataPublicacao = '".$objExpositor->getDataPublicacao()."',
                imagem = '".$objExpositor->getImagem()."'
                    WHERE idExpositor = ".$objExpositor->getIdExpositor()."
                ";

        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function delExpositor($objExpositor) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_EXPOSITORES . " SET
                status = 0
                    WHERE idExpositor = ".$objExpositor->getIdExpositor()."
                ";

        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function ordenaExpositor($listingCounter, $recordIDValue){
        $conexao = $this->abreConexao();
        
        $query = "
                    UPDATE ".TBL_BANNER."
                    SET ordem = " . $listingCounter . "
                    WHERE idBanner = " . $recordIDValue;
        
        
        $conexao->query($query);        
        $this->fechaConexao();
    }
    
    
    public function busca($objExpositor) {
        $conexao = $this->abreConexao();

       $sql = "SELECT *
                FROM " . TBL_EXPOSITORES . "
                    WHERE status != 0
                    AND nome LIKE '%".$objExpositor->getNome()."%'
                ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
        $this->fechaConexao();
    }

}

$objExpositorDao = new ExpositoresDAO();
