<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/caravanas.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="#">Caravanas</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <!--h1>Últimas caravanas</h1-->
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td>Texto</td>
                        </tr>
                    </thead>
                    <tbody id="listaTexto"></tbody>
                </table>
                <hr/>
                <h1>Cadastrar texto</h1>
                <form name="cadTexto" class="tableform">
                    <table>
                        <tr>
                            <td>Texto de apresentação:</td>
                            <td>
                                <textarea id="texto" name="texto"></textarea><br />
                                <span id="spanTexto" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrarTexto" value="Cadastrar" /></td>
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
