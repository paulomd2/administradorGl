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
        <script type="text/javascript" src="js/release.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="#"><i class="icon icon-home"></i> Home</a>
                <a href="#">Notícias</a>
            </div>
            <div class="tenor">
                <h1>Alterar Release</h1>

                <?php
                require_once '../model/banco.php';
                require_once 'model/dao.php';

                $idRelease = $_GET['id'];

                $objRelease->setIdRelease($idRelease);

                $release = $objReleaseDao->verRelease1($objRelease);
                ?>
                <div>
                    <form name="cadRelease">
                        <input type="hidden" value="<?php echo $release['idRelease']; ?>" id="idNoticia" />
                        <table>
                            <tr>
                                <td>Título:</td>
                                <td>
                                    <input type="text" name="titulo" id="titulo" value="<?php echo $release['titulo']; ?>" /><br />
                                    <span id="spanTitulo" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Sub-título:</td>
                                <td>
                                    <input type="text" name="sub" id="sub" value="<?php echo $release['subTitulo']; ?>" /><br />
                                    <span id="spanSub" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Fonte:</td>
                                <td>
                                    <input type="text" name="fonte" id="fonte" value="<?php echo $release['fonte']; ?>" /><br />
                                    <span id="spanFonte" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Mês:</td>
                                <td>
                                    <select id="mes" name="mes">
                                        <option value="">Selecione um Mês...</option>
                                        <option value="1">Janeiro</option>
                                        <option value="2">Fevereiro</option>
                                        <option value="3">Março</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Maio</option>
                                        <option value="6">Junho</option>
                                        <option value="7">Julho</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="mercado">Status</label></td>
                                <td>

                                    <select id="status" name="status">
                                        <option value="">Selecione um Status...</option>
                                        <option value="1" <?php
                                        if ($release['status'] == 1) {
                                            echo 'selected';
                                        }
                                        ?>>Publicado</option>
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
                                <td colspan="2"><input type="button" id="btnAlterar" value="Enviar" /></td>
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
