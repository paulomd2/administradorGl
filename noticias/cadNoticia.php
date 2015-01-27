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
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/noticias.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="index.php">Notícias</a>
                <a href="#">Cadastrar notícia</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Cadastrar notícia</h1>
                <a href="verNoticias.php" class="proPage">Todas as notícias</a>
                <form name="cadNoticia">
                    <input type="hidden" value="<?php echo $_GET['mercado']; ?>" id="mercado"/>
                    <table class="tableform">
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" name="titulo" id="titulo" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Sub-título:</td>
                            <td>
                                <input type="text" name="sub" id="sub" /><br />
                                <span id="spanSub" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Fonte:</td>
                            <td>
                                <input type="text" name="fonte" id="fonte" /><br />
                                <span id="spanFonte" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Publicação:</td>
                            <td>
                                <input type="text" name="publicacao" id="publicacao" /><br />
                                <span id="spanPublicacao" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Texto:</td>
                            <td>
                                <textarea name="texto" id="texto" rows="10" cols="40"></textarea>
                                <span id="spanTexto" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="mercado">Notícia de Mercado?</label></td>
                            <td><input type="checkbox" value="1" id="mercado" name="mercado" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrar" value="Cadastrar" /></td>
                        </tr>
                    </table>
                </form>                

                <script>
                    CKEDITOR.replace('texto', {
                        uiColor: '#dfdfdf',
                        filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
                    });
                </script>
            </div>
        </div>
    </body>
</html>
