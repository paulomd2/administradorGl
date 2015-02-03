<?php

require_once 'categoria.php';

class CategoriasDAO extends Banco {

    public function cadCategoria($objCategoria) {
        $conexao = $this->abreConexao();

        $sql = 'INSERT INTO ' . TBL_CATEGORIA_RODAPE . ' SET
                    nome = "' . $objCategoria->getNome() . '", 
                    identificador = "' . $objCategoria->getIdentificador() . '", 
                    status = "' . $objCategoria->getStatus() . '",
                    dataCadastro = "'.$objCategoria->getDataCadastro().'"';

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altCategoria($objCategoria) {
        $conexao = $this->abreConexao();

        $sql = 'UPDATE ' . TBL_CATEGORIA_RODAPE . ' SET
                    nome = "' . $objCategoria->getNome() . '", 
                    identificador = ' . $objCategoria->getIdentificador() . ', 
                    status = ' . $objCategoria->getStatus() . ',
                        WHERE idCategoria = '.$objCategoria->getIdCategoria();
        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delCategoria($objCategoria) {
        $conexao = $this->abreConexao();

        $sql = 'UPDATE FROM ' . TBL_CATEGORIA_RODAPE . ' SET status = 0 WHERE idCategoria = ' . $objCategoria->getIdCategoria();
        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaCategoria1($objCategoria) {
        $conexao = $this->abreConexao();

        $sql = 'SELECT * FROM' . TBL_CATEGORIA_RODAPE . 'WHERE idCategoria = "' . $objCategoria->getIdCategoria() . '"';
        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();
        return $linha;

        $this->fechaConexao();
    }

    public function listaCategoria($count) {
        $conexao = $this->abreConexao();

        $sql = 'SELECT * FROM' . TBL_CATEGORIA_RODAPE . 'WHERE status != 0 ORDER BY ordem DESC LIMIT ' . $count;
        $banco = $conexao->query($sql);

        $linhas = array();

        while ($linha = $banco->fetch_array()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function OdernaCategoria($listingCounter, $recordIDValue) {
        $conexao = $this->abreConexao();

        $query = "
                    UPDATE " . TBL_CATEGORIA_RODAPE . "
                    SET ordem = " . $listingCounter . "
                    WHERE idBanner = " . $recordIDValue;


        $conexao->query($query);
        $this->fechaConexao();
    }

}

$objCategoriasDao = new CategoriasDAO();
?>