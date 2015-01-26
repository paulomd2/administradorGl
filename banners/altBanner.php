<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <!--<script type="text/javascript" src="../js/jquery-2.1.3.js"></script>-->
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/banners.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
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
                <a href="./">Banners</a>
            </div>
            <div class="tenor">
                <h1>Alterar Banner</h1>
                <div>
                    <?php
                    $idBanner = $_GET['id'];

                    if (isset($_GET['errorId'])) {
                        echo '<span class="erro" style="display: inline-block !important">A imagem deve ser menor que 500Kb</span>';

                        $explode = explode('|', $_GET['data']);

                        $banner['idBanner'] = $idBanner;
                        $banner['imagem'] = $explode[0];
                        $banner['nome'] = $explode[1];
                        $banner['link'] = $explode[2];
                        $banner['target'] = $explode[3];
                        $banner['status'] = $explode[4];
                        $banner['dataPublicacao'] = implode('-', array_reverse(explode('/', $explode[5])));
                        $banner['dataSaida'] = implode('-', array_reverse(explode('/', $explode[6])));
                    } else {
                        require_once '../model/banco.php';
                        require_once 'model/dao.php';

                        $objBanner->setIdBanner($idBanner);

                        $banner = $objBannersDao->listaBanners1($objBanner);
                    }
                    ?>
                    <form id="altBanner" enctype="multipart/form-data" action="control/controleBanners.php" method="post">
                        <input type="hidden" name="idBanner" value="<?php echo $banner['idBanner']; ?>" />
                        <input type="hidden" name="opcao" value="alterar" />
                        <input type="hidden" name="imagemAntiga" value="<?php echo $banner['imagem']; ?>" />
                        <table>
                            <tr>
                                <td>Nome:</td>
                                <td>
                                    <input type="text" name="nome" id="nome" value="<?php echo $banner['nome']; ?>" /><br />
                                    <span id="spanNome" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Link:</td>
                                <td>
                                    <input type="text" name="link" id="link" value="<?php echo $banner['link']; ?>" /><br />
                                    <span id="spanLink" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Target:</td>
                                <td>
                                    <select id="target" name="target">
                                        <option value="">Selecione um target...</option>
                                        <option value="1" <?php
                                        if ($banner['target'] == 1) {
                                            echo 'selected';
                                        }
                                        ?>>Abrir na mesma página</option>
                                        <option value="2" <?php
                                        if ($banner['target'] == 2) {
                                            echo 'selected';
                                        }
                                        ?>>Abrir em outra página</option>
                                    </select><br />
                                    <span class="erro" id="spanTarget"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>

                                    <select id="status" name="status">
                                        <option value="">Selecione um Status...</option>
                                        <option value="1" <?php
                                        if ($banner['status'] == 1) {
                                            echo 'selected';
                                        }
                                        ?> >Publicado</option>
                                        <option value="2" <?php
                                        if ($banner['status'] == 2) {
                                            echo 'selected';
                                        }
                                        ?>>Revisão</option>
                                    </select><br />
                                    <span class="erro" id="spanStatus"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Data de Publicação:</td>
                                <td>
                                    <input type="date" id="dataPublicacao" value="<?php echo $banner['dataPublicacao']; ?>" name="dataPublicacao" />
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
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                    </select>
                                    <br />
                                </td>
                            </tr>
                            <tr>
                                <td>Data de Saída:</td>
                                <td>
                                    <input type="date" id="dataSaida" value="<?php echo $banner['dataSaida']; ?>" name="dataSaida" />
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
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Imagem:</td>
                                <td>
                                    <input type="file" name="imagem" id="imagem" /><br />
                                    <span class="erro" id="spanImagem"></span><br />
                                    <img src="../images/<?php echo $banner['imagem']; ?>" width="100" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="button" id="btnAlterar" value="Enviar" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
