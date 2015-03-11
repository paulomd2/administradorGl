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
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="#">Administração</a>
                <a href="./">Rodapé</a>
                <a href="#">Alterar Categoria</a>
            </div>
            <div class="tenor">
                <h1>Alterar Categoria</h1>
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
                            <tr>
                            <td>Status:</td>
                            <td>
                                <select id="status">
                                    <option value="" selected>Escolha um status...</option>
                                    <option value="1" <?php if($categoria['status'] == '1'){ echo 'selected'; } ?>>Habilitado</option>
                                    <option value="2" <?php if($categoria['status'] == '2'){ echo 'selected'; } ?>>Desabilitado</option>
                                </select><br />
                                <span id="spStatus" class="erro"></span>
                            </td>
                        </tr>
                            <tr>
                                <td>Idioma:</td>
                                <td>
                                    <input type="radio" name="lingua" id="pt" value="pt" <?php if($categoria['lingua'] == 'pt'){echo 'checked'; } ?> /> <label for="pt">Português</label>
                                    <input type="radio" name="lingua" id="en" value="en" <?php if($categoria['lingua'] == 'en'){echo 'checked'; } ?> /> <label for="en">Inglês</label>
                                    <input type="radio" name="lingua" id="es" value="es" <?php if($categoria['lingua'] == 'es'){echo 'checked'; } ?> /> <label for="es">Espanhol</label>
                                </td>
                            </tr>
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
