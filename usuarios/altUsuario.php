<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$objUsuario->setIdUsuario($_GET['id']);
$usuario = $objUsuarioDao->verUsuario1($objUsuario)
?>
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
                                <option value="1" <?php if($usuario['nivel'] == 1){ echo 'selected'; } ?>>Administrador</option>
                                <option value="2" <?php if($usuario['nivel'] == 2){ echo 'selected'; } ?> >Editor</option>
                            </select><br />
                            <span id="spanNivel" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" id="btnAlterar" value="Enviar" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>