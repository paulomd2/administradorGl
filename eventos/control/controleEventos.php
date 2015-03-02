<?php

require_once '../../model/banco.php';
require_once '../model/dao.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case "cadastrar":
        $titulo = $_POST['titulo'];
        $nome = $_POST['nome'];
        $dataInicio = $_POST['dataInicio'];
        $dataFim = $_POST['dataFim'];
        $dataCadastro = date('Y-m-d H:i:s');
        $texto = $_POST['texto'];
        $tituloMetaTag = $_POST['tituloMetaTag'];
        $keywordsMetatag = $_POST['keywordsMetaTag'];
        $descricaoMetaTag = $_POST['descricaoMetaTag'];
        $status = $_POST['status'];

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
        $objEvento->setStatus($status);

        $objEventoDao->cadEvento($objEvento);
        echo "<script>window.location='../verEventos.php?d=proximo'</script>";
        break;

    case 'alterar':
        $idEvento = $_POST['idEvento'];
        $titulo = $_POST['titulo'];
        $nome = $_POST['nome'];
        $dataInicio = $_POST['dataInicio'];
        $dataFim = $_POST['dataFim'];
        $texto = $_POST['texto'];
        $tituloMetaTag = $_POST['tituloMetaTag'];
        $keywordsMetatag = $_POST['keywordsMetaTag'];
        $descricaoMetaTag = $_POST['descricaoMetaTag'];
        echo $status = $_POST['status'];

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
        $objEvento->setImagem($imagem);
        $objEvento->setTexto($texto);
        $objEvento->setTituloMetaTag($tituloMetaTag);
        $objEvento->setKeywordsMetatag($keywordsMetatag);
        $objEvento->setDescricaoMetaTag($descricaoMetaTag);
        $objEvento->setStatus($status);

        $objEventoDao->altEvento($objEvento);

        if($dataFim >= date('Y-m-d H:i:s')){
            echo "<script>window.location='../verEventos.php?d=proximo'</script>";    
        }else{
            echo "<script>window.location='../verEventos.php?d=anterior'</script>";
        }

        break;

    case 'excluir':
        $idEvento = $_POST['idEvento'];

        $objEvento->setIdEvento($idEvento);

        $objEventoDao->delEvento($objEvento);
        break;
    
    
    case 'ordena':
        $updateRecordsArray = $_POST['recordsArray'];

        $listingCounter = 1;
        foreach ($updateRecordsArray as $recordIDValue) {
            $objEventoDao->ordenaEventos($listingCounter, $recordIDValue);
            $listingCounter++;
        }

        break;
}

function uploadImagem() {

    $valido = true;
    $tipoArquivo = pathinfo($_FILES['imagem']['name']);
    $tipoArquivo = '.' . $tipoArquivo['extension'];

    $new_file_name = strtolower(md5(date('d/m/Y/H:i:s'))) . $tipoArquivo;
    if ($_FILES['imagem']['size'] > (1048576)) { //não pode ser maior que 1Mb
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
