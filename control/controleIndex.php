<?php

@session_start();

require_once '../model/banco.php';
require_once '../usuarios/model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'verificaLogin':
        $usuario = $_POST['usuario'];
        $senha = md5($_POST['senha']);

        $objUsuario->setUsuario($usuario);
        $objUsuario->setSenha($senha);

        $retorno = $objUsuarioDao->verificaLogin($objUsuario);


        if ($retorno != 0) {
            $_SESSION['id'] = $retorno['idUsuario'];
            $_SESSION['nivel'] = $retorno['nivel'];
            
            $retorno = json_encode($retorno);
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

            $explodeLink = explode('/', $_SERVER['REQUEST_URI']);
            $link = $explodeLink[count($explodeLink) - 3];

            $path = 'http://'.$_SERVER['SERVER_NAME'] . '/' . $link;

            $assunto = 'Alteração de senha';
            $mensagem = '
                
                        <body background="#f1f2f2" style="background: #f1f2f2; color: #404040;">
                            <table style="border:0;padding:20px;margin:0;width:560px;margin:0 auto;border:1px solid #e0e0e0;border-radius:3px;background:#fff;text-align:center;" align="center">
                                <tr>
                                    <td>
                                        <img src="http://www.portalgl.com.br/imagens/logo_glevents.png" alt=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="font-family: Arial"> Sua nova senha é:</p>
                                    </td>

                                </tr>            
                                <tr>
                                    <td>
                                        <p style="font-family: Arial;"><strong>' . $novaSenha . '</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>
                                            <a href="'.$path.'"><img src="'.$path.'/imagens/voltarSite.png" alt="" /></a>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </body>
                    ';
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'To: ' . $usuario['nome'] . ' <' . $usuario['email'] . '>';
            $headers .= 'From: Administrador <fale@example.com>' . "\r\n";

            mail($usuario['email'], $assunto, $mensagem, $headers);
            $objUsuarioDao->altUsuario($objUsuario);
        }

        print_r(count($usuario));

        break;
}