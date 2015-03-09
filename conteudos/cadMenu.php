<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>
        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Conteúdo</a>
                <a href="#">Cadastrar menu</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Cadastrar menu</h1>
                <form name="cadMenu">
                    <table class="tableform">
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" name="titulo" id="titulo" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Link:</td>
                            <td>
                                <input type="text" name="link" id="link" />
                            </td>
                        </tr>
                        <tr>
                            <td>Target:</td>
                            <td>
                                <select name="target" id="target">
                                    <option value="">Selecione um target...</option>
                                    <option value="_self">Abrir na mesma página</option>
                                    <option value="_blank">Abrir em outra página</option>
                                </select><br />
                                <span id="spanTarget" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Lingua:</td>
                            <td>
                                <input type="radio" name="lingua" id="pt" value="pt" checked /> <label for="pt">Português</label>
                                <input type="radio" name="lingua" id="en" value="en" /> <label for="en">Inglês</label>
                                <input type="radio" name="lingua" id="es" value="es" /> <label for="es">Espanhol</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrarMenu" value="Enviar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>