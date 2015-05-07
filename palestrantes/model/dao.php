<?php

require_once 'palestrante.php';

class PalestrantesDAO extends Banco {

    public function listaPalestrante($count) {
        $conexao = $this->abreConexao();

       $sql = "SELECT *
                FROM " . TBL_PALESTRANTES . "
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

    public function listaPalestrante1(Palestrante $objPalestrante) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                FROM " . TBL_PALESTRANTES . "
                    WHERE idExpositor = " . $objPalestrante->getIdExpositor() . "
                ";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;
        
        $this->fechaConexao();
    }
    
    
    public function cadPalestrante(Palestrante $objPalestrante) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_PALESTRANTES . " SET
                nome = '".$objPalestrante->getNome()."',
                link = '".$objPalestrante->getLink()."',
                estande = '".$objPalestrante->getEstande()."',
                dataCadastro = '".$objPalestrante->getDataCadastro()."',
                dataPublicacao = '".$objPalestrante->getDataPublicacao()."',
                imagem = '".$objPalestrante->getImagem()."',
                status = ".$objPalestrante->getStatus()."
                ";

        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function altPalestrante(Palestrante $objPalestrante) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_PALESTRANTES . " SET
                nome = '".$objPalestrante->getNome()."',
                link = '".$objPalestrante->getLink()."',
                estande = '".$objPalestrante->getEstande()."',
                dataCadastro = '".$objPalestrante->getDataCadastro()."',
                dataPublicacao = '".$objPalestrante->getDataPublicacao()."',
                imagem = '".$objPalestrante->getImagem()."',
                status = ".$objPalestrante->getStatus()."
                    WHERE idExpositor = ".$objPalestrante->getIdExpositor()."
                ";

        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function delPalestrante(Palestrante $objPalestrante) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_PALESTRANTES . " SET
                status = 0
                    WHERE idExpositor = ".$objPalestrante->getIdExpositor()."
                ";

        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    //    public function busca(Palestrante $objPalestrante) {
    //        $conexao = $this->abreConexao();
    //
    //       $sql = "SELECT *
    //                FROM " . TBL_PALESTRANTES . "
    //                    WHERE status != 0
    //                    AND nome LIKE '%".$objPalestrante->getNome()."%'
    //                ";
    //
    //        $banco = $conexao->query($sql);
    //
    //        $linhas = array();
    //        while ($linha = $banco->fetch_assoc()) {
    //            $linhas[] = $linha;
    //        }
    //
    //        return $linhas;
    //        $this->fechaConexao();
    //    }
}

$objPalestranteDao = new PalestrantesDAO();
