<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Administrador | Fagga</title>
        <link rel="stylesheet" type="text/css" href="css/home.css" />
    </head>
    <body>
        <div class="login">
            <figure class="avatar">
                <img src="http://www.portalgl.com.br/imagens/logo_glevents.png" alt="Nome avatar" />
            </figure>
            <form action="#" method="post" class="form-home" name="login">
                <fieldset>
                    <input type="text" name="usuario" id="usuario" class="login"/><br />
                    <span id="spanUsuario" class="erro"></span>
                </fieldset>
                <fieldset>
                    <input type="password" name="senha" id="senha" class="senha" /><br />
                </fieldset>
                <label class="recSenha">
                    <a href="home/">Esqueci minha senha</a>
                </label>
                <input type="submit" value="LOGAR" id="btnLogar"/>
            </form>
        </div>        
    </body>
</html>
