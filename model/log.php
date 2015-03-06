<?php

class Log extends Banco{
    public function cadLog($idUsuario, $acao, $modulo, $idModulo, $dataCadastro){
        $conexao = $this->abreConexao();
        
        $sql = "
                INSERT INTO ".TBL_LOG." SET
                idUsuario = ".$idUsuario.",
                idModulo = ".$idModulo.",
                acao = '".$acao."',
                modulo = '".$modulo."',
                dataCadastro = '".$dataCadastro."'
               ";
        
        $conexao->query($sql) or die("Erro nos logs ".$conexao->error);
    }
}

$objLogDao = new Log();