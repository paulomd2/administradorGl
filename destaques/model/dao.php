<?php

require_once 'destaque.php';

class DestaquesDAO extends Banco {

    public function cadDestaque($objDestaque) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_DESTAQUE . " SET
               titulo = '" . $objDestaque->getTitulo() . "',
               subtitulo = '" . $objDestaque->getSubtitulo() . "',
               conteudo = '" . $objDestaque->getConteudo() . "',
               dataPublicacao = '" . $objDestaque->getDataPublicacao() . "',
               dataCadastro = '" . $objDestaque->getDataCadastro() . "',
               dataSaida = '" . $objDestaque->getDataSaida() . "',
               imagem = '" . $objDestaque->getImagem() . "',
               mercado = " . $objDestaque->getMercado() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altDestaque($objDestaque) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_DESTAQUE . " SET
               titulo = '" . $objDestaque->getTitulo() . "',
               subtitulo = '" . $objDestaque->getSubtitulo() . "',
               fonte = '" . $objDestaque->getFonte() . "',
               dataPublicacao = '" . $objDestaque->getDataPublicacao() . "',
               texto = '" . $objDestaque->getTexto() . "',
               dataCadastro = '" . $objDestaque->getDataCadastro() . "',
               mercado = " . $objDestaque->getMercado() . "
                   WHERE idDestaque = " . $objDestaque->getIdDestaque() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delDestaque($objDestaque) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_DESTAQUE . " 
                SET status = 0
                WHERE idDestaque = " . $objDestaque->getIdDestaque();

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function verDestaques($count) {
        $conexao = $this->abreConexao();

        $sql = "SELECT idDestaque, titulo, subTitulo, fonte, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacao, texto
                FROM " . TBL_DESTAQUE . "
                    WHERE status = 1
                        ORDER BY dataPublicacao DESC
                        LIMIT " . $count . "
                ";

        $banco = $conexao->query($sql);

        $linhas[] = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function verDestaque1($objDestaque) {
        $conexao = $this->abreConexao();

        $sql = "SELECT idDestaque, titulo, subTitulo, fonte, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacao, texto, mercado
                FROM " . TBL_DESTAQUE . "
                    WHERE idDestaque = " . $objDestaque->getIdDestaque() . "
                        ORDER BY dataPublicacao DESC
                ";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

}

$objDestaquesDao = new DestaquesDAO();
