<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/banners.js"></script>
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
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="./">Banner</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Últimos Banners</h1>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 20%;">Nome</td>
                            <td style="width: 60%;">Imagem</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>

                    <tbody id="listaBanners"></tbody>
                </table>
                <a href="verBanners.php" class="proPage">Ver todos os banners</a>
                <hr/>
                <h1>Cadastrar Banner</h1>
                <form enctype="multipart/form-data" action="control/controleBanners.php" method="post" id="cadBanner">
                    <input type="hidden" name="opcao" value="alterar" />
                    <table>
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Link:</td>
                            <td>
                                <input type="text" name="link" id="link" /><br />
                                <span id="spanLink" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Target:</td>
                            <td>
                                <select id="target" name="target">
                                    <option value="">Selecione um target...</option>
                                    <option value="1">Abrir na mesma página</option>
                                    <option value="2">Abrir em outra página</option>
                                </select><br />
                                <span class="erro" id="spanTarget"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>

                                <select id="status" name="status">
                                    <option value="">Selecione um Status...</option>
                                    <option value="1">Publicado</option>
                                    <option value="2">Revisão</option>
                                </select><br />
                                <span class="erro" id="spanStatus"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Publicação:</td>
                            <td>
                                <input type="datetime-local" name="dataPublicacao" id="dataPublicacao" /><br />
                                <span class="erro" id="spanDataPublicacao"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Saída:</td>
                            <td>
                                <input type="datetime-local" name="dataSaida" id="dataSaida" /><br />
                                <span class="erro" id="spanDataSaida"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Imagem:</td>
                            <td>
                                <input type="file" name="imagem" id="imagem" /><br />
                                <span class="erro" id="spanImagem"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrar" value="Enviar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--script src='../plugin/romeDateTimePicker/example/example.js'></script-->
    </body>
</html>