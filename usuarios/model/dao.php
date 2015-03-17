<?php

require_once 'usuario.php';

class UsuariosDAO extends Banco {

    public function cadUsuario($objUsuario) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_USUARIO . " SET
               nome = '" . $objUsuario->getNome() . "',
               email = '" . $objUsuario->getEmail() . "',
               usuario = '" . $objUsuario->getUsuario() . "',
               senha = '" . $objUsuario->getSenha() . "',
               nivel = " . $objUsuario->getNivel() . ",
               dataCriacao = '" . $objUsuario->getDataCriacao() . "',
               status = ".$objUsuario->getStatus() ."
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function verUsuarios($count) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *,
                CASE nivel WHEN 1 THEN 'Administrador' WHEN 2 THEN 'Editor' WHEN 3 THEN 'Blog' END AS nivel
                    FROM " . TBL_USUARIO."
                        WHERE status != 0
                        LIMIT ".$count;

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
    }

    public function verUsuario1($objUsuario) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                    FROM " . TBL_USUARIO . "
                        WHERE idUsuario = " . $objUsuario->getIdUsuario();

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;
    }

    public function altUsuario($objUsuario) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_USUARIO . " SET
               nome = '" . $objUsuario->getNome() . "',
               email = '" . $objUsuario->getEmail() . "',
               usuario = '" . $objUsuario->getUsuario() . "',
               senha = '" . $objUsuario->getSenha() . "',
               nivel = " . $objUsuario->getNivel() . ",
               status = ".$objUsuario->getStatus() ."
                   WHERE idUsuario = " . $objUsuario->getIdUsuario() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delUsuario($objUsuario) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_USUARIO . "
                SET status = 0
                WHERE idUsuario = " . $objUsuario->getIdUsuario();

        $conexao->query($sql);

        $this->fechaConexao();
    }
    
    public function verificaLogin($objUsuario){
        
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                FROM " . TBL_USUARIO . "
                    WHERE usuario = '" .$objUsuario->getUsuario()."'
                    AND senha = '".$objUsuario->getSenha()."'
                    AND status != 0
                ";

        $banco = $conexao->query($sql);
        
        $numLinha = $banco->num_rows;
        
        if($numLinha == 0){
            $resposta = 0;
        }else{
            $linha = $banco->fetch_assoc();
            $resposta = $linha;
        }
        
        return $resposta;

        $this->fechaConexao();
        
    }
    
    public function verificaEmail($objUsuario){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_USUARIO." WHERE email = '".$objUsuario->getEmail()."'";
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->num_rows;
        return $linha;
        
        $this->fechaConexao();
    }
    
    
    public function verificaUsuario($objUsuario){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_USUARIO." WHERE usuario = '".$objUsuario->getUsuario()."'";
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->num_rows;
        return $linha;
        
        $this->fechaConexao();
    }

}

$objUsuarioDao = new UsuariosDAO();
