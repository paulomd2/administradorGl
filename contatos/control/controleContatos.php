<?php

require_once '../../model/banco.php';
require_once '../../model/log.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case "cadastrarEmail": {

            $email = $_POST['email'];
            $nome = $_POST['nome'];
            $dataCadastro = date('Y-m-d H:i:s');

            var_dump($_POST);

            $objEmail->setNome($nome);
            $objEmail->setEmail($email);
            $objEmail->setPrincipal(0);
            $objEmail->setDataCadastro($dataCadastro);

            $objContatoDao->cadEmail($objEmail);
            $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'CONTATOS', 0, $dataCadastro);
            break;
        }

    case "alterarEmail": {
            $email = $_POST['email'];
            $nome = $_POST['nome'];
            $idEmail = $_POST['idEmail'];

            $objEmail->setNome($nome);
            $objEmail->setEmail($email);
            $objEmail->setPrincipal(0);
            $objEmail->setIdEmail($idEmail);

            $objContatoDao->altEmail($objEmail);
            $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'CONTATOS', $objEmail->getIdEmail(), date('Y-m-d H:i:s'));
            break;
        }

    case "excluirEmail": {

            $idEmail = $_POST['idEmail'];

            $objEmail->setIdEmail($idEmail);

            $objContatoDao->delEmail($objEmail);
            $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'CONTATOS', $objEmail->getIdEmail(), date('Y-m-d H:i:s'));
            break;
        }


    case 'attPrincipal': {
            $id = $_POST['id'];

            $objEmail->setIdEmail($id);

            $objContatoDao->setaPrincipal($objEmail);
            $objLogDao->cadLog($_SESSION['id'], 'ATUALIZOU_EMAIL_PRINCIPAL', 'CONTATOS', $objEmail->getIdEmail(), date('Y-m-d H:i:s'));
            break;
        }

    case 'responderContato': {
            $idContato = $_POST['idContato']; //id do email recebido
            $mensagem = $_POST['mensagem']; //mensagem de resposta
            $dataResposta = date('Y-m-d H:i:s');

            $contato = $objContatoDao->listaContato1($idContato);
            $email = $objContatoDao->listaEmailPrincipal();

            $de = $email['email']; //fagga
            $nomeDe = $email['nome'];
            $para = $contato['email']; //cliente
            $nomePara = $contato['nome'];
            $assunto = $contato['assunto']; 
            $mensagem = wordwrap($contato['mensagem']);

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'To: '.$nomePara.' <'.$para.'>'."\r\n";
            $headers .= 'From: '.$nomeDe.' <'.$de.'>' . "\r\n";
            mail($para, $assunto, $mensagem, $headers);

            $objEmail->setIdContato($idContato);
            $objEmail->setIdEmail($email["idEmail"]);
            $objEmail->setMensagem($mensagem);
            $objEmail->setDataCadastro($dataResposta);
            
            $objContatoDao->gravaResposta($objEmail);
            $objLogDao->cadLog($_SESSION['id'], 'RESPONDEU_EMAIL', 'CONTATOS', $objEmail->getIdEmail(), date('Y-m-d H:i:s'));
        }
}