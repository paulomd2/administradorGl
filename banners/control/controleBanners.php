<?php

require_once '../../model/banco.php';
require_once '../../model/log.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadastrar':
        $nome = $_POST['nome'];
        $link = $_POST['link'];
        $status = $_POST['status'];
        $target = $_POST['target'];
        $dataCadastro = date('Y-m-d H:i:s');
        $dataEntrada = implode('-', array_reverse(explode('/', $_POST['dataPublicacao'])));
        $horaEntrada = $_POST['horaPublicacao'] . ':' . $_POST['minutoPublicacao'] . ':00';
        $dataSaida = implode('-', array_reverse(explode('/', $_POST['dataSaida'])));
        $horaSaida = $_POST['horaSaida'] . ':' . $_POST['minutoSaida'] . ':00';
        $imagem = uploadImagem();
        $lingua = $_POST['lingua'];

        if ($imagem == false) {
            unset($_POST['idBanner']);
            unset($_POST['opcao']);
            $post = implode('|', $_POST);

            echo "
                <script>
                    window.history.back();
                </script>";
        } else {
            $objBanner->setImagem($imagem);
            $objBanner->setNome($nome);
            $objBanner->setLink($link);
            $objBanner->setStatus($status);
            $objBanner->setTarget($target);
            $objBanner->setDataCadastro($dataCadastro);
            $objBanner->setDataPublicacao($dataEntrada);
            $objBanner->setDataSaida($dataSaida);
            $objBanner->setHoraPublicacao($horaEntrada);
            $objBanner->setHoraSaida($horaSaida);
            $objBanner->setOrdem(0);
            $objBanner->setLingua($lingua);


            $objBannersDao->cadBanner($objBanner);
            $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'BANNERS', 0, $dataCadastro);
        }
        echo '<script>window.location = "../";</script>';
        break;

    case 'alterar':
        $nome = $_POST['nome'];
        $link = $_POST['link'];
        $status = $_POST['status'];
        $target = $_POST['target'];
        $dataCadastro = date('Y-m-d H:i:s');
        $dataEntrada = implode('-', array_reverse(explode('/', $_POST['dataPublicacao'])));
        $horaEntrada = $_POST['horaPublicacao'] . ':' . $_POST['minutoPublicacao'] . ':00';
        $dataSaida = implode('-', array_reverse(explode('/', $_POST['dataSaida'])));
        $horaSaida = $_POST['horaSaida'] . ':' . $_POST['minutoSaida'] . ':00';
        $idBanner = $_POST['idBanner'];
        $lingua = $_POST['lingua'];

        if ($_FILES['imagem']['name'] != '') {
            $imagem = uploadImagem();
        } else {
            $imagem = $_POST['imagemAntiga'];
        }


        if ($imagem == false) {
            unset($_POST['idBanner']);
            unset($_POST['opcao']);
            $post = implode('|', $_POST);

            echo "
                <script>
                    window.history.back();
                </script>";
        } else {
            $objBanner->setImagem($imagem);
            $objBanner->setNome($nome);
            $objBanner->setLink($link);
            $objBanner->setStatus($status);
            $objBanner->setTarget($target);
            $objBanner->setDataPublicacao($dataEntrada);
            $objBanner->setDataSaida($dataSaida);
            $objBanner->setIdBanner($idBanner);
            $objBanner->setHoraPublicacao($horaEntrada);
            $objBanner->setHoraSaida($horaSaida);
            $objBanner->setOrdem(0);
            $objBanner->setLingua($lingua);

            $objBannersDao->altBanner($objBanner);
            $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'BANNERS', $objBanner->getIdBanner(), $dataCadastro);

            echo "<script>window.location = '../';</script>";
        }
        break;

    case 'excluir':
        $idBanner = $_POST['idBanner'];

        $objBanner->setIdBanner($idBanner);

        $objBannersDao->delBanner($objBanner);
        $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'BANNERS', $objBanner->getIdBanner(), date('Y-m-d H:i:s'));
        break;

    case 'ordena':
        $updateRecordsArray = $_POST['recordsArray'];

        $listingCounter = 1;
        foreach ($updateRecordsArray as $recordIDValue) {
            $objBannersDao->OdernaBanner($listingCounter, $recordIDValue);
            $listingCounter++;
        }

        break;
}

function uploadImagem() {

    $valido = true;
    $tipoArquivo = pathinfo($_FILES['imagem']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    $new_file_name = strtolower(md5(date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($_FILES['imagem']['size'] > (512000)) { //não pode ser maior que 500Kb
        $valido = false;
    } else {
        @$imagemAntiga = '../../images/' . $_POST["imagemAntiga"];

        if (!file_exists('../../images/')) {
            @mkdir('../../images');
        } elseif (file_exists($imagemAntiga)) {
            @unlink($imagemAntiga);
        }
        @move_uploaded_file($_FILES['imagem']['tmp_name'], '../../images/' . $new_file_name);

        $valido = $new_file_name;
    }

    return $valido;
}
