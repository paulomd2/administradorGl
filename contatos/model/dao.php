<?php
require_once 'email.php';

class ContatoDAO extends Banco {

    public function cadEmail($objEmail) {
        $conexao = $this->abreConexao();

       echo $sql = "INSERT INTO " . TBL_EMAIL . " SET
               nome = '" . $objEmail->getNome() . "',
               email = '" . $objEmail->getEmail() . "',
               indPrincipal = '" . $objEmail->getPrincipal() . "',
               dataCadastro = '" . $objEmail->getDataCadastro() . "'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altEmail($objEmail) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_EMAIL . " SET
               nome = '" . $objEmail->getNome() . "',
               email = '" . $objEmail->getEmail() . "'
                   WHERE idEmail = " . $objEmail->getIdEmail() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delEmail($objEmail) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_EMAIL . " 
                SET status = 0
                WHERE idEmail = " . $objEmail->getIdNoticia();

        $conexao->query($sql);

        $this->fechaConexao();
    }
    
    public function verEmails() {
        $conexao = $this->abreConexao();
        
        $sql = "SELECT *
                FROM " . TBL_EMAIL . "
                    WHERE status = 1
                ";

        $banco = $conexao->query($sql);
        
        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }
    
    public function verEmail1($objEmail){
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                FROM " . TBL_EMAIL . "
                    WHERE idEmail = ".$objEmail->getIdEmail()."
                ";

        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }
    
    public function setaPrincipal($objEmail){
        $conexao = $this->abreConexao();
        
        //define o email escolhido como principal
        $sql1 = "UPDATE ".TBL_EMAIL." SET
                indPrincipal = 1
                    WHERE idEmail = ".$objEmail->getIdEmail()."
               ";
        
        $conexao->query($sql1);
        
        
        //define os outros emails como secundários
        $sql2 = "UPDATE ".TBL_EMAIL." SET
                indPrincipal = 0
                    WHERE idEmail != ".$objEmail->getIdEmail()."
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }

}

$objContatoDao= new ContatoDAO();