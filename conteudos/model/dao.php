<?php

require_once 'menu.php';
require_once 'submenu.php';

class ConteudoDAO extends Banco {

    public function cadMenu($objMenu) {
        $conexao = $this->abreConexao();

       echo $sql = "
                INSERT INTO " . TBL_MENU . " SET
                titulo = '" . $objMenu->getTitulo() . "',
                link = '" . $objMenu->getLink() . "'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaMenus() {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT * FROM " . TBL_MENU . " WHERE status = 1
               ";

        $banco = $conexao->query($sql);
        
        $linhas[] = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;

        $this->fechaConexao();
    }
    
    
    public function listaMenu1($objMenu){
        $conexao = $this->abreConexao();
        
        $sql = "
                SELECT * FROM " . TBL_MENU . " WHERE status = 1
               ";

        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        
        return $linha;
        
        $this->fechaConexao();
    }
    
    
    public function altMenu($objMenu){
        $conexao = $this->abreConexao();
        
        $sql = " 
                UPDATE ".TBL_MENU." SET
                titulo = '".$objMenu->getTitulo()."',
                link = '".$objMenu->getLink()."'
                   WHERE idMenu = ".$objMenu->getIdMenu()."
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function delMenu($objMenu){
        $conexao = $this->abreConexao();
        
        $sql = " 
                UPDATE ".TBL_MENU." SET
                status = 0
                   WHERE idMenu = ".$objMenu->getIdMenu()."
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }

}

$objMenuDao = new ConteudoDAO();
