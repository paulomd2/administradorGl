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
        <!--<script type="text/javascript" src="../js/jquery-2.1.3.js"></script>-->
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/releases.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
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
                <a href="./">Releases</a>
                <a href="#">Alterar release</a>
            </div>
            <div class="tenor">
                <h1>Alterar release</h1>

                <?php
                require_once '../model/banco.php';
                require_once 'model/dao.php';

                $idRelease = $_GET['id'];

                $objRelease->setIdRelease($idRelease);

                $release = $objReleasesDao->verRelease1($objRelease);
                ?>
                <div>
                    <form name="cadRelease">
                        <input type="hidden" value="<?php echo $release['idRelease']; ?>" id="idRelease" />
                        <table class="tableform">
                            <tr>
                                <td>Título:</td>
                                <td>
                                    <input type="text" name="titulo" id="titulo" value="<?php echo $release['titulo']; ?>" /><br />
                                    <span id="spanTitulo" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Mês:</td>
                                <td>
                                    <select id="mes" name="mes">
                                        <option value="">Selecione um Mês...</option>
                                        <option value="1" <?php
                                        if ($release['mes'] == 1) {
                                            echo 'selected';
                                        }
                                        ?>>Janeiro</option>
                                        <option value="2" <?php
                                        if ($release['mes'] == 2) {
                                            echo 'selected';
                                        }
                                        ?>>Fevereiro</option>
                                        <option value="3" <?php
                                                if ($release['mes'] == 3) {
                                                    echo 'selected';
                                                }
                                                ?>>Março</option>
                                        <option value="4" <?php
                                        if ($release['mes'] == 4) {
                                            echo 'selected';
                                        }
                                        ?>>Abril</option>
                                        <option value="5" <?php
                                        if ($release['mes'] == 5) {
                                            echo 'selected';
                                        }
                                        ?>>Maio</option>
                                        <option value="6" <?php
                                                if ($release['mes'] == 6) {
                                                    echo 'selected';
                                                }
                                                ?>>Junho</option>
                                        <option value="7" <?php
                                        if ($release['mes'] == 7) {
                                            echo 'selected';
                                        }
                                        ?>>Julho</option>
                                        <option value="8" <?php
                                        if ($release['mes'] == 8) {
                                            echo 'selected';
                                        }
                                        ?>>Agosto</option>
                                        <option value="9" <?php
                                        if ($release['mes'] == 9) {
                                            echo 'selected';
                                        }
                                        ?>>Setembro</option>
                                        <option value="10" <?php
                                        if ($release['mes'] == 10) {
                                            echo 'selected';
                                        }
                                        ?>>Outubro</option>
                                        <option value="11" <?php
                                        if ($release['mes'] == 11) {
                                            echo 'selected';
                                        }
                                        ?>>Novembro</option>
                                        <option value="12" <?php
                                        if ($release['mes'] == 12) {
                                            echo 'selected';
                                        }
                                        ?>>Dezembro</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>

                                    <select id="status" name="status">
                                        <option value="">Selecione um Status...</option>
                                        <option value="1" <?php
                                        if ($release['status'] == 1) {
                                            echo 'selected';
                                        }
                                        ?> >Publicado</option>
                                        <option value="2" <?php
                                        if ($release['status'] == 2) {
                                            echo 'selected';
                                        }
                                        ?>>Revisão</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Texto:</td>
                                <td>
                                    <textarea name="texto" id="texto" rows="10" cols="40"><?php echo $release['texto']; ?></textarea>
                                    <span id="spanTexto" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Data de Publicação:</td>
                                <td><input type="date" id="dataPublicacao" value="<?php echo implode('/', array_reverse(explode('-', $release['dataEntrada']))); ?>" name="dataPublicacao" /></td>
                            </tr>
                            <tr>
                                <td>Data de Saída:</td>
                                <td><input type="date" id="dataSaida" value="<?php echo implode('/', array_reverse(explode('-', $release['dataSaida']))); ?>" name="dataSaida" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="button" id="btnAlterar" value="Alterar" /></td>
                            </tr>
                        </table>
                    </form>
                </div>

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
