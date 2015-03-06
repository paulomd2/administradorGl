<?php
require_once "constantes.php";

class Banco {

    private $host = CON_ADMIN_HOST;
    private $user = CON_ADMIN_USER;
    private $pass = CON_ADMIN_PASS;
    private $base = CON_ADMIN_BASE;
    private $Conn;

    public function abreConexao() {
        $this->Conn = new mysqli($this->host, $this->user, $this->pass, $this->base);
        
        return $this->Conn;
    }

    public function fechaConexao() {
        mysqli_close ($this->Conn);
    }

}

class Log extends Banco{
    public function log($idUsuario, $acao, $modulo, $idModulo, $dataCadastro){
        $conexao = $this->abreConexao();
        
        $sql = "
                INSERT INTO ".TBL_LOG." SET
                idUsuario = ".$idUsuario.",
                idModulo = ".$idModulo.",
                acao = '".$acao."',
                modulo = ".$modulo.",
                dataCadastro = '".$dataCadastro."'
               ";
        
        $conexao->query($sql) or die("Erro nos logs ".$conexao->error);
    }
}