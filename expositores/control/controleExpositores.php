<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadastrar':
        $nome = $_POST['nome'];
        $estande = $_POST['estande'];
        $link = $_POST['link'];
        $dataPublicacao = $_POST['dataPublicacao'];
        $dataCadastro = date('Y-m-d H:is');
        $imagem = uploadImagem();
        $status = $_POST['status'];

        if ($imagem == false) {
            unset($_POST['idBanner']);
            unset($_POST['opcao']);
            $post = implode('|', $_POST);

            echo "
                <script>
                    var url = '" . $_SERVER['HTTP_REFERER'] . "+&errorId=50&data=" . $post . "';
                    window.location = url;
                </script>";
        } else {
            $objExpositor->setImagem($imagem);
            $objExpositor->setNome($nome);
            $objExpositor->setLink($link);
            $objExpositor->setEstande($estande);
            $objExpositor->setDataPublicacao($dataPublicacao);
            $objExpositor->setDataCadastro($dataCadastro);
            $objExpositor->setStatus($status);

            $objExpositorDao->cadExpositor($objExpositor);
            
            echo '<script>window.location = "../verExpositores.php";</script>';
        }
        
        break;

    case 'alterar':
        $nome = $_POST['nome'];
        $estande = $_POST['estande'];
        $link = $_POST['link'];
        $dataPublicacao = $_POST['dataPublicacao'];
        $dataCadastro = date('Y-m-d H:is');
        $idExpositor = $_POST['idExpositor'];
        $imagem = '';
        $status = $_POST['status'];
        
        if($_FILES['imagem']['name'] == ''){
            $imagem = $_POST['imagemAntiga'];
        }else{
            $imagem = uploadImagem();
        }
            
        if ($imagem == false) {
            unset($_POST['idBanner']);
            unset($_POST['opcao']);
            $post = implode('|', $_POST);
            
            echo "
                <script>
                    var url = '" . $_SERVER['HTTP_REFERER'] . "+&errorId=50&data=" . $post . "';
                    window.location = url;
                </script>";
        } else {
            $objExpositor->setImagem($imagem);
            $objExpositor->setNome($nome);
            $objExpositor->setLink($link);
            $objExpositor->setEstande($estande);
            $objExpositor->setDataPublicacao($dataPublicacao);
            $objExpositor->setDataCadastro($dataCadastro);
            $objExpositor->setStatus($status);
            $objExpositor->setIdExpositor($idExpositor);

            $objExpositorDao->altExpositor($objExpositor);
            
            echo '<script>window.location = "../verExpositores.php";</script>';
        }
        break;

    case 'excluir':
        $idExpositor = $_POST['idExpositor'];

        $objExpositor->setIdExpositor($idExpositor);

        $objExpositorDao->delExpositor($objExpositor);
        break;

    case 'ordena':
        $action = mysql_real_escape_string($_POST['action']);
        $updateRecordsArray = $_POST['recordsArray'];

        $listingCounter = 1;
        foreach ($updateRecordsArray as $recordIDValue) {
            $objExpositorDao->ordenaExpositor($listingCounter, $recordIDValue);
            $listingCounter++;
        }

        break;
}

function uploadImagem() {

    $valido = true;
    $tipoArquivo = pathinfo($_FILES['imagem']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    $new_file_name = strtolower(md5(date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($_FILES['imagem']['size'] > (204800)) { //não pode ser maior que 200Kb
        $valido = false;
    } else {
        $imagemAntiga = '../../images/' . $_POST["imagemAntiga"];

        if (!file_exists('../../images/')) {
            mkdir('../../images');
        } elseif (file_exists($imagemAntiga)) {
            unlink($imagemAntiga);
        }
        move_uploaded_file($_FILES['imagem']['tmp_name'], '../../images/' . $new_file_name);

        $valido = $new_file_name;
    }

    return $valido;
}
