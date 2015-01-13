<?php

require_once 'usuario.php';

class UsuariosDAO extends Banco {

    public function cadUsuario($objUsuario) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_USUARIOS . " SET
               nome = '" . $objUsuario->getNome() . "',
               email = '" . $objUsuario->getEmail() . "',
               usuario = '" . $objUsuario->getUsuario() . "',
               senha = '" . $objUsuario->getSenha() . "',
               nivel = " . $objUsuario->getNivel() . ",
               dataCriacao = '" . $objUsuario->getDataCriacao() . "'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function verUsuarios() {
        $conexao = $this->abreConexao();

        $sql = "SELECT idUsuario, nome, nivel, DATE_FORMAT(dataCriacao, '%d/%m/%Y %H:%I:%s') as dataCriacao, email, usuario,
                CASE nivel WHEN 1 THEN 'Administrador' ELSE 'Editor' END AS nivel,
                CASE status WHEN 0 THEN 'Inativo' ELSE 'Ativo' END AS status
                    FROM " . TBL_USUARIOS;

        $banco = $conexao->query($sql);

        $linhas[] = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
    }

    public function verUsuario1($objUsuario) {
        $conexao = $this->abreConexao();

        $sql = "SELECT nome, nivel, email, usuario, senha, nivel
                    FROM " . TBL_USUARIOS . "
                        WHERE idUsuario = " . $objUsuario->getIdUsuario();

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;
    }

    public function altUsuario($objUsuario) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_USUARIOS . " SET
               nome = '" . $objUsuario->getNome() . "',
               email = '" . $objUsuario->getEmail() . "',
               usuario = '" . $objUsuario->getUsuario() . "',
               senha = '" . $objUsuario->getSenha() . "',
               nivel = " . $objUsuario->getNivel() . ",
               dataCriacao = '" . $objUsuario->getDataCriacao() . "'
                   WHERE idUsuario = " . $objUsuario->getIdUsuario() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delUsuario($objUsuario) {
        $conexao = $this->abreConexao();

        $sql = "DELETE FROM " . TBL_USUARIOS . " WHERE idUsuario = " . $objUsuario->getIdUsuario();

        $conexao->query($sql);

        $this->fechaConexao();
    }
    
    public function verificaLogin($objUsuario){
        
        $conexao = $this->abreConexao();

        $sql = "SELECT idUsuario
                FROM " . TBL_USUARIOS . "
                    WHERE usuario = '" .$objUsuario->getUsuario()."'
                    AND senha = '".$objUsuario->getSenha()."'";

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

}

$objUsuarioDao = new UsuariosDAO();
