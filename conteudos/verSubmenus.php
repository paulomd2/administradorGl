<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
    </head>
    <body>
        <div>
            <table>
                <tr>
                    <td>Título do Menu</td>
                    <td>Título da Página</td>
                    <td>Link Externo</td>
                    <td>Target</td>
                    <td>Status</td>
                    <td>Texto</td>
                    <td>Título da Metatag</td>
                    <td>Keywords da Metatag</td>
                    <td>Descrição da Metatag</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
                <tbody id="listaSubmenus">
                    <?php
                        require_once '../model/banco.php';
                        require_once 'model/dao.php';
                        
                        $submenus = $objConteudoDao->listaSubmenus($_GET['id']);
                        for ($i = 1; $i < count($submenus); $i++) {
                        echo '<tr>
                                <td>' . $submenus[$i]["tituloMenu"] . '</td>
                                <td>' . $submenus[$i]["tituloPagina"] . '</td>
                                <td>' . $submenus[$i]["link"] . '</td>
                                <td>' . $submenus[$i]["target"] . '</td>
                                <td>' . $submenus[$i]["status"] . '</td>
                                <td>' . $submenus[$i]["texto"] . '</td>
                                <td>' . $submenus[$i]["tituloMetaTag"] . '</td>
                                <td>' . $submenus[$i]["keywordMetaTag"] . '</td>
                                <td>' . $submenus[$i]["descricaoMetaTag"] . '</td>
                                <td><a href="altSubmenu.php?id=' . $submenus[$i]['idSubmenu'] . '">Alterar</a></td>
                                <td><a href="javascript:delSubmenu(' . $submenus[$i]["idSubmenu"] . ')">Excluir</a></td>
                            </tr>';
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </body>
</html>