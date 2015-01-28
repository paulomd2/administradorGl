<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case "cadastrar": {
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $conteudo = $_POST['conteudo'];

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
            $satus = 1;
            $imagem = uploadImagem();

            if ($imagem == false) {
                unset($_POST['idBanner']);
                unset($_POST['opcao']);
                $post = implode('|', $_POST);

                echo "
                <script>
                    var teste = '" . $_SERVER['HTTP_REFERER'] . "+&errorId=50&data=" . $post . "';
                    window.location = teste;
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
                $objDestaque->setStatus($satus);

                $objDestaqueDao->cadDestaque($objDestaque);

                echo '<script>window.location="../verDestaques.php"</script>';
            }
            break;
        }

    case "alterar": {
            $idDestaque = $_POST['idDestaque'];
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $conteudo = $_POST['conteudo'];
            echo $dataPublicacao = $_POST['dataPublicacao'].' '.$_POST['horaPublicacao'].':'.$_POST['minutoPublicacao'].':00';
            $dataSaida = $_POST['dataSaida'].' '.$_POST['horaSaida'].':'.$_POST['minutoSaida'].':00';
            $link = $_POST['link'];

            if ($_FILES['imagem']['name'] == '') {
                $imagem = $_POST['imagemAntiga'];
            } else {
                $imagem = uploadImagem();
            }

            if ($imagem == false) {
                unset($_POST['idBanner']);
                unset($_POST['opcao']);
                $post = implode('|', $_POST);

                echo "
                <script>
                    var teste = '" . $_SERVER['HTTP_REFERER'] . "+&errorId=50&data=" . $post . "';
                    window.location = teste;
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

                $objDestaqueDao->altDestaque($objDestaque);

                echo '<script>window.location="../verDestaques.php"</script>';
            }
            break;
        }

    case "excluir": {
            $idDestaque = $_POST['idDestaque'];

            $objDestaque->setIdDestaque($idDestaque);

            $objDestaqueDao->delDestaque($objDestaque);

            break;
        }
}

function uploadImagem() {

    $valido = true;
    $tipoArquivo = pathinfo($_FILES['imagem']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    $new_file_name = strtolower(md5(date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($_FILES['imagem']['size'] > (512000)) { //não pode ser maior que 500Kb
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
