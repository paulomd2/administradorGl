<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/usuario.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="#">Usuário</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Últimos usuários registrados</h1>
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
                <a href="verUsuarios.php" class="proPage">Ver todos os usuários</a>
                <hr/>
                <h1>Cadastrar usuário</h1>
                <form name="cadUsuario" class="tableform">
                    <table>
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>
                                <input type="text" name="email" id="email" /><br />
                                <span id="spanEmail" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Usuário:</td>
                            <td>
                                <input type="text" name="usuario" id="usuario" /><br />
                                <span id="spanUsuario" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Senha:</td>
                            <td>
                                <input type="password" name="senha" id="senha" /><br />
                                <span id="spanSenha" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Nível:</td>
                            <td>
                                <select name="nivel" id="nivel">
                                    <option value="" selected>Escolha um nível...</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Editor</option>
                                </select><br />
                                <span id="spanNivel" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrar" value="Cadastrar" /></td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </body>
</html>
