<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/eventos.js"></script>
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
                <a href="#">Eventos</a>
                <a href="#">Cadastrar evento</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Cadastrar evento</h1>
                <form name="cadEvento" id="cadEvento" action="control/controleEventos.php" enctype="multipart/form-data" method="post" class="tableform">
                    <input type="hidden" value="cadastrar" name="opcao" id="opcao" />
                    <table>
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <!--tr>
                            <td>Titulo:</td>
                            <td>
                                <input type="text" name="titulo" id="titulo" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>-->
                        <tr>
                            <td>Data de Início:</td>
                            <td>
                                <input type="date" name="dataInicio" id="dataInicio" /><br />
                                <span id="spanDataInicio" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Fim:</td>
                            <td>
                                <input type="date" name="dataFim" id="dataFim" /><br />
                                <span id="spanDataFim" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Texto:</td>
                            <td>
                                <textarea name="texto" id="texto" rows="10" cols="40"></textarea><br />
                                <span id="spanTexto" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Imagem:</td>
                            <td>
                                <input type="file" name="imagem" id="imagem" /><br />
                                <span id="spanImagem" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select id="status" name="status">
                                    <option value="" selected>Selecione um status...</option>
                                    <option value="1">Habilitado</option>
                                    <option value="2">Desabilitado</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><h2 style="margin: 0!important;">Meta tags</h2></td>
                        </tr>
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" id="tituloMetaTag" name="tituloMetaTag" /><br />
                                <span id="spanTituloMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Keywords:</td>
                            <td>
                                <input type="text" id="keywordsMetaTag" name="keywordsMetaTag" /><br />
                                <span id="spanKeywordsMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Descrição:</td>
                            <td>
                                <input type="text" id="descricaoMetaTag" name="descricaoMetaTag" /><br />
                                <span id="spanDescricaoMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Idioma:</td>
                            <td>
                                <input type="radio" name="lingua" id="pt" value="pt" <?php if($_SESSION['idioma'] == 'pt'){ echo 'checked'; } ?> />
                                <label for="pt">Português</label>
                                <input type="radio" name="lingua" id="en" value="en" <?php if($_SESSION['idioma'] == 'en'){ echo 'checked'; } ?> />
                                <label for="en">Inglês</label>
                                <input type="radio" name="lingua" id="es" value="es" <?php if($_SESSION['idioma'] == 'es'){ echo 'checked'; } ?> />
                                <label for="es">Espanhol</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrar" value="Cadastrar" /></td>
                        </tr>
                    </table>
                </form>

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
