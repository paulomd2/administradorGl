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
                    <td>Título</td>
                    <td>Link</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
                <tbody class="listaMenus">
                    <?php
                        require_once '../model/banco.php';
                        require_once 'model/dao.php';

                        $menus = $objMenuDao->listaMenus();
                        for ($i = 1; $i < count($menus); $i++) {
                        echo '<tr>
                                <td>' . $menus[$i]["titulo"] . '</td>
                                <td>' . $menus[$i]["link"] . '</td>
                                <td><a href="altMenu.php?id=' . $menus[$i]['idMenu'] . '">Alterar</a></td>
                                <td><a href="javascript:delMenu(' . $menus[$i]["idMenu"] . ')">Excluir</a></td>
                            </tr>';
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </body>
</html>