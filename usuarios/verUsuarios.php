<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/usuario.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Usuários</a>
                <a href="#">Usuários cadastrados</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Usuários cadastrados</h1>
                <form name="cadUsuario" >
                    <table class="tableAll">
                        <thead>
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
                        </thead>
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
                <a href="cadUsuario.php" class="proPage">Cadastrar usuário</a>
            </div>
        </div>
    </body>
</html>
