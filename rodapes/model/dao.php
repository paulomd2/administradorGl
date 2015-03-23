<?php

require_once 'categoria.php';
require_once 'imagem.php';

class CategoriasDAO extends Banco {

    public function cadCategoria($objCategoria) {
        $conexao = $this->abreConexao();

        $sql = 'INSERT INTO ' . TBL_CATEGORIA_RODAPE . ' SET
                    nome = "' . $objCategoria->getNome() . '",
                    status = "' . $objCategoria->getStatus() . '",
                    dataCadastro = "' . $objCategoria->getDataCadastro() . '",
                    lingua = "'.$objCategoria->getLingua().'"
                ';

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altCategoria($objCategoria) {
        $conexao = $this->abreConexao();

        $sql = 'UPDATE ' . TBL_CATEGORIA_RODAPE . ' SET
                    nome = "' . $objCategoria->getNome() . '",
                    status = '.$objCategoria->getStatus().',
                    lingua = "'.$objCategoria->getLingua().'"
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

    public function listaCategoria($count, $lingua) {
        $conexao = $this->abreConexao();

        $sql = 'SELECT *
                    FROM' . TBL_CATEGORIA_RODAPE . '
                        WHERE status != 0
                        AND lingua = "'.$lingua.'"
                        ORDER BY ordem DESC LIMIT ' . $count;
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
        
        $sql = "SELECT * FROM ".TBL_IMAGEM_RODAPE." WHERE idCategoria = ".$objImagem->getIdCategoria()." AND status != 0 ORDER BY ordem";
        
        
        
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
    
    public function delImagem($objImagem){
        $conexao = $this->abreConexao();
        
        $sql = "
                UPDATE ".TBL_IMAGEM_RODAPE." SET
                status = 0
                    WHERE idImagem = ".$objImagem->getIdImagem()."
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function ordenaImagem($listingCounter, $recordIDValue){
        $conexao = $this->abreConexao();
        
        echo $sql = "
                UPDATE ".TBL_IMAGEM_RODAPE." SET
                ordem = ".$listingCounter."
                    WHERE idImagem = ".$recordIDValue.";
               ";
        
        $conexao->query($sql) or die($conexao->error);
        
        $this->fechaConexao();
    }

}

$objRodapeDao = new CategoriasDAO();
?>