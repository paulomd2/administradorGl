<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/palestrantes.js"></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <!-- polyfiller file to detect and load polyfills -->
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
        <script>
            webshims.setOptions('waitReady', false);
            webshims.setOptions('forms-ext', {types: 'date'});
            webshims.polyfill('forms forms-ext');
        </script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Palestrantes</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Últimos Palestrantes</h1>
                <a href="cadPalestrante.php" class="proPage">Cadastrar Palestrantes</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>Imagem</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaExpositores"></tbody>
                </table>
                <hr/>
                <h1>Cadastrar Palestrantes</h1>
                <form name="cadPalestrante" id="cadPalestrante" action="control/controlePalestrantes.php" enctype="multipart/form-data" method="post" class="tableform">
                    <input type="hidden" value="cadastrar" name="opcao" id="opcao" />
                    <table class="tableform">
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Cargo:</td>
                            <td>
                                <input type="text" name="cargo" id="cargo" /><br />
                                <span id="spanCargo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Currículo:</td>
                            <td>
                                <textarea name="curriculo" id="curriculo"></textarea><br />
                                <span id="spanEstande" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Imagem:</td>
                            <td>
                                <input type="file" name="imagem" id="imagem" /><br />
                                <span id="spanImagem" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select id="status" name="status">
                                    <option value="" selected>Selecione um status...</option>
                                    <option value="1">Habilitado</option>
                                    <option value="2">Desabilitado</option>
                                </select><br />
                                <span id="spanStatus" class="erro"></span>
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
