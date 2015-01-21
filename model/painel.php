<?php

class PainelDAO extends Banco{
    public function listaConteudo() {
        $conexao = $this->abreConexao();
        
        $this->fechaConexao();
    }
}
$objPainelDao = new PainelDAO();