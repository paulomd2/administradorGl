<?php

require_once '../../model/banco.php';
require_once '../../model/log.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadastrarCategoria':
        $nome = $_POST['nome'];
        //$identificador = $_POST['identificador'];
        $dataCadastro = date('Y-m-d H:i:s');
        $status = $_POST['status'];
        $lingua = $_POST['lingua'];

        $objCategoria->setNome($nome);
        $objCategoria->setDataCadastro($dataCadastro);
        $objCategoria->setStatus($status);
        $objCategoria->setLingua($lingua);

        $objRodapeDao->cadCategoria($objCategoria);
        $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'CATEGORIA_RODAPÉ', 0, $dataCadastro);
        break;

    case 'alterarCategoria':
        $nome = $_POST['nome'];
        $idCategoria = $_POST['idCategoria'];
        $status = $_POST['status'];
        $lingua = $_POST['lingua'];

        $objCategoria->setNome($nome);
        $objCategoria->setStatus($status);
        $objCategoria->setIdCategoria($idCategoria);
        $objCategoria->setLingua($lingua);

        $objRodapeDao->altCategoria($objCategoria);
        $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'CATEGORIA_RODAPÉ', $objCategoria->getIdCategoria(), date('Y-m-d H:i:s'));
        break;

    case 'excluirCategoria':
        $idCategoria = $_POST['idCategoria'];

        $objCategoria->setIdCategoria($idCategoria);

        $objRodapeDao->delCategoria($objCategoria);
        $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'CATEGORIA_RODAPÉ', $objCategoria->getIdCategoria(), date('Y-m-d H:i:s'));
        break;

    case 'ordena':
        $action = mysql_real_escape_string($_POST['action']);
        $updateRecordsArray = $_POST['recordsArray'];

        $listingCounter = 1;
        foreach ($updateRecordsArray as $recordIDValue) {
            $objCategoriasDao->testaOrdem($listingCounter, $recordIDValue);
            $listingCounter++;
        }

        break;


    case 'cadastrarImagem': {
            $nome = $_POST['nome'];
            $status = $_POST['status'];
            $dataCadastro = date('Y-m-d H:i:s');
            $idCategoria = $_POST['idCategoria'];
            $imagem = uploadImagem();
            $link = $_POST['link'];

            $objImagem->setIdCategoria($idCategoria);
            $objImagem->setImagem($imagem);
            $objImagem->setNome($nome);
            $objImagem->setDataCadastro($dataCadastro);
            $objImagem->setStatus($status);
            $objImagem->setLink($link);

            unset($_POST['opcao']);
            $post = implode('|', $_POST);

            if ($imagem == false) {
                echo "
                <script>
                    var url = '" . $_SERVER['HTTP_REFERER'] . "+&errorId=50&data=" . $post . "';
                    window.location = url;
                </script>";
            } else {
                $objRodapeDao->cadImagem($objImagem);
                $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'IMAGEM_RODAPÉ', 0, $dataCadastro);
                echo '<script>window.location = "../verImagens.php?id=' . $idCategoria . '";</script>';
            }
        }


    case 'alterarImagem': {
            $nome = $_POST['nome'];
            $status = $_POST['status'];
            $dataCadastro = date('Y-m-d H:i:s');
            $idCategoria = $_POST['idCategoria'];
            $idImagem = $_POST['idImagem'];
            $link = $_POST['link'];

            if ($_FILES['imagem']['name'] == '') {
                $imagem = $_POST['imagemAntiga'];
            } else {
                $imagem = uploadImagem();
            }


            $objImagem->setIdCategoria($idCategoria);
            $objImagem->setIdImagem($idImagem);
            $objImagem->setImagem($imagem);
            $objImagem->setNome($nome);
            $objImagem->setDataCadastro($dataCadastro);
            $objImagem->setStatus($status);
            $objImagem->setLink($link);

            if ($imagem == false) {
                unset($_POST['opcao']);
                $post = implode('|', $_POST);

                echo "
                <script>
                    var url = '" . $_SERVER['HTTP_REFERER'] . "+&errorId=50';
                    window.location = url;
                </script>";
            } else {
                $objRodapeDao->altImagem($objImagem);
                $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'IMAGEM_RODAPÉ', $objImagem->getIdImagem(), date('Y-m-d H:i:s'));
                echo '<script>window.location = "../verImagens.php?id=' . $idCategoria . '";</script>';
            }

            break;
        }


    case 'excluirImagem':
        $idImagem = $_POST['idImagem'];

        $objImagem->setIdImagem($idImagem);

        $objRodapeDao->delImagem($objImagem);
        $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'IMAGEM_RODAPÉ', $objCategoria->getIdImagem(), date('Y-m-d H:i:s'));
        break;

    case 'ordenaImagem':
        $updateRecordsArray = $_POST['recordsArray'];

        $listingCounter = 1;
        foreach ($updateRecordsArray as $recordIDValue) {
            $objRodapeDao->ordenaImagem($listingCounter, $recordIDValue);
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
        $imagemAntiga = '';
        if (isset($_POST["imagemAntiga"])) {
            $imagemAntiga = '../../images/' . $_POST["imagemAntiga"];
        }

        if (!file_exists('../../images/')) {
            mkdir('../../images');
        } elseif (file_exists($imagemAntiga)) {
            @unlink($imagemAntiga);
        }
        @move_uploaded_file($_FILES['imagem']['tmp_name'], '../../images/' . $new_file_name);

        $valido = $new_file_name;
    }

    return $valido;
}
