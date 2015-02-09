<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'cadastrarCategoria':
        $nome = $_POST['nome'];
        //$identificador = $_POST['identificador'];
        $dataCadastro = date('Y-m-d H:i:s');
        $status = 1;

        $objCategoria->setNome($nome);
        //$objCategoria->setIdentificador($identificador);
        $objCategoria->setDataCadastro($dataCadastro);
        $objCategoria->setStatus($status);

        $objRodapeDao->cadCategoria($objCategoria);
        break;

    case 'alterarCategoria':
        $nome = $_POST['nome'];
        $identificador = $_POST['identificador'];
        $idCategoria = $_POST['idCategoria'];

        $objCategoria->setNome($nome);
        //$objCategoria->setIdentificador($identificador);
        $objCategoria->setIdCategoria($idCategoria);

        $objRodapeDao->altCategoria($objCategoria);
        break;

    case 'excluirCategoria':
        $idCategoria = $_POST['idCategoria'];

        $objCategoria->setIdCategoria($idCategoria);

        $objRodapeDao->delCategoria($objCategoria);
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

            $objImagem->setIdCategoria($idCategoria);
            $objImagem->setImagem($imagem);
            $objImagem->setNome($nome);
            $objImagem->setDataCadastro($dataCadastro);
            $objImagem->setStatus($status);

            //$verificaCategoria = $objRodapeDao->listaCategoriasImagens($objImagem);

            unset($_POST['opcao']);
            $post = implode('|', $_POST);
            /*
              if ($verificaCategoria['identificador'] == 1 && $verificaCategoria['quantidade'] >= 1) {
              echo "
              <script>
              var url = '" . $_SERVER['HTTP_REFERER'] . "&errorId=48';
              window.location = url;
              </script>";
              } elseif ($verificaCategoria['identificador'] == 2 && $verificaCategoria['quantidade'] >= 20) {
              echo "
              <script>
              var url = '" . $_SERVER['HTTP_REFERER'] . "&errorId=49';
              window.location = url;
              </script>";
              }
             */
            if ($imagem == false) {
                echo "
                <script>
                    var url = '" . $_SERVER['HTTP_REFERER'] . "+&errorId=50&data=" . $post . "';
                    window.location = url;
                </script>";
            } else {
                $objRodapeDao->cadImagem($objImagem);
                echo '<script>window.location = "../verImagens.php?id=' . $idCategoria . '";</script>';
            }
        }


    case 'alterarImagem': {
            $nome = $_POST['nome'];
            $status = $_POST['status'];
            $dataCadastro = date('Y-m-d H:i:s');
            $idCategoria = $_POST['idCategoria'];
            $imagem = uploadImagem();
            $idImagem = $_POST['idImagem'];

            if ($_FILES['imagem']['name'] != '') {
                $imagem = uploadImagem();
            } else {
                $imagem = $_POST['imagemAntiga'];
            }

            $objImagem->setIdCategoria($idCategoria);
            $objImagem->setImagem($imagem);
            $objImagem->setNome($nome);
            $objImagem->setDataCadastro($dataCadastro);
            $objImagem->setStatus($status);

            //$verificaCategoria = $objRodapeDao->listaCategoriasImagens($objImagem);

            unset($_POST['opcao']);
            $post = implode('|', $_POST);
            /*
              if ($verificaCategoria['identificador'] == 1 && $verificaCategoria['quantidade'] >= 1) {
              echo "
              <script>
              var url = '" . $_SERVER['HTTP_REFERER'] . "&errorId=48';
              window.location = url;
              </script>";
              } elseif ($verificaCategoria['identificador'] == 2 && $verificaCategoria['quantidade'] >= 20) {
              echo "
              <script>
              var url = '" . $_SERVER['HTTP_REFERER'] . "&errorId=49';
              window.location = url;
              </script>";
              } else
             */
            if ($imagem == false) {
                echo "
                <script>
                    var url = '" . $_SERVER['HTTP_REFERER'] . "+&errorId=50';
                    window.location = url;
                </script>";
            } else {
                $objRodapeDao->cadImagem($objImagem);
                echo '<script>window.location = "../verImagens.php?id=' . $idCategoria . '";</script>';
            }
        }
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
