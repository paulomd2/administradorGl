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
                <div id="bannersBusca">
            ';

        for ($i = 0; $i < count($conteudo); $i++) {
            echo '
                    <li id="recordsArray_' . $conteudo[$i]["idBanner"] . '">
                        <div class = "lista_banner">
                            <img src = "../images/' . $conteudo[$i]["imagem"] . '" alt = "' . $conteudo[$i]["nome"] . '" title = "' . $conteudo[$i]["nome"] . '" width = "300" style = "float: left; margin-right: 10px;"/>
                            <span>' . $conteudo[$i]["nome"] . '</span><br/>
                            <a href="altBanner.php?id=' . $conteudo[$i]['idBanner'] . '">Alterar</a> | <a href="javascript:delBannerBusca(' . $conteudo[$i]["idBanner"] . ',\'' . $busca . '\')">Excluir</a>
                            </a>
                        </div>
                    </li>';
        }
        
        echo '</div>';
        break;


    case 'expositores':
        require_once '../expositores/model/dao.php';
        echo '<script src="../expositores/js/expositores.js"></script>';

        $objExpositor->setNome($busca);

        $conteudo = $objExpositorDao->busca($objExpositor);

        echo '
                <table class = "tableAll">
                    <thead>
                        <tr>
                            <td style = "width: 50%;">Nome</td>
                            <td style = "width: 30%;">Imagem</td>
                            <td style = "width: 10%;">Alterar</td>
                            <td style = "width: 10%;">Excluir</td>
                        </tr>
                    </thead>
            ';

        for ($i = 0; $i < count($conteudo); $i++) {
            echo '
                    <tbody>
                        <tr>
                            <td>' . $conteudo[$i]["nome"] . '</td>
                            <td> <img src="../images/'.$conteudo[$i]["imagem"].'" width="100" />  </td>
                            <td><a href="../expositores/altExpositor.php?id=' . $conteudo[$i]["idExpositor"] . '">Alterar</a></td>
                            <td><a href="javascript:delExpositorBusca(' . $conteudo[$i]["idExpositor"] . ',\'' . $busca . '\')">Excluir</a></td>
                        </tr>';
        }
        break;
        
    case 'caravanas':
        require_once '../caravanas/model/dao.php';
        echo '<script src="../caravanas/js/caravanas.js"></script>';

        $objCaravana->setNome($busca);

        $conteudo = $objCaravanaDao->busca($objCaravana);

        echo '
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 30%;">nome</td>
                            <td style="width: 25%;">responsável</td>
                            <td style="width: 25%;">local</td>
                            <td style="width: 10%;">alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>
            ';

        for ($i = 0; $i < count($conteudo); $i++) {
            echo '
                    <tbody>
                        <tr>
                            <td>' . $conteudo[$i]["nome"] . '</td>
                            <td>'.$conteudo[$i]["responsavel"].'</td>
                            <td>'.$conteudo[$i]["cidade"].' - '.$conteudo[$i]["estado"].'</td>
                            <td><a href="../caravanas/altCaravana.php?id=' . $conteudo[$i]["idCaravana"] . '">Alterar</a></td>
                            <td><a href="javascript:delCaravanaBusca(' . $conteudo[$i]["idCaravana"] . ',\'' . $busca . '\')">Excluir</a></td>
                        </tr>';
        }
        break;
}
?>
</tbody>
</table>