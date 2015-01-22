<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <div>
            <form name="cadMenu">
                <input type="hidden" value ="<?php echo $_GET['id']; ?>" id="idSubmenu" name="idSubmenu" />
                <table>
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
                                
                                $menus = $objConteudoDao->listaMenus();
                                
                                for ($i = 1; $i < count($menus); $i++) {
                                    $selected = '';
                                    if($menus[$i]["idMenu"] == $submenu['idMenu']){ $selected = 'selected'; }
                                    
                                    echo '<option value="' . $menus[$i]["idMenu"] . '" '.$selected.'>' . $menus[$i]["titulo"] . '</option>';
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
                                <option value="_self" <?php if($submenu['target'] == '_self'){ echo 'selected'; } ?>>Abrir na mesma janela</option>
                                <option value="_blank" <?php if($submenu['target'] == '_blank'){ echo 'selected'; } ?>>Abrir em uma nova janela</option>
                            </select><br />
                            <span id="spanTarget" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                            <select name="status" id="status">
                                <option value="">Selecione um status...</option>
                                <option value="1" <?php if($submenu['status'] == '1'){ echo 'selected'; } ?>>Publicado</option>
                                <option value="2" <?php if($submenu['status'] == '2'){ echo 'selected'; } ?>>Em revisão</option>
                                <option value="0" <?php if($submenu['status'] == '0'){ echo 'selected'; } ?>>Desabilitado</option>
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
                        <td><input type="text" id="dataPublicacao" name="dataPublicacao" value="<?php echo implode('/', array_reverse(explode('-', $submenu['dataEntrada']))); ?>" /></td>
                    </tr>
                    <tr>
                        <td>Data de Saída:</td>
                        <td><input type="text" id="dataSaida" name="dataSaida" value="<?php echo implode('/', array_reverse(explode('-', $submenu['dataSaida']))); ?>" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">SEO</td>
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
                            <input type="text" name="keywordsMetaTag" id="keywordsMetaTag" value="<?php echo $submenu['keywordMetaTag']; ?>" /><br />
                            <span id="spanKeywordsMetaTag" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>
                            <input type="text" name="descricaoMetaTag" id="descricaoMetaTag" value="<?php echo $submenu['descricaoMetaTag']; ?>" /><br />
                            <span id="spanDescricaoMetaTag" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="button" id="btnAlterarSubmenu" value="Enviar" /><br />
                            <span id="spanBtn" class="erro"></span>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <script>
            CKEDITOR.replace('texto', {
                uiColor: '#999999',
                filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
            });
        </script>
    </body>
</html>