<?php

require_once '../../model/banco.php';
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
        $dataEntrada = str_replace('T', ' ', $dataEntrada);
        $dataSaida = implode('-', array_reverse(explode('/', $_POST['dataSaida'])));
        $dataSaida = str_replace('T', ' ', $dataSaida);
        $imagem = uploadImagem();

        $objBanner->setNome($nome);
        $objBanner->setLink($link);
        $objBanner->setStatus($status);
        $objBanner->setTarget($target);
        $objBanner->setDataCadastro($dataCadastro);
        $objBanner->setDataPublicacao($dataEntrada);
        $objBanner->setDataSaida($dataSaida);
        $objBanner->setImagem($imagem);

        $objBannersDao->cadBanner($objBanner);
        
        echo '<script>window.location = "../";</script>';
        break;

    case 'alterar':
        $nome = $_POST['nome'];
        $link = $_POST['link'];
        $status = $_POST['status'];
        $target = $_POST['target'];
        $dataCadastro = date('Y-m-d H:i:s');
        $dataEntrada = implode('-', array_reverse(explode('/', $_POST['dataPublicacao'])));
        $dataSaida = implode('-', array_reverse(explode('/', $_POST['dataSaida'])));
        $idBanner = $_POST['idBanner']; 

        if ($_FILES['imagem']['name'] != '') {
            $imagem = uploadImagem();
        }else{
            $imagem = $_POST['imagemAntiga'];
        }
        
        $objBanner->setImagem($imagem);
        $objBanner->setNome($nome);
        $objBanner->setLink($link);
        $objBanner->setStatus($status);
        $objBanner->setTarget($target);
        $objBanner->setDataCadastro($dataCadastro);
        $objBanner->setDataPublicacao($dataEntrada);
        $objBanner->setDataSaida($dataSaida);
        $objBanner->setIdBanner($idBanner);

        //$objBannersDao->altBanner($objBanner);
        //echo '<script>window.location = "../";</script>';
        break;

    case 'excluir':
        $idRelease = $_POST['idRelease'];

        $objBanner->setIdRelease($idRelease);

        $objBannersDao->delRelease($objBanner);
        break;
}

function uploadImagem() {

    $tipoArquivo = pathinfo($_FILES['imagem']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    
    
    var_dump($_POST);
    
    echo '<br /><br />';
    unset($_POST[0]);
    unset($_POST[1]);
    unset($_POST[2]);
    var_dump($_POST);
    //$post = implode('|',$_POST);
    //echo $post;
    $new_file_name = strtolower(md5(date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($_FILES['imagem']['size'] > (512000)) { //não pode ser maior que 500Kb
        echo "
                <script>
                    console.log('".$_SERVER['HTTP_REFERER']."+&errorId=50');
                    var teste = '".$_SERVER['HTTP_REFERER']."+&errorId=50&data=';
                    //console.log(teste);
                    //window.location = teste;

                </script>";
    } else {
        if (!file_exists('../../images/')) {
            mkdir('../../images');
        }
        move_uploaded_file($_FILES['imagem']['tmp_name'], '../../images/' . $new_file_name);

        return $new_file_name;
    }
}
