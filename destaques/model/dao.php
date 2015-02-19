<?php

require_once 'destaque.php';

class DestaquesDAO extends Banco {

    public function cadDestaque($objDestaque) {
        $conexao = $this->abreConexao();

        echo $sql = "INSERT INTO " . TBL_DESTAQUE . " SET
               titulo = '" . $objDestaque->getTitulo() . "',
               subtitulo = '" . $objDestaque->getSubtitulo() . "',
               link = '" . $objDestaque->getLink() . "',
               conteudo = '" . $objDestaque->getConteudo() . "',
               dataPublicacao = '" . $objDestaque->getDataPublicacao() . "',
               dataCadastro = '" . $objDestaque->getDataCadastro() . "',
               dataSaida = '" . $objDestaque->getDataSaida() . "',
               status = " . $objDestaque->getStatus() . ",
               imagem = '" . $objDestaque->getImagem() . "'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altDestaque($objDestaque) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_DESTAQUE . " SET
               titulo = '" . $objDestaque->getTitulo() . "',
               subtitulo = '" . $objDestaque->getSubtitulo() . "',
               link = '" . $objDestaque->getLink() . "',
               conteudo = '" . $objDestaque->getConteudo() . "',
               dataPublicacao = '" . $objDestaque->getDataPublicacao() . "',
               dataSaida = '" . $objDestaque->getDataSaida() . "',
               imagem = '" . $objDestaque->getImagem() . "'
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

        $sql = "SELECT *, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacao
                FROM " . TBL_DESTAQUE . "
                    WHERE status = 1
                        ORDER BY ordem
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

    public function verDestaquesHome($count) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *, DATE_FORMAT(dataPublicacao, '%d/%m/%Y') as dataPublicacao
                FROM " . TBL_DESTAQUE . "
                    WHERE status = 1
                        ORDER BY idDestaque DESC
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

        $sql = "SELECT *
                FROM " . TBL_DESTAQUE . "
                    WHERE idDestaque = " . $objDestaque->getIdDestaque() . "
                        ORDER BY dataPublicacao DESC
                ";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

    public function ordenaDestaque($listingCounter, $recordIDValue) {
        $conexao = $this->abreConexao();

        $query = "
                    UPDATE " . TBL_DESTAQUE . "
                    SET ordem = " . $listingCounter . "
                    WHERE idDestaque = " . $recordIDValue;


        $conexao->query($query);
        $this->fechaConexao();
    }

}

$objDestaqueDao = new DestaquesDAO();
