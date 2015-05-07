<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$idPalestrante = $_GET['id'];

$objPalestrante->setIdPalestrante($idPalestrante);

$palestrante = $objPalestranteDao->listaPalestrante1($objPalestrante);
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
                <a href="./">Palestrante</a>
                <a href="#">Alterar Palestrante</a>
            </div>
            <div class="tenor">
                <h1>Alterar Palestrante</h1>
                <?php
                if(isset($_GET['errorId']) && $_GET['errorId'] == 50) {
                    echo '<span class="erro" style="display:inline-block !important">a imagem não pode ser maior que 200Kb</span>';
                }
                ?>
                <form name="altPalestrante" id="altExpositor" action="control/controlePalestrantes.php" enctype="multipart/form-data" method="post" class="tableform">
                    <input type="hidden" value="alterar" name="opcao" id="opcao" />
                    <input type="hidden" value="<?php echo $palestrante['imagem']; ?>" name="imagemAntiga" id="imagemAntiga" />
                    <input type="hidden" value="<?php echo $idPalestrante; ?>" name="idPalestrante" id="idPalestrante" />
                    <table class="tableform">
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" value="<?php echo $palestrante['nome']; ?>" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Cargo:</td>
                            <td>
                                <input type="text" name="cargo" id="cargo" value="<?php echo $palestrante['cargo']; ?>" /><br />
                                <span id="spanCargo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Texto:</td>
                            <td>
                                <textarea name="curriculo" id="curriculo"><?php echo $palestrante['curriculo']; ?></textarea><br />
                                <span id="spanEstande" class="erro"></span>
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
                                    <option value="1" <?php if($palestrante['status'] == 1){ echo 'selected'; } ?>>Habilitado</option>
                                    <option value="2" <?php if($palestrante['status'] == 2){ echo 'selected'; } ?>>Desabilitado</option>
                                </select><br />
                                <span id="spanStatus" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrar" value="Alterar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>