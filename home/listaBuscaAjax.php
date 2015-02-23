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
                            <td>de ' . $conteudo[$i]["dataInicio"] . ' até '.$conteudo[$i]["dataFim"].'</td>
                            <td><a href="../eventos/altEvento.php?id=' . $conteudo[$i]["idEvento"] . '">Alterar</a></td>
                            <td><a href="javascript:delEventoBusca(' . $conteudo[$i]["idEvento"] . ',\'' . $busca . '\')">Excluir</a></td>
                        </tr>';
        }
        break;
}
?>
</tbody>
</table>