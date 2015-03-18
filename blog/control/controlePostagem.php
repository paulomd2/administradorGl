<?php
require_once '../../model/banco.php';
require_once '../../model/log.php';
require_once '../model/dao.php';

$opcao = $_REQUEST["opcao"];
switch ($opcao) {

    case "cadastrar": {
            $titulo = $_POST['titulo'];
            $texto = $_POST['texto'];
            $dataPublicacao = $_POST['dataPublicacao'];
            $horaPublicacao = $_POST['horaPublicacao'] . ':' . $_POST['minutoPublicacao'];
            $dataPublicacao .= ' ' . $horaPublicacao;

            $dataSaida = $_POST['dataSaida'];
            $horaSaida = $_POST['horaSaida'] . ':' . $_POST['minutoSaida'];
            $dataSaida .= ' ' . $horaSaida;

            $dataCadastro = date('Y-m-d H:i:s');
            //$idUsuario = $_SESSION['id'];
            $idUsuario = 1;
            $imagem = uploadImagem();
            $tagSeo = $_POST['tagSeo'];
            $descricaoSeo = $_POST['descricaoSeo'];

            $objBlog->setTitulo($titulo);
            $objBlog->setTexto($texto);
            $objBlog->setDataPublicacao($dataPublicacao);
            $objBlog->setDataSaida($dataSaida);
            $objBlog->setDataCadastro($dataCadastro);
            $objBlog->setIdUsuario($idUsuario);
            $objBlog->setImagem($imagem);
            $objBlog->setTagSeo($tagSeo);
            $objBlog->setDescricaoSeo($descricaoSeo);
            $objBlog->setStatus(1);

            $objBlogDao->cadPostagem($objBlog);
            $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'BLOG', 0, $dataCadastro);
            echo "<script>window.location='../verPostagens.php';</script>";

            break;
        }
    case "alterar": {
            $titulo = $_POST['titulo'];
            $texto = $_POST['texto'];
            $dataPublicacao = $_POST['dataPublicacao'];
            $horaPublicacao = $_POST['horaPublicacao'] . ':' . $_POST['minutoPublicacao'];
            $dataPublicacao .= ' ' . $horaPublicacao;

            $dataSaida = $_POST['dataSaida'];
            $horaSaida = $_POST['horaSaida'] . ':' . $_POST['minutoSaida'];
            $dataSaida .= ' ' . $horaSaida;
            
            $idPostagem = $_POST['idPostagem'];
            $tagSeo = $_POST['tagSeo'];
            $descricaoSeo = $_POST['descricaoSeo'];
            
            if($_FILES['imagem']['name']!=''){
                $imagem = uploadImagem();
            }else{
                $imagem = $_POST['imagemAntiga'];
            }

            $objBlog->setTitulo($titulo);
            $objBlog->setTexto($texto);
            $objBlog->setDataPublicacao($dataPublicacao);
            $objBlog->setDataSaida($dataSaida);
            $objBlog->setImagem($imagem);
            $objBlog->setTagSeo($tagSeo);
            $objBlog->setDescricaoSeo($descricaoSeo);
            $objBlog->setIdPostagem($idPostagem);

            $objBlogDao->altPostagem($objBlog);
            $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'BLOG', $objBlog->getIdPostagem(), date('Y-m-d H:i:s'));

            echo "<script>window.location='../verPostagens.php';</script>";

            break;
        }
    case "excluir": {

            $idPostagem = $_POST['idPostagem'];

            $objBlog->setIdPostagem($idPostagem);

            $objBlogDao->delPostagem($objBlog);
            $objLogDao->cadLog($_SESSION['id'], 'EXCLUIU', 'BANNERS', $objBlog->getIdPostagem(), date('Y-m-d H:i:s'));
            break;
        }
}

function uploadImagem() {

    $tipoArquivo = pathinfo($_FILES['imagem']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    $new_file_name = strtolower(md5(date('d/m/Y/H:i:s'))) . $tipoArquivo;
    $imagemAntiga = '../../images/' . $_POST["imagemAntiga"];

    if (!file_exists('../../images/')) {
        mkdir('../../images');
    } elseif (file_exists($imagemAntiga)) {
        unlink($imagemAntiga);
    }
    move_uploaded_file($_FILES['imagem']['tmp_name'], '../../images/' . $new_file_name);

    return $new_file_name;
}
?>