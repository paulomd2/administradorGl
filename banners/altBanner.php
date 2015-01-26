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

                <?php
                require_once '../model/banco.php';
                require_once 'model/dao.php';

                $idBanner = $_GET['id'];

                $objBanner->setIdBanner($idBanner);

                $banner = $objBannersDao->listaBanners1($objBanner);
                ?>
                <div>
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
                                <td><input type="datetime-local" id="dataPublicacao" value="<?php echo str_replace(' ', 'T', $banner['dataPublicacao']); ?>" name="dataPublicacao" /></td>
                            </tr>
                            <tr>
                                <td>Data de Saída:</td>
                                <td><input type="datetime-local" id="dataSaida" value="<?php echo str_replace(' ', 'T', $banner['dataSaida']); ?>" name="dataSaida" /></td>
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
