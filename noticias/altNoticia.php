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
        <script type="text/javascript" src="js/noticias.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="index.php">Notícias</a>
                <a href="#">Alterar notícia</a>
            </div>
            <div class="tenor">
                <h1>Alterar notícia</h1>

                <?php
                require_once '../model/banco.php';
                require_once 'model/dao.php';

                $idNoticia = $_GET['id'];

                $objNoticia->setIdNoticia($idNoticia);

                $noticia = $objNoticiaDao->verNoticia1($objNoticia);
                ?>
                <div>
                    <form name="cadNoticia">
                        <input type="hidden" value="<?php echo $noticia['idNoticia']; ?>" id="idNoticia" />
                        <table class="tableform">
                            <tr>
                                <td>Título:</td>
                                <td>
                                    <input type="text" name="titulo" id="titulo" value="<?php echo $noticia['titulo']; ?>" /><br />
                                    <span id="spanTitulo" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Sub-título:</td>
                                <td>
                                    <textarea type="text" name="sub" id="sub" cols="40" rows="8"><?php echo $noticia['subTitulo']; ?></textarea><br />
                                    <span id="spanSub" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Fonte:</td>
                                <td>
                                    <input type="text" name="fonte" id="fonte" value="<?php echo $noticia['fonte']; ?>" /><br />
                                    <span id="spanFonte" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Data de Publicação:</td>
                                <td>
                                    <input type="date" name="publicacao" id="publicacao" value="<?php echo $noticia['dataPublicacao']; ?>" /><br />
                                    <span id="spanPublicacao" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Texto:</td>
                                <td>
                                    <textarea name="texto" id="texto" rows="10" cols="40"><?php echo $noticia['texto']; ?></textarea>
                                    <span id="spanTexto" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                            <td>Status:</td>
                            <td>
                                <select id="status" name="status">
                                    <option value="">Selecione um status</option>
                                    <option value="1" <?php if($noticia['status'] == '1'){ echo 'selected'; } ?>>Habilitado</option>
                                    <option value="2" <?php if($noticia['status'] == '2'){ echo 'selected'; } ?>>Desabilitado</option>
                                </select>
                                <span id="spanStatus" class="erro"></span>
                            </td>
                        </tr>
                            <tr>
                                <td><label for="lblMercado">Notícia de Mercado?</label></td>
                                <td><input type="checkbox" value="1" id="lblMercado" name="lblMercado" <?php if ($noticia['mercado'] == 1) {
                    echo 'checked';
                } ?> /></td>
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
