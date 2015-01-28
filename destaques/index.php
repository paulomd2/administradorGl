<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/noticias.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
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
                <a href="./">Destaques</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Últimos Destaques</h1>
                <!--<table style="font-size: 14px; width: 760px;">-->
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 60%;">Título</td>
                            <td style="width: 20%;">Data de Publicação</td>
                            <!--<td>Sub-título</td>-->
                            <!--<td>Fonte</td>-->
                            <!--<td>Texto</td>-->
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>

                    <tbody id="listaNoticias"></tbody>
                </table>
                <a href="verDestaques.php" class="proPage">Ver todos os destaques</a>

                <hr/>
                <h1>Cadastrar destaque</h1>
                <form name="cadDestaque">
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
                            <td>Link Externo:</td>
                            <td>
                                <input type="text" name="link" id="link" /><br />
                                <span id="spanLink" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Publicação:</td>
                            <td>
                                <input type="date" name="dataPublicacao" id="dataPublicacao" />
                                <select id="horaPublicacao" name="horaPublicacao">
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
                                    <select id="minutoPublicacao" name="minutoPublicacao">
                                        <option value="00">00</option>
                                        <option value="22">15</option>
                                        <option value="23">30</option>
                                        <option value="24">45</option>
                                    </select><br />
                                <span id="spanSaida" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Saída:</td>
                            <td>
                                <input type="date" name="dataSaida" id="dataSaida" />
                                <select id="horaSaida" name="horaSaida">
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
                                    <select id="minutoSaida" name="minutoSaida">
                                        <option value="00">00</option>
                                        <option value="22">15</option>
                                        <option value="23">30</option>
                                        <option value="24">45</option>
                                    </select><br />
                                <span id="spanPublicacao" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Conteudo:</td>
                            <td>
                                <textarea name="conteudo" id="conteudo" rows="10" cols="40"></textarea>
                                <span id="spanConteudo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="mercado">Imagem de Capa:</label></td>
                            <td><input type="file" id="imagem" name="imagem" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrar" value="Cadastrar" /></td>
                        </tr>
                    </table>
                </form>                

                <script>
                    CKEDITOR.replace('conteudo', {
                        uiColor: '#dfdfdf',
                        filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
                    });
                </script>
            </div>
        </div>
    </body>
</html>
