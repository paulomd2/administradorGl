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
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="./">Banners</a>
                <a href="#">Alterar banner</a>
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
                    
                    $explodeEntrada = explode(':',$banner['horaPublicacao']);
                    
                    $horaEntrada = $explodeEntrada[0];
                    $minutoEntrada = $explodeEntrada[1];
                    
                    $explodeSaida = explode(':',$banner['horaSaida']);
                    $horaSaida = $explodeSaida[0];
                    $minutoSaida = $explodeSaida[1];
                    ?>
                    <form id="altBanner" enctype="multipart/form-data" action="control/controleBanners.php" method="post">
                        <input type="hidden" name="idBanner" value="<?php echo $banner['idBanner']; ?>" />
                        <input type="hidden" name="opcao" value="alterar" />
                        <input type="hidden" name="imagemAntiga" value="<?php echo $banner['imagem']; ?>" />
                        <table class="tableform">
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
                                        ?> >Habilitado</option>
                                        <option value="2" <?php
                                        if ($banner['status'] == 2) {
                                            echo 'selected';
                                        }
                                        ?>>Desabilitado</option>
                                    </select><br />
                                    <span class="erro" id="spanStatus"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Data de Publicação:</td>
                                <td>
                                    <input type="date" id="dataPublicacao" value="<?php echo $banner['dataPublicacao']; ?>" name="dataPublicacao" />
                                    <select id="horaPublicacao" name="horaPublicacao">
                                        <option value="00" <?php if($horaEntrada == '00'){ echo 'selected'; } ?>>00</option>
                                        <option value="01" <?php if($horaEntrada == '01'){ echo 'selected'; } ?>>01</option>
                                        <option value="02" <?php if($horaEntrada == '02'){ echo 'selected'; } ?>>02</option>
                                        <option value="03" <?php if($horaEntrada == '03'){ echo 'selected'; } ?>>03</option>
                                        <option value="04" <?php if($horaEntrada == '04'){ echo 'selected'; } ?>>04</option>
                                        <option value="05" <?php if($horaEntrada == '05'){ echo 'selected'; } ?>>05</option>
                                        <option value="06" <?php if($horaEntrada == '06'){ echo 'selected'; } ?>>06</option>
                                        <option value="07" <?php if($horaEntrada == '07'){ echo 'selected'; } ?>>07</option>
                                        <option value="08" <?php if($horaEntrada == '08'){ echo 'selected'; } ?>>08</option>
                                        <option value="09" <?php if($horaEntrada == '09'){ echo 'selected'; } ?>>09</option>
                                        <option value="10" <?php if($horaEntrada == '10'){ echo 'selected'; } ?>>10</option>
                                        <option value="11" <?php if($horaEntrada == '11'){ echo 'selected'; } ?>>11</option>
                                        <option value="12" <?php if($horaEntrada == '12'){ echo 'selected'; } ?>>12</option>
                                        <option value="13" <?php if($horaEntrada == '13'){ echo 'selected'; } ?>>13</option>
                                        <option value="14" <?php if($horaEntrada == '14'){ echo 'selected'; } ?>>14</option>
                                        <option value="15" <?php if($horaEntrada == '15'){ echo 'selected'; } ?>>15</option>
                                        <option value="16" <?php if($horaEntrada == '16'){ echo 'selected'; } ?>>16</option>
                                        <option value="17" <?php if($horaEntrada == '17'){ echo 'selected'; } ?>>17</option>
                                        <option value="18" <?php if($horaEntrada == '18'){ echo 'selected'; } ?>>18</option>
                                        <option value="19" <?php if($horaEntrada == '19'){ echo 'selected'; } ?>>19</option>
                                        <option value="20" <?php if($horaEntrada == '20'){ echo 'selected'; } ?>>20</option>
                                        <option value="21" <?php if($horaEntrada == '21'){ echo 'selected'; } ?>>21</option>
                                        <option value="22" <?php if($horaEntrada == '22'){ echo 'selected'; } ?>>22</option>
                                        <option value="23" <?php if($horaEntrada == '23'){ echo 'selected'; } ?>>23</option>
                                        <option value="24" <?php if($horaEntrada == '24'){ echo 'selected'; } ?>>24</option>
                                    </select>:
                                    <select id="minutoPublicacao" name="minutoPublicacao">
                                        <option value="00" <?php if($minutoEntrada == '00'){ echo 'selected'; } ?>>00</option>
                                        <option value="15" <?php if($minutoEntrada == '15'){ echo 'selected'; } ?>>15</option>
                                        <option value="30" <?php if($minutoEntrada == '30'){ echo 'selected'; } ?>>30</option>
                                        <option value="45" <?php if($minutoEntrada == '45'){ echo 'selected'; } ?>>45</option>
                                    </select>
                                    <br />
                                </td>
                            </tr>
                            <tr>
                                <td>Data de Saída:</td>
                                <td>
                                    <input type="date" id="dataSaida" value="<?php echo $banner['dataSaida']; ?>" name="dataSaida" />
                                    <select id="horaSaida" name="horaSaida">
                                        <option value="00" <?php if($horaSaida == '00'){ echo 'selected'; } ?>>00</option>
                                        <option value="01" <?php if($horaSaida == '01'){ echo 'selected'; } ?>>01</option>
                                        <option value="02" <?php if($horaSaida == '02'){ echo 'selected'; } ?>>02</option>
                                        <option value="03" <?php if($horaSaida == '03'){ echo 'selected'; } ?>>03</option>
                                        <option value="04" <?php if($horaSaida == '04'){ echo 'selected'; } ?>>04</option>
                                        <option value="05" <?php if($horaSaida == '05'){ echo 'selected'; } ?>>05</option>
                                        <option value="06" <?php if($horaSaida == '06'){ echo 'selected'; } ?>>06</option>
                                        <option value="07" <?php if($horaSaida == '07'){ echo 'selected'; } ?>>07</option>
                                        <option value="08" <?php if($horaSaida == '08'){ echo 'selected'; } ?>>08</option>
                                        <option value="09" <?php if($horaSaida == '09'){ echo 'selected'; } ?>>09</option>
                                        <option value="10" <?php if($horaSaida == '10'){ echo 'selected'; } ?>>10</option>
                                        <option value="11" <?php if($horaSaida == '11'){ echo 'selected'; } ?>>11</option>
                                        <option value="12" <?php if($horaSaida == '12'){ echo 'selected'; } ?>>12</option>
                                        <option value="13" <?php if($horaSaida == '13'){ echo 'selected'; } ?>>13</option>
                                        <option value="14" <?php if($horaSaida == '14'){ echo 'selected'; } ?>>14</option>
                                        <option value="15" <?php if($horaSaida == '15'){ echo 'selected'; } ?>>15</option>
                                        <option value="16" <?php if($horaSaida == '16'){ echo 'selected'; } ?>>16</option>
                                        <option value="17" <?php if($horaSaida == '17'){ echo 'selected'; } ?>>17</option>
                                        <option value="18" <?php if($horaSaida == '18'){ echo 'selected'; } ?>>18</option>
                                        <option value="19" <?php if($horaSaida == '19'){ echo 'selected'; } ?>>19</option>
                                        <option value="20" <?php if($horaSaida == '20'){ echo 'selected'; } ?>>20</option>
                                        <option value="21" <?php if($horaSaida == '21'){ echo 'selected'; } ?>>21</option>
                                        <option value="22" <?php if($horaSaida == '22'){ echo 'selected'; } ?>>22</option>
                                        <option value="23" <?php if($horaSaida == '23'){ echo 'selected'; } ?>>23</option>
                                        <option value="24" <?php if($horaSaida == '24'){ echo 'selected'; } ?>>24</option>
                                    </select>:
                                    <select id="minutoSaida" name="minutoSaida">
                                        <option value="00" <?php if($minutoSaida == '00'){ echo 'selected'; } ?>>00</option>
                                        <option value="15" <?php if($minutoSaida == '15'){ echo 'selected'; } ?>>15</option>
                                        <option value="30" <?php if($minutoSaida == '30'){ echo 'selected'; } ?>>30</option>
                                        <option value="45" <?php if($minutoSaida == '45'){ echo 'selected'; } ?>>45</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Imagem:</td>
                                <td>
                                    <input type="file" name="imagem" id="imagem" /><br />
                                    <span class="erro" id="spanImagem"></span><br />
                                    <img src="../images/<?php echo $banner['imagem']; ?>" width="180" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="button" id="btnAlterar" value="Alterar" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
