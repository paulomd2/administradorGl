<?php
class NewsDAO extends Banco{
    public function listaEmail(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_NEWS;
        
        $banco = $conexao->query($sql);
        
        $linhas[] = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        
        $this->fechaConexao();
    }
}

$objNewsDao = new NewsDAO();