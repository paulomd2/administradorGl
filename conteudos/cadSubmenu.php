<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
    </head>
    <body>
        <div>
            <form name="cadMenu">
                <table>
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
                        <td>Texto:</td>
                        <td>
                            <input type="text" name="texto" id="texto" /><br />
                            <span id="spanTexto" class="erro"></span>
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
                            <input type="text" name="target" id="target" /><br />
                            <span id="spanTarget" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td>
                            <input type="text" name="status" id="status" /><br />
                            <span id="spanStatus" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">SEO</td>
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
                        <td colspan="2"><input type="button" id="btnCadastrarSubmenu" value="Enviar" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>