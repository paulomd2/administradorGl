<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
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
        <?php
        include_once '../include/header.php'; 
        include_once '../include/lateral.php';
        $idMenu = $_GET['id'];

        $objMenu->setIdMenu($idMenu);
        $menu1 = $objConteudoDao->listaMenu1($objMenu);
        $submenus = $objConteudoDao->listaSubmenus($idMenu);
        ?>
        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Conteúdo</a>
                <a href="verSubmenus.php?id=<?php echo $idMenu; ?>"><?php echo $menu1['titulo']; ?></a>
                <a href="#">Alterar submenu</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Alterar submenu</h1>
                <form name="cadMenu">
                    <input type="hidden" value ="<?php echo $_GET['id']; ?>" id="idSubmenu" name="idSubmenu" />
                    <table class="tableform">
                        <tr>
                            <td>Menu:</td>
                            <td>
                                <select id="idMenu" name="idMenu">
                                    <option value="">Selecione um Menu...</option>
                                    <?php
                                    require_once '../model/banco.php';
                                    require_once 'model/dao.php';

                                    $idSubmenu = $_GET['id'];

                                    $objSubMenu->setIdSubmenu($idSubmenu);

                                    $submenu = $objConteudoDao->listaSubmenu1($objSubMenu);

                                    $menus = $objConteudoDao->listaMenus($_SESSION['idioma']);

                                    for ($i = 1; $i < count($menus); $i++) {
                                        $selected = '';
                                        if ($menus[$i]["idMenu"] == $submenu['idMenu']) {
                                            $selected = 'selected';
                                        }

                                        echo '<option value="' . $menus[$i]["idMenu"] . '" ' . $selected . '>' . $menus[$i]["titulo"] . '</option>';
                                    }
                                        ?>
                                </select><br />
                                <span id="spanIdMenu" name="spanIdMenu"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Título do Menu:</td>
                            <td>
                                <input type="text" name="tituloMenu" id="tituloMenu" value="<?php echo $submenu['tituloMenu']; ?>" /><br />
                                <span id="spanTituloMenu" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Título da Página:</td>
                            <td>
                                <input type="text" name="tituloPagina" id="tituloPagina" value="<?php echo $submenu['tituloPagina']; ?>" /><br />
                                <span id="spanTituloPagina" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Link Externo:</td>
                            <td>
                                <input type="text" name="link" id="link" value="<?php echo $submenu['link']; ?>" /><br />
                                <span id="spanLink" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Target:</td>
                            <td>
                                <select name="target" id="target">
                                    <option value="">Selecione um target...</option>
                                    <option value="_self" <?php
                                    if ($submenu['target'] == '_self') {
                                        echo 'selected';
                                    }
                                    ?>>Abrir na mesma janela</option>
                                    <option value="_blank" <?php
                                    if ($submenu['target'] == '_blank') {
                                        echo 'selected';
                                    }
                                    ?>>Abrir em uma nova janela</option>
                                </select><br />
                                <span id="spanTarget" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select name="status" id="status">
                                    <option value="">Selecione um status...</option>
                                    <option value="1" <?php
                                    if ($submenu['status'] == '1') {
                                        echo 'selected';
                                    }
                                    ?>>Habilitado</option>
                                    <option value="2" <?php
                                    if ($submenu['status'] == '2') {
                                        echo 'selected';
                                    }
                                    ?>>Desabilitado</option>
                                </select><br />
                                <span id="spanStatus" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Texto:</td>
                            <td>
                                <textarea name="texto" id="texto"><?php echo $submenu['texto']; ?></textarea><br />
                                <span id="spanTexto" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Publicação:</td>
                            <td><input type="date" id="dataPublicacao" name="dataPublicacao" value="<?php echo $submenu['dataEntrada']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Data de Saída:</td>
                            <td><input type="date" id="dataSaida" name="dataSaida" value="<?php echo $submenu['dataSaida']; ?>" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><h2>SEO</h2></td>
                        </tr>
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" name="tituloMetaTag" id="tituloMetaTag" value="<?php echo $submenu['tituloMetaTag']; ?>" /><br />
                                <span id="spanTituloMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Keywords:</td>
                            <td>
                                <textarea name="keywordsMetaTag" id="keywordsMetaTag"><?php echo $submenu['keywordMetaTag']; ?></textarea><br />
                                <span id="spanKeywordsMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Descrição:</td>
                            <td>
                                <textarea name="descricaoMetaTag" id="descricaoMetaTag"><?php echo $submenu['descricaoMetaTag']; ?></textarea><br />
                                <span id="spanDescricaoMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="button" id="btnAlterarSubmenu" value="Alterar" /><br />
                                <span id="spanBtn" class="erro"></span>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <script>
                CKEDITOR.replace('texto', {
                    uiColor: '#cfcfcf',
                    filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
                });
            </script>
        </div>
    </body>
</html>