<?php

require_once 'categoria.php';
require_once 'imagem.php';

class CategoriasDAO extends Banco {

    public function cadCategoria($objCategoria) {
        $conexao = $this->abreConexao();

        $sql = 'INSERT INTO ' . TBL_CATEGORIA_RODAPE . ' SET
                    nome = "' . $objCategoria->getNome() . '",
                    status = "' . $objCategoria->getStatus() . '",
                    dataCadastro = "' . $objCategoria->getDataCadastro() . '"';

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altCategoria($objCategoria) {
        $conexao = $this->abreConexao();

        $sql = 'UPDATE ' . TBL_CATEGORIA_RODAPE . ' SET
                    nome = "' . $objCategoria->getNome() . '"
                    /*identificador = ' . $objCategoria->getIdentificador() . '*/
                        WHERE idCategoria = ' . $objCategoria->getIdCategoria();
        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delCategoria($objCategoria) {
        $conexao = $this->abreConexao();

        $sql = 'UPDATE ' . TBL_CATEGORIA_RODAPE . '
                SET
                status = 0
                    WHERE idCategoria = ' . $objCategoria->getIdCategoria();
        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaCategoria1($objCategoria) {
        $conexao = $this->abreConexao();

        $sql = 'SELECT *
                FROM' . TBL_CATEGORIA_RODAPE . '
                    WHERE idCategoria = ' . $objCategoria->getIdCategoria();
        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();
        return $linha;

        $this->fechaConexao();
    }

    public function listaCategoria($count) {
        $conexao = $this->abreConexao();

        $sql = 'SELECT *
                    FROM' . TBL_CATEGORIA_RODAPE . '
                        WHERE status != 0 ORDER BY ordem DESC LIMIT ' . $count;
        $banco = $conexao->query($sql);

        $linhas = array();

        while ($linha = $banco->fetch_assoc()) {
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
    
    
    public function listaImagens($objImagem){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_IMAGEM_RODAPE." WHERE idCategoria = ".$objImagem->getIdCategoria()." AND status = 1";
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        
        $this->fechaConexao();
    }
    
    public function listaImagem1($objImagem){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_IMAGEM_RODAPE." WHERE idImagem = ".$objImagem->getIdImagem();
        
        $banco = $conexao->query($sql);
        
        
        $linha = $banco->fetch_assoc();
        
        return $linha;
        
        $this->fechaConexao();
    }
    
    
    public function cadImagem($objImagem){
        $conexao = $this->abreConexao();
        
        $sql = "INSERT INTO ".TBL_IMAGEM_RODAPE."
                SET
                idCategoria = ".$objImagem->getIdCategoria().",
                nome = '".$objImagem->getNome()."',
                imagem = '".$objImagem->getImagem()."',
                link = '".$objImagem->getLink()."',
                dataCadastro = '".$objImagem->getDataCadastro()."',
                status = ".$objImagem->getStatus()."
               ";
        $conexao->query($sql) or die($conexao->error." ".$sql);
        
        $this->fechaConexao();
    }
    
    
    public function altImagem($objImagem){
        $conexao = $this->abreConexao();
        
        $sql = "UPDATE ".TBL_IMAGEM_RODAPE."
                SET
                idCategoria = ".$objImagem->getIdCategoria().",
                nome = '".$objImagem->getNome()."',
                imagem = '".$objImagem->getImagem()."',
                link = '".$objImagem->getLink()."',
                dataCadastro = '".$objImagem->getDataCadastro()."',
                status = ".$objImagem->getStatus()."
                    WHERE idImagem = ".$objImagem->getIdImagem()."
               ";
        $conexao->query($sql) or die($conexao->error." ".$sql);
        
        $this->fechaConexao();
    }
    
    public function listaCategoriasImagens($objImagem) {
        $conexao = $this->abreConexao();

        $sql = "
                    SELECT rc.*, count(*) as quantidade
                        FROM ".TBL_CATEGORIA_RODAPE." rc
                        JOIN ".TBL_IMAGEM_RODAPE." ri ON rc.idCategoria = ri.idCategoria
                            WHERE rc.idCategoria = ".$objImagem->getIdCategoria();
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        
        return $linha;
        
        $this->fechaConexao();
    }
    
    
    public function delImagem($objImagem){
        $conexao = $this->abreConexao();
        
     echo   $sql = "
                UPDATE ".TBL_IMAGEM_RODAPE." SET
                status = 0
                    WHERE idImagem = ".$objImagem->getIdImagem()."
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }

}

$objRodapeDao = new CategoriasDAO();
?>