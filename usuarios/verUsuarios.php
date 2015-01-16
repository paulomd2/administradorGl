<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/usuario.js"></script>
    </head>
    <body>
        <div>
            <form name="cadUsuario">
                <table>
                    <tr>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Usuário</td>
                        <td>Nível</td>
                        <td>Status</td>
                        <td>Criado em</td>
                        <td>Editar</td>
                        <td>Excluir</td>
                    </tr>
                    <tbody id="listaUsuarios">
                        <?php
                        require_once '../model/banco.php';
                        require_once 'model/dao.php';

                        $usuarios = $objUsuarioDao->verUsuarios();
                        for ($i = 1; $i < count($usuarios); $i++) {

                            echo '<tr>
                                    <td>' . $usuarios[$i]["nome"] . '</td>
                                    <td>' . $usuarios[$i]["email"] . '</td>
                                    <td>' . $usuarios[$i]["usuario"] . '</td>
                                    <td>' . $usuarios[$i]["nivel"] . '</td>
                                    <td>' . $usuarios[$i]["status"] . '</td>
                                    <td>' . $usuarios[$i]["dataCriacao"] . '</td>
                                    <td><a href="altUsuario.php?id=' . $usuarios[$i]['idUsuario'] . '">Alterar</a></td>
                                    <td><a href="javascript:delUsuario(' . $usuarios[$i]["idUsuario"] . ')">Excluir</a></td>
                                  </tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </body>
</html>