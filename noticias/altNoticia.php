<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/noticias.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php
            require '../model/banco.php';
            require 'model/dao.php';
            
            $idNoticia = $_GET['id'];
            
            $objNoticia->setIdNoticia($idNoticia);
            
            $noticia = $objNoticiasDao->verNoticia1($objNoticia);
        ?>
        <div>
            <form name="cadNoticia">
                <input type="hidden" value="<?php echo $noticia['idNoticia']; ?>" id="idNoticia" />
                <table>
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
                            <input type="text" name="sub" id="sub" value="<?php echo $noticia['subTitulo']; ?>" /><br />
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
                            <input type="text" name="publicacao" id="publicacao" value="<?php echo $noticia['dataPublicacao']; ?>" /><br />
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
                        <td><label for="mercado">Notícia de Mercado?</label></td>
                        <td><input type="checkbox" value="1" id="mercado" name="mercado" <?php if($noticia['mercado']==1){echo 'checked'; }?> /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" id="btnAlterar" value="Enviar" /></td>
                    </tr>
                </table>
            </form>
        </div>

        <script>
            CKEDITOR.replace('texto', {
                uiColor: '#999999',
                filebrowserUploadUrl: 'upload.php',
                filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
            });
        </script>
    </body>
</html>