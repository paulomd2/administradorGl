<?php
session_start();

if ($_SESSION['nivel'] != 1) {
    header('Location: ../home');
}
?>
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
                <h1>Últimos usuários</h1>
                <a href="verUsuarios.php" class="proPage">Ver todos os usuários</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Email</td>
                            <td>Usuário</td>
                            <td>Nível</td>
                            <td>Alterar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaUsuarios"></tbody>
                </table>
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
                            <td>
                                Status:
                            </td>
                            <td>
                                <select id="status" name="status">
                                    <option selected>Selecione um status...</option>
                                    <option value="1">Habilitado</option>
                                    <option value="2">Desabilitado</option>
                                </select><br />
                                <span class="erro" id="spanStatus"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrarUsuario" value="Cadastrar" /></td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </body>
</html>
