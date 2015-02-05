<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$idExpositor = $_GET['id'];

$objExpositor->setIdExpositor($idExpositor);

$expositor = $objExpositorDao->listaExpositor1($objExpositor);
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/expositores.js"></script>
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
                <a href="./">Expositores</a>
                <a href="#">Alterar evento</a>
            </div>
            <div class="tenor">
                <h1>Alterar Expositor</h1>
                <?php
                if(isset($_GET['errorId']) && $_GET['errorId'] == 50) {
                    echo '<span class="erro" style="display:inline-block !important">a imagem não pode ser maior que 200Kb</span>';
                }
                ?>
                <form name="altExpositor" id="altExpositor" action="control/controleExpositores.php" enctype="multipart/form-data" method="post" class="tableform">
                    <input type="hidden" value="alterar" name="opcao" id="opcao" />
                    <input type="hidden" value="<?php echo $expositor['imagem']; ?>" name="imagemAntiga" id="imagemAntiga" />
                    <input type="hidden" value="<?php echo $idExpositor ?>" name="idExpositor" id="idExpositor" />
                    <table class="tableform">
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" value="<?php echo $expositor['nome']; ?>" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Link:</td>
                            <td>
                                <input type="text" name="link" id="link" value="<?php echo $expositor['link']; ?>" /><br />
                                <span id="spanLink" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Estande:</td>
                            <td>
                                <input type="text" name="estande" id="estande" value="<?php echo $expositor['estande']; ?>" /><br />
                                <span id="spanEstande" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Publicação:</td>
                            <td>
                                <input type="date" name="dataPublicacao" id="dataPublicacao" value="<?php echo $expositor['dataPublicacao']; ?>" /><br />
                                <span id="spanDataPublicacao" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Imagem:</td>
                            <td>
                                <input type="file" name="imagem" id="imagem" /><br />
                                <img src="../images/<?php echo $expositor['imagem']; ?>" width="100" />
                                <span id="spanImagem" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnAlterar" value="Alterar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>