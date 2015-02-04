<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/rodape.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Rodapé</a>
            </div>
            <div class="tenor">
                <h1>Cadastrar Imagem</h1>
                <div>
                    <?php
                    $idCategoria = $_GET['id'];
                    require_once '../model/banco.php';
                    require_once 'model/dao.php';
                    ?>
                    <form id="cadImagem" enctype="multipart/form-data" method="post" action="control/controleRodape.php">
                        <input type="hidden" name="idCategoria" id="idCategoria" value="<?php echo $idCategoria; ?>" />
                        <input type="hidden" name="opcao" id="opcao" value="cadastrarImagem" />

                        <?php
                        if (isset($_GET['errorId']) &&  $_GET['errorId']== 48) {
                            echo '<span class="erro" style="display:inline-block !important">a(s) categoria(s) com identificador "Patrocinador" só pode ter uma imagem</span>';
                        } elseif (isset($_GET['errorId']) &&  $_GET['errorId'] == 49) {
                            echo '<span class="erro" style="display:inline-block !important">a(s) categoria(s) com identificador "Apoio" só pode ter vinte imagens</span>';
                        }elseif (isset($_GET['errorId']) &&  $_GET['errorId'] == 50) {
                            echo '<span class="erro" style="display:inline-block !important">a imagem não pode ser maior que 200Kb</span>';
                        }
                        ?>

                        <table class="tableform">
                            <tr>
                                <td>Nome:</td>
                                <td>
                                    <input type="text" name="nome" id="nome" /><br />
                                    <span id="spanNome" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Link:</td>
                                <td>
                                    <input type="text" id="link" name="link" /><br />
                                    <span class="erro" id="spanLink"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td>
                                    <select id="status" name="status">
                                        <option value="">Selecione um status</option>
                                        <option value="1">Habilitado</option>
                                        <option value="2">Desabilitado</option>
                                    </select><br />
                                    <span class="erro" id="spanStatus"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Imagem:</td>
                                <td>
                                    <input type="file" id="imagem" name="imagem" /><br />
                                    <span id="spanImagem" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="button" id="btnCadImagem" value="Cadastrar" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
