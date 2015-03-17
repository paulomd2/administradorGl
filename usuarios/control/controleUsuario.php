<?php

@session_start();

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case "cadastrar" :
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $senha = md5($_POST['senha']);
        $nivel = $_POST['nivel'];
        $dataCricao = date('Y-m-d H:i:s');
        $status = $_POST['status'];

        $objUsuario->setNome($nome);
        $objUsuario->setEmail($email);
        $objUsuario->setUsuario($usuario);
        $objUsuario->setSenha($senha);
        $objUsuario->setNivel($nivel);
        $objUsuario->setStatus($status);
        $objUsuario->setDataCriacao($dataCricao);

        $objUsuarioDao->cadUsuario($objUsuario);
        break;

    case 'alterar':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $senha = '';
        $nivel = $_POST['nivel'];
        $dataCricao = date('Y-m-d H:i:s');
        $idUsuario = $_POST['idUsuario'];
        $senha = $_POST['senha'];
        $status = $_POST['status'];

        if (strlen($senha) != 32) {
            $senha = md5($_POST['senha']);
        }

        $objUsuario->setNome($nome);
        $objUsuario->setEmail($email);
        $objUsuario->setUsuario($usuario);
        $objUsuario->setSenha($senha);
        $objUsuario->setNivel($nivel);
        $objUsuario->setStatus($status);
        $objUsuario->setDataCriacao($dataCricao);
        $objUsuario->setIdUsuario($idUsuario);

        $objUsuarioDao->altUsuario($objUsuario);

        break;

    case 'deletar':
        $idUsuario = $_POST['idUsuario'];

        $objUsuario->setIdUsuario($idUsuario);

        $objUsuarioDao->delUsuario($objUsuario);
        break;

    case 'logar':
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $objUsuario->setUsuario($usuario);
        $objUsuario->setSenha($senha);

        $retorno = $objUsuarioDao->verificaLogin($objUsuario);

        print_r($retorno['idUsuario']);
        break;

    case 'deslogar':
        session_destroy();
        break;

    case 'verificaEmail':
        $objUsuario->setEmail($_POST['email']);

        $contador = $objUsuarioDao->verificaEmail($objUsuario);
        print_r($contador);

        break;

    case 'verificaUsuario':
        $objUsuario->setUsuario($_POST['usuario']);

        $contador = $objUsuarioDao->verificaUsuario($objUsuario);
        print_r($contador);

        break;
}