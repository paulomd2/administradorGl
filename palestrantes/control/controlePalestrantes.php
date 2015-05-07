<?php

require_once '../../model/banco.php';
require_once '../../model/log.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadastrar':
        $nome = $_POST['nome'];
        $texto = $_POST['estande'];
        $cargo = $_POST['link'];
        $data = date('Y-m-d H:is');
        $imagem = uploadImagem();
        $status = $_POST['status'];

        if ($imagem == false) {
            echo "
                <script>
                    window.history.back();
                </script>";
        } else {
            $objPalestrante->setImagem($imagem);
            $objPalestrante->setNome($nome);
            $objPalestrante->setTexto($texto);
            $objPalestrante->setCargo($cargo);
            $objPalestrante->setData($data);
            $objPalestrante->setStatus($status);

            $objPalestranteDao->cadExpositor($objPalestrante);
            $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'PALESTRANTES', 0, $dataCadastro);
            
            echo '<script>window.location = "../verExpositores.php";</script>';
        }
        
        break;

    case 'alterar':
        $nome = $_POST['nome'];
        $texto = $_POST['estande'];
        $cargo = $_POST['link'];
        $imagem = '';
        $status = $_POST['status'];
        $idPalestrante = $_POST['idPalestrante'];
        
        if($_FILES['imagem']['name'] == ''){
            $imagem = $_POST['imagemAntiga'];
        }else{
            $imagem = uploadImagem();
        }
            
        if ($imagem == false) {
            echo "
                <script>
                    window.history.back();
                </script>";
        } else {
            $objPalestrante->setImagem($imagem);
            $objPalestrante->setNome($nome);
            $objPalestrante->setTexto($texto);
            $objPalestrante->setCargo($cargo);
            $objPalestrante->setStatus($status);
            $objPalestrante->setIdPalestrante($idPalestrante);

            $objPalestranteDao->altExpositor($objPalestrante);
            $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'PALESTRANTES', $objPalestrante->getIdPalestrante($idExpositor), date('Y-m-d H:i:s'));
            
            echo '<script>window.location = "../verExpositores.php";</script>';
        }
        break;

    case 'excluir':
        $idPalestrante = $_POST['idPalestrante'];

        $objPalestrante->setIdExpositor($idExpositor);

        $objPalestranteDao->delExpositor($objPalestrante);
        $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'PALESTRANTES', $objPalestrante->getIdPalestrante($idExpositor), date('Y-m-d H:i:s'));
        break;

//    case 'ordena':
//        $action = mysql_real_escape_string($_POST['action']);
//        $updateRecordsArray = $_POST['recordsArray'];
//
//        $listingCounter = 1;
//        foreach ($updateRecordsArray as $recordIDValue) {
//            $objPalestranteDao->ordenaExpositor($listingCounter, $recordIDValue);
//            $listingCounter++;
//        }
//
//        break;
}

function uploadImagem() {

    $valido = true;
    $tipoArquivo = pathinfo($_FILES['imagem']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    $new_file_name = strtolower(md5(date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($_FILES['imagem']['size'] > (204800)) { //não pode ser maior que 200Kb
        $valido = false;
    } else {
        @$imagemAntiga = '../../images/' . $_POST["imagemAntiga"];

        if (!file_exists('../../images/')) {
            mkdir('../../images');
        } elseif (file_exists($imagemAntiga)) {
            @unlink($imagemAntiga);
        }
        move_uploaded_file($_FILES['imagem']['tmp_name'], '../../images/' . $new_file_name);

        $valido = $new_file_name;
    }

    return $valido;
}
