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
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Notícias</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Cadastrar submenu</h1>
                <form name="cadMenu">
                    <table class="tableform">
                        <tr>
                            <td>Menu:</td>
                            <td>
                                <select id="idMenu" name="idMenu">
                                    <option value="">Selecione um Menu...</option>
                                    <?php
                                    require_once '../model/banco.php';
                                    require_once 'model/dao.php';
                                    $menus = $objConteudoDao->listaMenus();

                                    for ($i = 1; $i < count($menus); $i++) {
                                        $selected = '';
                                        if($menus[$i]['idMenu'] == $_GET['id']){
                                            $selected = 'selected';    
                                        }
                                        
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
                                <input type="text" name="tituloMenu" id="tituloMenu" /><br />
                                <span id="spanTituloMenu" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Título da Página:</td>
                            <td>
                                <input type="text" name="tituloPagina" id="tituloPagina" /><br />
                                <span id="spanTituloPagina" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Link Externo:</td>
                            <td>
                                <input type="text" name="link" id="link" /><br />
                                <span id="spanLink" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Target:</td>
                            <td>
                                <select name="target" id="target">
                                    <option value="">Selecione um target...</option>
                                    <option value="_self">Abrir na mesma janela</option>
                                    <option value="_blank">Abrir em uma nova janela</option>
                                </select><br />
                                <span id="spanTarget" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select name="status" id="status">
                                    <option value="">Selecione um status...</option>
                                    <option value="1">Publicado</option>
                                    <option value="2">Em revisão</option>
                                    <option value="0">Desabilitado</option>
                                </select><br />
                                <span id="spanStatus" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Texto:</td>
                            <td>
                                <textarea name="texto" id="texto"></textarea><br />
                                <span id="spanTexto" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Publicação:</td>
                            <td><input type="text" id="dataPublicacao" name="dataPublicacao" /></td>
                        </tr>
                        <tr>
                            <td>Data de Saída:</td>
                            <td><input type="text" id="dataSaida" name="dataSaida" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><h2>SEO</h2></td>
                        </tr>
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" name="tituloMetaTag" id="tituloMetaTag" /><br />
                                <span id="spanTituloMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Keywords:</td>
                            <td>
                                <input type="text" name="keywordsMetaTag" id="keywordsMetaTag" /><br />
                                <span id="spanKeywordsMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Descrição:</td>
                            <td>
                                <input type="text" name="descricaoMetaTag" id="descricaoMetaTag" /><br />
                                <span id="spanDescricaoMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="button" id="btnCadastrarSubmenu" value="Cadastrar" /><br />
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