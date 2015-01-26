<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once 'http://localhost/githubpaulo/administradorGl/include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/usuario.js"></script>
    </head>
    <body>
        <?php include_once 'http://localhost/githubpaulo/administradorGl/include/header.php'; ?>
        <?php include_once 'http://localhost/githubpaulo/administradorGl/include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="#">Cadastrar usuário</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
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
