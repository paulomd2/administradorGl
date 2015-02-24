<?php
require_once '../model/banco.php';

$modulo = $_GET['modulo'];
$busca = $_GET['busca'];

switch ($modulo) {
    case 'noticias':
        require_once '../noticias/model/dao.php';
        echo '<script src="../noticias/js/noticias.js"></script>';

        $objNoticia->setTitulo($busca);

        $conteudo = $objNoticiaDao->busca($objNoticia);

        echo '
                <table class = "tableAll">
                    <thead>
                        <tr>
                            <td style = "width: 60%;">Título</td>
                            <td style = "width: 20%;">Data de Publicação</td>
                            <td style = "width: 10%;">Alterar</td>
                            <td style = "width: 10%;">Excluir</td>
                        </tr>
                    </thead>
            ';

        for ($i = 0; $i < count($conteudo); $i++) {
            echo '
                    <tbody>
                        <tr>
                            <td>' . $conteudo[$i]["titulo"] . '</td>
                            <td>' . $conteudo[$i]["dataPublicacao"] . '</td>
                            <td><a href="../noticias/altNoticia.php?id=' . $conteudo[$i]["idNoticia"] . '">Alterar</a></td>
                            <td><a href="javascript:delNoticiaBusca(' . $conteudo[$i]["idNoticia"] . ',\'' . $busca . '\')">Excluir</a></td>
                        </tr>';
        }
        break;
    case 'releases':
        require_once '../releases/model/dao.php';
        echo '<script src="../releases/js/releases.js"></script>';

        $objRelease->setTitulo($busca);

        $conteudo = $objReleasesDao->busca($objRelease);

        echo '
                <table class = "tableAll">
                    <thead>
                        <tr>
                            <td style = "width: 60%;">Título</td>
                            <td style = "width: 20%;">Mês</td>
                            <td style = "width: 10%;">Alterar</td>
                            <td style = "width: 10%;">Excluir</td>
                        </tr>
                    </thead>
            ';

        for ($i = 0; $i < count($conteudo); $i++) {
            echo '
                    <tbody>
                        <tr>
                            <td>' . $conteudo[$i]["titulo"] . '</td>
                            <td>' . $conteudo[$i]["mes"] . '</td>
                            <td><a href="../releases/altRelease.php?id=' . $conteudo[$i]["idRelease"] . '">Alterar</a></td>
                            <td><a href="javascript:delReleaseBusca(' . $conteudo[$i]["idRelease"] . ',\'' . $busca . '\')">Excluir</a></td>
                        </tr>';
        }
        break;
    case 'eventos':
        require_once '../eventos/model/dao.php';
        echo '<script src="../eventos/js/eventos.js"></script>';

        $objEvento->setTitulo($busca);

        $conteudo = $objEventoDao->busca($objEvento);

        echo '
                <table class = "tableAll">
                    <thead>
                        <tr>
                            <td style = "width: 50%;">Título</td>
                            <td style = "width: 30%;">Data</td>
                            <td style = "width: 10%;">Alterar</td>
                            <td style = "width: 10%;">Excluir</td>
                        </tr>
                    </thead>
            ';

        for ($i = 0; $i < count($conteudo); $i++) {
            echo '
                    <tbody>
                        <tr>
                            <td>' . $conteudo[$i]["titulo"] . '</td>
                            <td>de ' . $conteudo[$i]["dataInicio"] . ' até ' . $conteudo[$i]["dataFim"] . '</td>
                            <td><a href="../eventos/altEvento.php?id=' . $conteudo[$i]["idEvento"] . '">Alterar</a></td>
                            <td><a href="javascript:delEventoBusca(' . $conteudo[$i]["idEvento"] . ',\'' . $busca . '\')">Excluir</a></td>
                        </tr>';
        }
        break;

    case 'destaques':
        require_once '../destaques/model/dao.php';
        echo '<script src="../destaques/js/destaque.js"></script>';

        $objDestaque->setTitulo($busca);

        $conteudo = $objDestaqueDao->busca($objDestaque);

        echo '
                <table class = "tableAll">
                    <thead>
                        <tr>
                            <td style = "width: 50%;">Título</td>
                            <td style = "width: 30%;">Data</td>
                            <td style = "width: 10%;">Alterar</td>
                            <td style = "width: 10%;">Excluir</td>
                        </tr>
                    </thead>
            ';

        for ($i = 0; $i < count($conteudo); $i++) {
            echo '
                    <tbody>
                        <tr>
                            <td>' . $conteudo[$i]["titulo"] . '</td>
                            <td>' . $conteudo[$i]["dataPublicacao"] . '</td>
                            <td><a href="../destaques/altDestaque.php?id=' . $conteudo[$i]["idDestaque"] . '">Alterar</a></td>
                            <td><a href="javascript:delDestaqueBusca(' . $conteudo[$i]["idDestaque"] . ',\'' . $busca . '\')">Excluir</a></td>
                        </tr>';
        }
        break;
        
        
        case 'banners':
        require_once '../banners/model/dao.php';
        echo '<script src="../banners/js/banners.js"></script>';

        $objBanner->setNome($busca);

        $conteudo = $objBannersDao->busca($objBanner);

        echo '
                <style>
                    .lista_banner{
                        width: 600px;
                        height: auto;
                        background: none;
                        border: 1px solid #a2a5a6;
                        border-radius: 5px;
                        margin-bottom: 10px;
                        background: white;
                        padding: 5px;
                        overflow: hidden;
                    }
                    .menu-conteudo span.titMenu{
                        font-size: 16px;
                        color: black;
                        display: block;
                    }
                    .menu-conteudo a{
                        display: inline-block;
                        font-size: 14px;
                        color: #3366ff;
                        text-decoration: none;
                    }
                    .menu-conteudo a:hover{
                        text-decoration: underline;
                    }
                    a.linkIcon{
                        color: #333;
                        text-decoration: none;
                    }
                    ul{
                        list-style: none;
                    }
                </style>
            ';

        for ($i = 0; $i < count($conteudo); $i++) {
            echo '
                    <li id="recordsArray_' . $conteudo[$i]["idBanner"] . '">
                        <div class = "lista_banner">
                            <img src = "../images/' . $conteudo[$i]["imagem"] . '" alt = "' . $conteudo[$i]["nome"] . '" title = "' . $conteudo[$i]["nome"] . '" width = "300" style = "float: left; margin-right: 10px;"/>
                            <span>' . $conteudo[$i]["nome"] . '</span><br/>
                            <a href="altBanner.php?id=' . $conteudo[$i]['idBanner'] . '">Alterar</a> | <a href="javascript:delBanner(' . $conteudo[$i]["idBanner"] . ')">Excluir</a>
                            </a>
                        </div>
                    </li>';
        }
        break;
}
?>
</tbody>
</table>