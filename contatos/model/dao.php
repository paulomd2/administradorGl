<?php

require_once 'email.php';

class ContatoDAO extends Banco {

    public function cadEmail($objEmail) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_EMAIL . " SET
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
                WHERE idEmail = " . $objEmail->getIdEmail();

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

    public function verEmail1($objEmail) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                FROM " . TBL_EMAIL . "
                    WHERE idEmail = " . $objEmail->getIdEmail() . "
                ";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

    public function listaEmailPrincipal() {
        $conexao = $this->abreConexao();

        $sql = "SELECT * FROM " . TBL_EMAIL . " WHERE indPrincipal = 1 ";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;
    }

    public function setaPrincipal($objEmail) {
        $conexao = $this->abreConexao();

        //define o email escolhido como principal
        $sql1 = "UPDATE " . TBL_EMAIL . " SET
                indPrincipal = 1
                    WHERE idEmail = " . $objEmail->getIdEmail() . "
               ";

        $conexao->query($sql1);


        //define os outros emails como secundários
        $sql2 = "UPDATE " . TBL_EMAIL . " SET
                indPrincipal = 0
                    WHERE idEmail != " . $objEmail->getIdEmail() . "
               ";

        $conexao->query($sql2);

        $this->fechaConexao();
    }

    public function verContatos($filtro = NULL, $count = NULL) {
        $conexao = $this->abreConexao();
        
        if($filtro == 'mes'){
            $filtro = 'WHERE MONTH(dataEnvio) = MONTH(NOW())';
        }elseif ($filtro == 'mes') {
            $filtro = 'WHERE YEAR(dataEnvio) = YEAR(NOW())';
        }else{
            $filtro = '';
        }
        
        if($count != ''){
            $count = 'LIMIT '.$count;
        }
        
        $sql = "SELECT * FROM " . TBL_CONTATO." ".$filtro.' '.$count;

        $banco = $conexao->query($sql);
        $numRows = $banco->num_rows;
        
        $linhas = array();
        $linhas['quantidade'] = $numRows;
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }
    
    public function numContatos(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT COUNT(*) AS quantidade FROM ".TBL_CONTATO;
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        $this->fechaConexao();
        return $linha['quantidade'];
    }

    public function verContato1($id) {
        $conexao = $this->abreConexao();

        $sql = "SELECT * FROM " . TBL_CONTATO . " WHERE idEmail = " . $id;

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

    public function gravaResposta($objEmail) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_RESPOSTAS . " SET
                idContato = " . $objEmail->getIdContato() . ",
                idEmail = " . $objEmail->getIdEmail() . ",
                mensagem = '" . $objEmail->getMensagem() . "',
                dataResposta = '" . $objEmail->getDataCadastro() . "'
               ";
    }

}

$objContatoDao = new ContatoDAO();
