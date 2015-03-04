<?php
session_start();
setcookie("ck_authorized", "true", 0, "/");
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../usuarios/js/usuario.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
        <script src="../plugin/ckfinder/ckfinder.js"></script>
    </head>
    <body>
        <?php
        include_once '../include/header.php';
        include_once '../include/lateral.php';
        require_once '../model/banco.php';
        require_once '../usuarios/model/dao.php';
        
        $objUsuario->setIdUsuario($_SESSION['id']);
        $usuario = $objUsuarioDao->verUsuario1($objUsuario);
        ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Editar Usuário</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Editar usuário</h1>
                <form>
                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['id']; ?>" />
                    <input type="hidden" name="nivel" id="nivel" value="<?php echo $_SESSION['nivel']; ?>" />
                    <table class="tableform">
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" maxlength="19" value="<?php echo $usuario['nome']; ?>" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail:</td>
                            <td>
                                <input type="text" name="email" id="email" value="<?php echo $usuario['email']; ?>" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Usuário:</td>
                            <td>
                                <input type="text" name="usuario" id="usuario" value="<?php echo $usuario['usuario']; ?>" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Senha:</td>
                            <td>
                                <input type="password" name="senha" id="senha" /><br />
                                <input type="hidden" name="senhaAntiga" id="senhaAntiga" value="<?php echo $usuario['senha']; ?>" />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnAlterarUsuarioHome" value="Alterar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
