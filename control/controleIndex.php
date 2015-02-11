<?php

@session_start();
require_once '../model/banco.php';
require_once '../usuarios/model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'verificaLogin':
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $objUsuario->setUsuario($usuario);
        $objUsuario->setSenha($senha);

        $retorno = $objUsuarioDao->verificaLogin($objUsuario);


        if ($retorno != 0) {
            $_SESSION['id'] = $retorno['idUsuario'];
        }

        print_r($retorno);
        break;

    case 'esqueciSenha':
        $email = $_POST['email'];

        $objUsuario->setEmail($email);

        $usuario = $objUsuarioDao->verificaEmail($objUsuario);

        if (count($usuario) != 0) {
            $novaSenha = md5(date('YmdH:is') . $usuario['senha']);
            
            $objUsuario->setSenha($novaSenha);
            $objUsuario->setEmail($usuario['email']);
            $objUsuario->setUsuario($usuario['usuario']);
            $objUsuario->setNivel($usuario['nivel']);
            $objUsuario->setNome($usuario['nome']);
            $objUsuario->setIdUsuario($usuario['idUsuario']);

            $assunto = 'Alteração de senha';
            $mensagem = 'sua nova senha é essa, negão: '.$novaSenha;
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'To: '.$usuario['nome'].' <'.$usuario['email'].'>';
            $headers .= 'From: Us <us@example.com>' . "\r\n";

            mail($usuario['email'], $assunto, $mensagem, $headers);
            $objUsuarioDao->altUsuario($objUsuario);
        }

        print_r(count($usuario));

        break;
}