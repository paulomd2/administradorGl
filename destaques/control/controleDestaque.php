<?php

require_once '../../model/banco.php';
require_once '../../model/log.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case "cadastrar": {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $conteudo = $_POST['conteudo'];
            $lingua = $_POST['lingua'];

            if ($_POST['dataPublicacao'] == '') {
                $dataPublicacao = '0000-00-00';
            } else {
                $dataPublicacao = $_POST['dataPublicacao'];
            }
            $dataPublicacao .= ' ' . $_POST['horaPublicacao'] . ':' . $_POST['minutoPublicacao'] . ':00';

            if ($_POST['dataSaida'] == '') {
                $dataSaida = '0000-00-00';
            } else {
                $dataSaida = $_POST['dataSaida'];
            }
            $dataSaida .= ' ' . $_POST['horaSaida'] . ':' . $_POST['minutoSaida'] . ':00';
            $link = $_POST['link'];
            $dataCadastro = date('Y-m-d H:i:s');
            $status = $_POST['status'];
            $imagem = uploadImagem();

            if ($imagem == false) {
                echo "
                <script>
                    window.history.back();
                </script>";
            } else {

                $objDestaque->setTitulo($titulo);
                $objDestaque->setSubtitulo($subtitulo);
                $objDestaque->setConteudo($conteudo);
                $objDestaque->setImagem($imagem);
                $objDestaque->setDataPublicacao($dataPublicacao);
                $objDestaque->setDataSaida($dataSaida);
                $objDestaque->setDataCadastro($dataCadastro);
                $objDestaque->setLink($link);
                $objDestaque->setStatus($status);
                $objDestaque->setLingua($lingua);

                $objDestaqueDao->cadDestaque($objDestaque);
                $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'DESTAQUE', 0, $dataCadastro);
                echo '<script>window.location="../verDestaques.php"</script>';
            }
            break;
        }

    case "alterar": {
            $idDestaque = $_POST['idDestaque'];
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $conteudo = $_POST['conteudo'];
            $dataPublicacao = $_POST['dataPublicacao'].' '.$_POST['horaPublicacao'].':'.$_POST['minutoPublicacao'].':00';
            $dataSaida = $_POST['dataSaida'].' '.$_POST['horaSaida'].':'.$_POST['minutoSaida'].':00';
            $link = $_POST['link'];
            $status = $_POST['status'];
            $lingua = $_POST['lingua'];

            if ($_FILES['imagem']['name'] == '') {
                $imagem = $_POST['imagemAntiga'];
            } else {
                $imagem = uploadImagem();
            }

            if ($imagem == false) {
                echo "
                <script>
                    window.history.back();
                </script>";
            } else {

                $objDestaque->setTitulo($titulo);
                $objDestaque->setSubtitulo($subtitulo);
                $objDestaque->setConteudo($conteudo);
                $objDestaque->setImagem($imagem);
                $objDestaque->setDataPublicacao($dataPublicacao);
                $objDestaque->setDataSaida($dataSaida);
                $objDestaque->setLink($link);
                $objDestaque->setIdDestaque($idDestaque);
                $objDestaque->setStatus($status);
                $objDestaque->setLingua($lingua);

                $objDestaqueDao->altDestaque($objDestaque);
                $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'DESTAQUE', $objDestaque->getIdDestaque(), date('Y-m-d H:i:s'));

                echo '<script>window.location="../verDestaques.php"</script>';
            }
            break;
        }

    case "excluir": {
            $idDestaque = $_POST['idDestaque'];

            $objDestaque->setIdDestaque($idDestaque);

            $objDestaqueDao->delDestaque($objDestaque);
            $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'DESTAQUE', $objDestaque->getIdDestaque(), date('Y-m-d H:i:s'));
            break;
        }
        
        case 'ordena':
        $updateRecordsArray = $_POST['recordsArray'];

        $listingCounter = 1;
        foreach ($updateRecordsArray as $recordIDValue) {
            $objDestaqueDao->ordenaDestaque($listingCounter, $recordIDValue);
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
        move_uploaded_file($_FILES['imagem']['tmp_name'], '../../images/' . $new_file_name);

        $valido = $new_file_name;
    }

    return $valido;
}
