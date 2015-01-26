<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$objUsuario->setIdUsuario($_GET['id']);
$usuario = $objUsuarioDao->verUsuario1($objUsuario)
?>
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
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="verUsuarios.php">Usuários cadastrados</a>
                <a href="#">Alterar usuário</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Cadastrar usuário</h1>
                <form name="cadUsuario" class="tableform">
                    <input type="hidden" id="idUsuario" value="<?php echo $_GET['id']; ?>" />
                    <table>
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>
                                <input type="text" name="email" id="email" value="<?php echo $usuario['email']; ?>" /><br />
                                <span id="spanEmail" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Usuário:</td>
                            <td>
                                <input type="text" name="usuario" id="usuario" value="<?php echo $usuario['usuario']; ?>" /><br />
                                <span id="spanUsuario" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Senha:</td>
                            <td>
                                <input type="password" name="senha" id="senha" /><br />
                                <span id="spanSenha" class="erro"></span>
                                <input type="hidden" value="<?php echo $usuario['senha']; ?>" id="senhaAntiga" />
                            </td>
                        </tr>
                        <tr>
                            <td>Nível:</td>
                            <td>
                                <select name="nivel" id="nivel">
                                    <option value="">Escolha um nível...</option>
                                    <option value="1" <?php
                                    if ($usuario['nivel'] == 1) {
                                        echo 'selected';
                                    }
                                    ?>>Administrador</option>
                                    <option value="2" <?php
                                    if ($usuario['nivel'] == 2) {
                                        echo 'selected';
                                    }
                                    ?> >Editor</option>
                                </select><br />
                                <span id="spanNivel" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnAlterar" value="Alterar" /></td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </body>
</html>
