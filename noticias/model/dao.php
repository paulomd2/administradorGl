<?php
require_once 'noticia.php';

class NoticiasDAO extends Banco {

    public function cadNoticia($objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_NOTICIAS . " SET
               titulo = '" . $objNoticia->getTitulo() . "',
               subtitulo = '" . $objNoticia->getSubTitulo() . "',
               fonte = '" . $objNoticia->getFonte() . "',
               dataPublicacao = '" . $objNoticia->getDataPublicacao() . "',
               texto = '" . $objNoticia->getTexto() . "',
               dataCadastro = '" . $objNoticia->getDataCadastro() . "',
               mercado = " . $objNoticia->getMercado() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altNoticia($objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_NOTICIAS . " SET
               titulo = '" . $objNoticia->getTitulo() . "',
               subtitulo = '" . $objNoticia->getSubTitulo() . "',
               fonte = '" . $objNoticia->getFonte() . "',
               dataPublicacao = '" . $objNoticia->getDataPublicacao() . "',
               texto = '" . $objNoticia->getTexto() . "',
               dataCadastro = '" . $objNoticia->getDataCadastro() . "',
               mercado = " . $objNoticia->getMercado() . "
                   WHERE idNoticia = " . $objNoticia->getIdNoticia() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delNoticia($objNoticia) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_NOTICIAS . " 
                SET status = 0
                WHERE idNoticia = " . $objNoticia->getIdNoticia();

        $conexao->query($sql);

        $this->fechaConexao();
    }
    
    public function verNoticias($count) {
        $conexao = $this->abreConexao();

        $sql = "SELECT idNoticia, titulo, subTitulo, fonte, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacao, texto
                FROM " . TBL_NOTICIAS . "
                    WHERE status = 1
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
    
    public function verNoticia1($objNoticia){
        $conexao = $this->abreConexao();

        $sql = "SELECT idNoticia, titulo, subTitulo, fonte, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacao, texto, mercado
                FROM " . TBL_NOTICIAS . "
                    WHERE idNoticia = ".$objNoticia->getIdNoticia()."
                        ORDER BY dataPublicacao DESC
                ";

        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

}

$objNoticiasDao = new NoticiasDAO();
