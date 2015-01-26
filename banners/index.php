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

            rome(left, {
                dateValidator: rome.val.beforeEq(right)
            });
            rome(right, {
                dateValidator: rome.val.afterEq(left)
            });
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
                    <table class="tableform">
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
                                <input type="date" name="dataPublicacao" id="dataPublicacao" /><select id="horaPublicacao">
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                    </select>:
                                    <select id="minutoPublicacao">
                                        <option value="00">00</option>
                                        <option value="22">15</option>
                                        <option value="23">30</option>
                                        <option value="24">45</option>
                                    </select><br />
                                <span class="erro" id="spanDataPublicacao"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Saída:</td>
                            <td>
                                <input type="date" name="dataSaida" id="dataSaida" />
                                <select id="horaSaida">
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                    </select>:
                                    <select id="minutoSaida">
                                        <option value="00">00</option>
                                        <option value="22">15</option>
                                        <option value="23">30</option>
                                        <option value="24">45</option>
                                    </select><br />
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
    </body>
</html>