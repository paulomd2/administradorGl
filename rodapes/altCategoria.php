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
                <h1>Alterar Banner</h1>
                <div>
                    <?php
                    $idCategoria = $_GET['id'];
                    require_once '../model/banco.php';
                    require_once 'model/dao.php';

                    $objCategoria->setIdCategoria($idCategoria);

                    $categoria = $objRodapeDao->listaCategoria1($objCategoria);
                    ?>
                    <form id="altCategoria">
                        <input type="hidden" id="idCategoria" value="<?php echo $categoria['idCategoria']; ?>" />
                        <table class="tableform">
                            <tr>
                                <td>Nome:</td>
                                <td>
                                    <input type="text" name="nome" id="nome" value="<?php echo $categoria['nome']; ?>" /><br />
                                    <span id="spanNome" class="erro"></span>
                                </td>
                            </tr>
                            <!--tr>
                                <td>Identificador:</td>
                                <td>
                                    <select id="identificador" name="identificador">
                                        <option value="">Selecione um identificador...</option>
                                        <option value="2" <?php if ($categoria['identificador'] == 2) { echo 'selected'; } ?>>
                                            Apoio
                                        </option>   
                                        <option value="1" <?php if ($categoria['identificador'] == 1) { echo 'selected'; } ?>>
                                            Patrocinador
                                        </option>
                                        <option value="1" <?php if ($categoria['identificador'] == 0) { echo 'selected';}?>>
                                            Sem identificador
                                        </option>
                                    </select><br />
                                    <span class="erro" id="spanIdentificador"></span>
                                </td>
                            </tr-->
                            <tr>
                                <td colspan="2"><input type="button" id="btnAlterarCategoria" value="Alterar" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
