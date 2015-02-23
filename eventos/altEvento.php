<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$idEvento = $_GET['id'];

$objEvento->setIdEvento($idEvento);

$evento = $objEventoDao->listaEvento1($objEvento);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/eventos.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="/">Eventos</a>
                <a href="#">Alterar evento</a>
            </div>
            <div class="tenor">
                <h1>Ver evento</h1>
                <form name="altEvento" id="altEvento" action="control/controleEventos.php" enctype="multipart/form-data" method="post">
                    <input type="hidden" value="alterar" name="opcao" id="opcao" />
                    <input type="hidden" value="<?php echo $evento['idEvento']; ?>" name="idEvento" id="idEvento" />
                    <input type="hidden" value="<?php echo $evento['imagem']; ?>" name="imagemAntiga" id="imagemAntiga" />
                    <table class="tableform">
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" value="<?php echo $evento['nome']; ?>" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Titulo:</td>
                            <td>
                                <input type="text" name="titulo" id="titulo" value="<?php echo $evento['titulo']; ?>" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Início:</td>
                            <td>
                                <input type="date" name="dataInicio" id="dataInicio" value="<?php echo $evento['dataInicio']; ?>" /><br />
                                <span id="spanDataInicio" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Fim:</td>
                            <td>
                                <input type="date" name="dataFim" id="dataFim" value="<?php echo $evento['dataFim']; ?>" /><br />
                                <span id="spanDataFim" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Texto:</td>
                            <td>
                                <textarea name="texto" id="texto" rows="10" cols="40"><?php echo $evento['titulo']; ?></textarea><br />
                                <span id="spanTexto" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Imagem:</td>
                            <td>
                                <img src="../images/<?php echo $evento['imagem'] ?>" width="180" />
                                <span id="spanImagem" class="erro"></span><br />
                                <input type="file" name="imagem" id="imagem" /><br />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><h2>Meta tags</h2></td>
                        </tr>
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" id="tituloMetaTag" name="tituloMetaTag" value="<?php echo $evento['tituloMetaTag']; ?>" /><br />
                                <span id="spanTituloMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Keywords:</td>
                            <td>
                                <input type="text" id="keywordsMetaTag" name="keywordsMetaTag" value="<?php echo $evento['keywordsMetaTag']; ?>" /><br />
                                <span id="spanKeywordsMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Descrição:</td>
                            <td>
                                <input type="text" id="descricaoMetaTag" name="descricaoMetaTag" value="<?php echo $evento['descricaoMetaTag']; ?>" /><br />
                                <span id="spanDescricaoMetaTag" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnAlterar" value="Alterar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <script>
            CKEDITOR.replace('texto', {
                uiColor: '#cfcfcf',
                filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
            });
        </script>
    </body>
</html>