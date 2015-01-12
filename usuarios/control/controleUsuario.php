<?php
require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch($opcao){
    case "cadastrar" :
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $nivel = $_POST['nivel'];
        $dataCricao = date('Y-m-d H:i:s');
        
        $objUsuario->setNome($nome);
        $objUsuario->setEmail($email);
        $objUsuario->setUsuario($usuario);
        $objUsuario->setSenha($senha);
        $objUsuario->setNivel($nivel);
        $objUsuario->setDataCriacao($dataCricao);
        
        $objUsuarioDao->cadUsuario($objUsuario);
    break;
    
    case 'alterar':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $nivel = $_POST['nivel'];
        $dataCricao = date('Y-m-d H:i:s');
        $idUsuario = $_POST['idUsuario'];
        
        $objUsuario->setNome($nome);
        $objUsuario->setEmail($email);
        $objUsuario->setUsuario($usuario);
        $objUsuario->setSenha($senha);
        $objUsuario->setNivel($nivel);
        $objUsuario->setDataCriacao($dataCricao);
        $objUsuario->setIdUsuario($idUsuario);
        
        $objUsuarioDao->altUsuario($objUsuario);
    break;

    case 'deletar':
        $idUsuario = $_POST['idUsuario'];
        
        $objUsuario->setIdUsuario($idUsuario);
        
        $objUsuarioDao->delUsuario($objUsuario);
    break;
}