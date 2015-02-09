<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';


$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'texto':
        $texto = $_POST['texto'];
        $opcaoTexto = $_POST['opcaoTexto'];

        $objTexto->setTexto($texto);

        if ($opcaoTexto == 'cadastrar') {
            $objCaravanaDao->cadTexto($objTexto);
        } else {
            $objCaravanaDao->altTexto($objTexto);
        }
        break;
        
    case 'cadastrarCaravana':
        $nome = $_POST['nome'];
        $responsável = $_POST['responsavel'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $local = $_POST['local'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $status = 1;
        $dataCadastro = date('Y-m-d H:i:s');
        
        $objCaravana->setNome($nome);
        $objCaravana->setResponsavel($responsável);
        $objCaravana->setEmail($email);
        $objCaravana->setTelefone($telefone);
        $objCaravana->setCelular($celular);
        $objCaravana->setLocal($local);
        $objCaravana->setCidade($cidade);
        $objCaravana->setEstado($estado);
        $objCaravana->setStatus($status);
        $objCaravana->setDataCadastro($dataCadastro);
        
        $objCaravanaDao->cadCaravana($objCaravana);
        
        break;
    
    case 'alterarCaravana':
        $nome = $_POST['nome'];
        $responsável = $_POST['responsavel'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $celular = $_POST['celular'];
        $local = $_POST['local'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $idCaravana = $_POST['idCaravana'];
        
        $objCaravana->setNome($nome);
        $objCaravana->setResponsavel($responsável);
        $objCaravana->setEmail($email);
        $objCaravana->setTelefone($telefone);
        $objCaravana->setCelular($celular);
        $objCaravana->setLocal($local);
        $objCaravana->setCidade($cidade);
        $objCaravana->setEstado($estado);
        $objCaravana->setIdCaravana($idCaravana);
        
        $objCaravanaDao->altCaravana($objCaravana);
        
        break;
    
    case 'excluirCaravana':
        
        $idCaravana = $_POST['idCaravana'];
        
        $objCaravana->setIdCaravana($idCaravana);
        
        $objCaravanaDao->delCaravana($objCaravana);
        break;
        
        
        
}