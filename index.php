<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="usuarios/js/usuario.js"></script>
    </head>
    <body>
        <div>
            <form name="login">
                <table>
                    <tr>
                        <td>Login:</td>
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
                        <td colspan="2"><input type="button" id="btnLogar" value="Logar" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>