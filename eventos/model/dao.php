<?php

require_once 'evento.php';

class EventosDAO extends Banco {

    public function cadEvento($objEvento) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_EVENTO . " SET
                nome = '" . $objEvento->getNome() . "',
                titulo = '" . $objEvento->getTitulo() . "',
                dataInicio = '" . $objEvento->getDataInicio() . "',
                dataFim = '" . $objEvento->getDataFim() . "',
                imagem = '" . $objEvento->getImagem() . "',
                texto = '" . $objEvento->getTexto() . "',
                tituloMetaTag = '" . $objEvento->getTituloMetaTag() . "',
                keywordsMetaTag = '" . $objEvento->getKeywordsMetaTag() . "',
                descricaoMetaTag = '" . $objEvento->getDescricaoMetaTag() . "',
                dataCadastro = '" . $objEvento->getDataCadastro() . "',
                status = " . $objEvento->getStatus() . ",
                lingua = '" . $objEvento->getLingua() . "'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaEvento1($objEvento) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                    FROM " . TBL_EVENTO . "
                        WHERE idEvento = " . $objEvento->getIdEvento();

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();
        return $linha;

        $this->fechaConexao();
    }

    public function altEvento($objEvento) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_EVENTO . " SET
                nome = '" . $objEvento->getNome() . "',
                titulo = '" . $objEvento->getTitulo() . "',
                dataInicio = '" . $objEvento->getDataInicio() . "',
                dataFim = '" . $objEvento->getDataFim() . "',
                imagem = '" . $objEvento->getImagem() . "',
                texto = '" . $objEvento->getTexto() . "',
                tituloMetaTag = '" . $objEvento->getTituloMetaTag() . "',
                keywordsMetaTag = '" . $objEvento->getKeywordsMetaTag() . "',
                descricaoMetaTag = '" . $objEvento->getDescricaoMetaTag() . "',
                status = " . $objEvento->getStatus() . ",
                lingua = '" . $objEvento->getLingua() . "'
                    WHERE idEvento = " . $objEvento->getIdEvento();

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function verEventos($count, $lingua) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT *,
                DATE_FORMAT(dataInicio, '%d/%m/%Y') as dataInicio,
                DATE_FORMAT(dataFim, '%d/%m/%Y') as dataFim,
                DATE_FORMAT(dataCadastro, '%d/%m/%Y') as dataCadastro
                    FROM " . TBL_EVENTO . "
                        WHERE status !=0
                        AND lingua = '" . $lingua . "'
                        ORDER BY idEvento DESC
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

    public function numEventosProximo($lingua) {
        $conexao = $this->abreConexao();

        $sql = "SELECT COUNT(*) AS quantidade
                    FROM " . TBL_EVENTO . "
                        WHERE status != 0
                        AND lingua = '" . $lingua . "'
                        AND dataFim > NOW() ";
        
        $banco = $conexao->query($sql) or die($conexao->error);
        
        $linha = $banco->fetch_assoc();
        
        return $linha['quantidade'];
    }

    public function verEventosProximos($lingua, $count) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT *,
                DATE_FORMAT(dataInicio, '%d/%m/%Y') as dataInicio,
                DATE_FORMAT(dataFim, '%d/%m/%Y') as dataFim,
                DATE_FORMAT(dataCadastro, '%d/%m/%Y') as dataCadastro
                    FROM " . TBL_EVENTO . "
                        WHERE status != 0
                        AND lingua = '" . $lingua . "'
                        AND dataFim > NOW()
                        ORDER BY ordem
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

    public function verEventosAnteriores($lingua = 'pt',$count) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT *,
                DATE_FORMAT(dataInicio, '%d/%m/%Y') as dataInicio,
                DATE_FORMAT(dataFim, '%d/%m/%Y') as dataFim,
                DATE_FORMAT(dataCadastro, '%d/%m/%Y') as dataCadastro
                    FROM " . TBL_EVENTO . "
                        WHERE status != 0
                        AND lingua = '" . $lingua . "'
                        AND dataFim <= NOW()
                        ORDER BY dataInicio
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
    
    public function numEventosAnterior($lingua) {
        $conexao = $this->abreConexao();

        $sql = "SELECT COUNT(*) AS quantidade
                    FROM " . TBL_EVENTO . "
                        WHERE status != 0
                        AND lingua = '" . $lingua . "'
                        AND dataFim <= NOW() ";
        
        $banco = $conexao->query($sql) or die($conexao->error);
        
        $linha = $banco->fetch_assoc();
        
        return $linha['quantidade'];
    }

    public function delEvento($objEvento) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_EVENTO . " SET status = 0 WHERE idEvento = " . $objEvento->getIdEvento();

        $conexao->query($sql);
    }

    public function ordenaEventos($listingCounter, $recordIDValue) {
        $conexao = $this->abreConexao();

        echo $query = "
                    UPDATE " . TBL_EVENTO . "
                    SET ordem = " . $listingCounter . "
                    WHERE idEvento = " . $recordIDValue;


        $conexao->query($query)or die($conexao->error);
        $this->fechaConexao();
    }

    public function busca($objEvento) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT *,
                DATE_FORMAT(dataInicio, '%d/%m/%Y') as dataInicio,
                DATE_FORMAT(dataFim, '%d/%m/%Y') as dataFim,
                DATE_FORMAT(dataCadastro, '%d/%m/%Y') as dataCadastro
                    FROM " . TBL_EVENTO . "
                        WHERE status != 0
                        AND titulo like '%" . $objEvento->getTitulo() . "%'
                            ORDER BY dataInicio
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

$objEventoDao = new EventosDAO();
