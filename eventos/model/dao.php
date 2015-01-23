<?php

require_once 'evento.php';

class EventosDAO extends Banco {

    public function cadEvento($objEvento) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_EVENTOS . " SET
                nome = '" . $objEvento->getNome() . "',
                titulo = '" . $objEvento->getTitulo() . "',
                dataInicio = '" . $objEvento->getDataInicio() . "',
                dataFim = '" . $objEvento->getDataFim() . "',
                imagem = '" . $objEvento->getImagem() . "',
                texto = '" . $objEvento->getTexto() . "',
                tituloMetaTag = '" . $objEvento->getTituloMetaTag() . "',
                keywordsMetaTag = '" . $objEvento->getKeywordsMetaTag() . "',
                descricaoMetaTag = '" . $objEvento->getDescricaoMetaTag() . "',
                dataCadastro = '" . $objEvento->getDataCadastro() . "'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaEvento1($objEvento) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                        FROM " . TBL_EVENTOS . "
                            WHERE idEvento = " . $objEvento->getIdEvento();

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();
        return $linha;

        $this->fechaConexao();
    }

    public function altEvento($objEvento) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_EVENTOS . " SET
                nome = '" . $objEvento->getNome() . "',
                titulo = '" . $objEvento->getTitulo() . "',
                dataInicio = '" . $objEvento->getDataInicio() . "',
                dataFim = '" . $objEvento->getDataFim() . "',
                imagem = '" . $objEvento->getImagem() . "',
                texto = '" . $objEvento->getTexto() . "',
                tituloMetaTag = '" . $objEvento->getTituloMetaTag() . "',
                keywordsMetaTag = '" . $objEvento->getKeywordsMetaTag() . "',
                descricaoMetaTag = '" . $objEvento->getDescricaoMetaTag() . "',
                dataCadastro = '" . $objEvento->getDataCadastro() . "'
                    WHERE idEvento = " . $objEvento->getIdEvento();

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function verEventos($count) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT *,
                DATE_FORMAT(dataInicio, '%d/%m/%Y') as dataInicio,
                DATE_FORMAT(dataFim, '%d/%m/%Y') as dataFim,
                DATE_FORMAT(dataCadastro, '%d/%m/%Y') as dataCadastro
                    FROM ".TBL_EVENTOS."
                        WHERE status = 1
                        ORDER BY dataInicio DESC, dataFim DESC
                        LIMIT ".$count."
               ";

        
        $banco = $conexao->query($sql);
        
        $linhas[] = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }

        
        return $linhas;
        $this->fechaConexao();
    }
    
    public function delEvento($objEvento){
        $conexao = $this->abreConexao();
        
       $sql = "UPDATE ".TBL_EVENTOS." SET status = 0 WHERE idEvento = ".$objEvento->getIdEvento();
        
        $conexao->query($sql);
    }

}

$objEventoDao = new EventosDAO();
