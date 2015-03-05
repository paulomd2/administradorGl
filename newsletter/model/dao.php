<?php
class NewsDAO extends Banco{
    public function listaEmail($count = NULL){
        $conexao = $this->abreConexao();
        if($count != ''){
            $count = 'LIMIT '.$count;
        }
        
        $sql = "SELECT *, DATE_FORMAT(dataCadastro, '%d/%m/%Y') as dataCadastro FROM ".TBL_NEWS." ".$count;
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        
        $this->fechaConexao();
    }
    
    public function numNews(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT COUNT(*) AS quantidade FROM ".TBL_NEWS;
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        
        return $linha['quantidade'];
        
        $this->fechaConexao();
    }
}

$objNewsDao = new NewsDAO();