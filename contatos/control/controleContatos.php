<?php

require_once '../../model/banco.php';
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

            break;
        }

    case "excluirEmail": {

            $idEmail = $_POST['idEmail'];

            $objEmail->setIdEmail($idEmail);

            $objContatoDao->delEmail($objEmail);

            break;
        }


    case 'attPrincipal': {
            $id  = $_POST['id'];
            
            $objEmail->setIdEmail($id);
                    
            $objContatoDao->setaPrincipal($objEmail);
            break;
        }
}