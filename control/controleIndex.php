<?php
@session_start();
require_once '../model/banco.php';
require_once '../usuarios/model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao){
    case 'verificaLogin':
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        
        $objUsuario->setUsuario($usuario);
        $objUsuario->setSenha($senha);
        
        $retorno = $objUsuarioDao->verificaLogin($objUsuario);
        
        
        if($retorno != 0){
            $_SESSION['id'] = $retorno['idUsuario'];
        }
        
        print_r($retorno);
        break;
}