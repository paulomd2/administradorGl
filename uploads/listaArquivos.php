<?php

require_once 'control/controleUpload.php';
$pasta = $_GET['pasta'];
$caminho = '../arquivos/' . $pasta;

//echo $url =  "http://".$_SERVER['SERVER_NAME'];
$raiz = explode('/', $_SERVER['REQUEST_URI']);
$raiz = $raiz[1];

$arquivos = lista($caminho);
@$arquivos = $arquivos['arquivos'];

$caminho = 'http://' . $_SERVER["SERVER_NAME"] . '/' . $raiz . '/arquivos/' . $pasta;

for ($i = 0; $i < count($arquivos); $i++) {
    $url = $caminho . '/' . $arquivos[$i];
    $extensao = strtolower(strrchr($arquivos[$i], '.'));
    $icone = '';
    if ($extensao == '.jpeg' || $extensao == '.jpg' || $extensao == '.bmp' || $extensao == '.gif' || $extensao == '.png') {
        $icone = '<a href="' . $url . '" target="_blank"><img src="../arquivos/' . $pasta . '/' . $arquivos[$i] . '" style="width:150px" /></a>';
    }elseif($extensao == '.doc' || $extensao == '.docx'){
        $icone = '<a href="' . $url . '" target="_blank"><img src="../imagens/iconWord.png" style="width:150px" /></a>';
    }elseif($extensao == '.xls' || $extensao == '.xla'){
        $icone = '<a href="' . $url . '" target="_blank"><img src="../imagens/iconExcell.png" style="width:150px" /></a>';
    }elseif($extensao == '.ppt' || $extensao == '.pps'){
        $icone = '<a href="' . $url . '" target="_blank"><img src="../imagens/iconPowerPoint.png" style="width:150px" /></a>';
    }elseif($extensao == '.pdf'){
        $icone = '<a href="' . $url . '" target="_blank"><img src="../imagens/iconPdf.png" style="width:150px" /></a>';
    }

    echo '
            <tr>
                <td>' . $icone . '<br />' . $url . '</td>
                <td><a href="javascript:delArquivo(\'' . $pasta . '\',\'' . $arquivos[$i] . '\')">Excluir</td>
            </tr>';
}