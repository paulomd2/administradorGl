<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <!--<script type="text/javascript" src="../js/jquery-2.1.3.js"></script>-->
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/banner.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
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

                $idRelease = $_GET['id'];

                $objRelease->setIdRelease($idRelease);

                $release = $objReleasesDao->verRelease1($objRelease);
                ?>
                <div>
                    <form name="cadRelease">
                        <input type="hidden" value="<?php echo $release['idRelease']; ?>" id="idRelease" />
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
                                    <select id="status" name="status">
                                        <option value="">Selecione um target...</option>
                                        <option value="1" <?php if ($banner['target'] == 1) { echo 'selected'; } ?>>Abrir na mesma página</option>
                                        <option value="2" <?php if ($banner['target'] == 2) { echo 'selected'; } ?>>Abrir em outra página</option>
                                    </select><br />
                                    <span class="erro" id="spanTarget"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>

                                    <select id="status" name="status">
                                        <option value="">Selecione um Status...</option>
                                        <option value="1" <?php if ($banner['status'] == 1) { echo 'selected'; } ?> >Publicado</option>
                                        <option value="2" <?php if ($banner['status'] == 2) { echo 'selected'; } ?>>Revisão</option>
                                    </select><br />
                                    <span class="erro" id="spanStatus"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Data de Publicação:</td>
                                <td><input type="text" id="dataPublicacao" value="<?php echo implode('/', array_reverse(explode('-', $banner['dataEntrada']))); ?>" name="dataPublicacao" /></td>
                            </tr>
                            <tr>
                                <td>Data de Saída:</td>
                                <td><input type="text" id="dataSaida" value="<?php echo implode('/', array_reverse(explode('-', $banner['dataSaida']))); ?>" name="dataSaida" /></td>
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
