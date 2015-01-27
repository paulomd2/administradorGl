<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case "cadastrar":
        $titulo = $_POST['titulo'];
        $nome = $_POST['nome'];
        $dataInicio = implode('-', array_reverse(explode('/', $_POST['dataInicio'])));
        $dataFim = implode('-', array_reverse(explode('/', $_POST['dataFim'])));
        $dataCadastro = date('Y-m-d H:i:s');
        $texto = $_POST['texto'];
        $tituloMetaTag = $_POST['tituloMetaTag'];
        $keywordsMetatag = $_POST['keywordsMetaTag'];
        $descricaoMetaTag = $_POST['descricaoMetaTag'];

        $imagem = uploadImagem();

        $objEvento->setTitulo($titulo);
        $objEvento->setNome($nome);
        $objEvento->setDataInicio($dataInicio);
        $objEvento->setDataFim($dataFim);
        $objEvento->setDataCadastro($dataCadastro);
        $objEvento->setImagem($imagem);
        $objEvento->setTexto($texto);
        $objEvento->setTituloMetaTag($tituloMetaTag);
        $objEvento->setKeywordsMetatag($keywordsMetatag);
        $objEvento->setDescricaoMetaTag($descricaoMetaTag);

        $objEventoDao->cadEvento($objEvento);
        echo "<script>window.location='../verEventos.php'</script>";
        break;

    case 'alterar':
        $idEvento = $_POST['idEvento'];
        $titulo = $_POST['titulo'];
        $nome = $_POST['nome'];
        $dataInicio = implode('-', array_reverse(explode('/', $_POST['dataInicio'])));
        $dataFim = implode('-', array_reverse(explode('/', $_POST['dataFim'])));
        $dataCadastro = date('Y-m-d H:i:s');
        $texto = $_POST['texto'];
        $tituloMetaTag = $_POST['tituloMetaTag'];
        $keywordsMetatag = $_POST['keywordsMetaTag'];
        $descricaoMetaTag = $_POST['descricaoMetaTag'];

        if ($_FILES['imagem']['name'] != '') {
            $imagem = uploadImagem();
        } else {
            $imagem = $_POST['imagemAntiga'];
        }

        $objEvento->setIdEvento($idEvento);
        $objEvento->setTitulo($titulo);
        $objEvento->setNome($nome);
        $objEvento->setDataInicio($dataInicio);
        $objEvento->setDataFim($dataFim);
        $objEvento->setDataCadastro($dataCadastro);
        $objEvento->setImagem($imagem);
        $objEvento->setTexto($texto);
        $objEvento->setTituloMetaTag($tituloMetaTag);
        $objEvento->setKeywordsMetatag($keywordsMetatag);
        $objEvento->setDescricaoMetaTag($descricaoMetaTag);

        $objEventoDao->altEvento($objEvento);

        echo "<script>window.location='../verEventos.php'</script>";
        break;

    case 'excluir':
        $idEvento = $_POST['idEvento'];

        $objEvento->setIdEvento($idEvento);

        $objEventoDao->delEvento($objEvento);
        break;
}

function uploadImagem() {

    $valido = true;
    $tipoArquivo = pathinfo($_FILES['imagem']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    $new_file_name = strtolower(md5(date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($_FILES['imagem']['size'] > (1024)) { //não pode ser maior que 1Mb
        $valido = false;
    } else {
        $imagemAntiga = '../../images/'.$_POST["imagemAntiga"];
        
        if (!file_exists('../../images/')) {
            mkdir('../../images');
        }elseif(file_exists($imagemAntiga)){
            unlink($imagemAntiga);
        }
        move_uploaded_file($_FILES['imagem']['tmp_name'], '../../images/' . $new_file_name);

        $valido = $new_file_name;
    }

    return $valido;
    
}
