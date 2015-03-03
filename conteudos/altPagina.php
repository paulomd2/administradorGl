<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/conteudo.js"></script>
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
                <a href="./">Conteúdo</a>
                <a href="verPaginas.php"> Páginas </a>
                <a href="#"> Alterar Página</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Alterar Página</h1>
                <?php
                require_once '../model/banco.php';
                require_once 'model/dao.php';
                
                $objPagina->setIdPagina($_GET['id']);
                
                $pagina = $objConteudoDao->listaPagina1($objPagina)
                ?>
                <form name="altMenu">
                    <input type="hidden" value="<?php echo $pagina['idPagina']; ?>" id="idPagina" />
                    <table class="tableform">
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" name="titulo" id="titulo" value="<?php echo $pagina['titulo']; ?>" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Link:</td>
                            <td>
                                <input type="text" name="link" id="link" value="<?php echo $pagina['link']; ?>" /><br />
                                <span id="spanLink" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Texto:</td>
                            <td>
                                <textarea name="texto" id="texto"><?php echo $pagina['texto']; ?></textarea><br />
                                <span id="spanTexto" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select name="status" id="status">
                                    <option value="">Selecione um status...</option>
                                    <option value="1" <?php if($pagina['status'] == 1){echo 'selected';}?>>Habilitado</option>
                                    <option value="2" <?php if($pagina['status'] == 2){echo 'selected';}?>>Desabilitado</option>
                                </select><br />
                                <span id="spanStatus" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><h2>SEO</h2></td>
                        </tr>
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" name="tituloMetaTag" id="tituloMetaTag" value="<?php echo $pagina['tituloSeo']; ?>" /><br />
                                <span id="spanTituloMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Keywords:</td>
                            <td>
                                <input type="text" name="keywordsMetaTag" id="keywordsMetaTag" value="<?php echo $pagina['keywordSeo']; ?>" /><br />
                                <span id="spanKeywordsMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Descrição:</td>
                            <td>
                                <textarea name="descricaoMetaTag" id="descricaoMetaTag"><?php echo $pagina['descricaoSeo']; ?></textarea><br />
                                <span id="spanDescricaoMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="button" id="btnAlterarPagina" value="Alterar" /><br />
                                <span id="spanBtn" class="erro"></span>
                            </td>
                        </tr>
                    </table>
                </form>
                <script>
                    CKEDITOR.replace('texto', {
                        uiColor: '#cfcfcf',
                        filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
                    });
         </script>
            </div>
        </div>
    </body>
</html>