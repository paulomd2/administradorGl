<?php
require_once 'noticia.php';

class NoticiasDAO extends Banco {

    public function cadNoticia($objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_NOTICIA . " SET
               titulo = '" . $objNoticia->getTitulo() . "',
               subtitulo = '" . $objNoticia->getSubTitulo() . "',
               fonte = '" . $objNoticia->getFonte() . "',
               dataPublicacao = '" . $objNoticia->getDataPublicacao() . "',
               texto = '" . $objNoticia->getTexto() . "',
               dataCadastro = '" . $objNoticia->getDataCadastro() . "',
               mercado = " . $objNoticia->getMercado() . ",
               status = ".$objNoticia->getStatus()."
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altNoticia($objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_NOTICIA . " SET
               titulo = '" . $objNoticia->getTitulo() . "',
               subtitulo = '" . $objNoticia->getSubTitulo() . "',
               fonte = '" . $objNoticia->getFonte() . "',
               dataPublicacao = '" . $objNoticia->getDataPublicacao() . "',
               texto = '" . $objNoticia->getTexto() . "',
               mercado = " . $objNoticia->getMercado() . ",
               status = ".$objNoticia->getStatus()."
                   WHERE idNoticia = " . $objNoticia->getIdNoticia() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delNoticia($objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_NOTICIA . " 
                SET status = 0
                WHERE idNoticia = " . $objNoticia->getIdNoticia();

        $conexao->query($sql);

        $this->fechaConexao();
    }
    
    public function verNoticias($count) {
        $conexao = $this->abreConexao();

         $sql = "SELECT *, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacao
                FROM " . TBL_NOTICIA . "
                    WHERE status != 0
                        ORDER BY dataPublicacao DESC
                        LIMIT ".$count."
                ";

        $banco = $conexao->query($sql);
        
        $linhas[] = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }
    
    public function verNoticiasHome($count) {
        $conexao = $this->abreConexao();

         $sql = "SELECT *, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacao
                FROM " . TBL_NOTICIA . "
                    WHERE status = 1
                        ORDER BY idNoticia DESC
                        LIMIT ".$count."
                ";

        $banco = $conexao->query($sql);
        
        $linhas[] = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }
    
    public function verNoticia1($objNoticia){
        $conexao = $this->abreConexao();

        $sql = "SELECT *, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacaoFormatada
                FROM " . TBL_NOTICIA . "
                    WHERE idNoticia = ".$objNoticia->getIdNoticia()."
                        ORDER BY dataPublicacao DESC
                ";

        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }
    
    public function busca($objNoticia){
        $conexao = $this->abreConexao();
        
        $sql = "
                SELECT *
                    FROM ".TBL_NOTICIA."
                        WHERE titulo like '%".$objNoticia->getTitulo()."%'
                        AND status in(1,2)
               ";
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
    }

}

$objNoticiaDao = new NoticiasDAO();