<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Administrador | Fagga</title>
        <link rel="stylesheet" type="text/css" href="css/home.css" />
        <script src="js/jquery-2.1.3.js"></script>
        <script src="js/index.js"></script>
    </head>
    <body>
        <div class="login">
            <figure class="avatar">
                <img src="http://www.portalgl.com.br/imagens/logo_glevents.png" alt="Nome avatar" />
            </figure>
            <form class="form-home" id="frmTrocarSenha">
                <label class="novaSenha">Digite seu e-mail:</label>
                <fieldset>                    
                    <input type="text" name="email" id="email" class="login"/><br />
                </fieldset>
                <input type="button" value="Enviar" id="btnTrocarSenha"/>
                <input type="button" value="voltar" onclick="location.href='index.php';" class="voltarHome"/> 
                <span id="spanEmail" class="erro" style="margin-top: 10px"></span>
            </form>
        </div>        
    </body>
</html>
