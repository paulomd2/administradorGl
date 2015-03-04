<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/rodape.js"></script>
    </head>
    <body>
        <?php
        include_once '../include/header.php';
        include_once '../include/lateral.php';
        require_once '../model/banco.php';
        require_once './model/dao.php';

        $id = $_GET['id'];

        $objCategoria->setIdCategoria($id);

        $categoria = $objRodapeDao->listaCategoria1($objCategoria)
        ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="#">Administração</a>
                <a href="./">Rodapé</a>
                <a href="verImagens.php?id=<?php echo $id; ?>"><?php echo $categoria['nome']; ?></a>
                <a href="#">Alterar Imagem</a>
            </div>
            <div class="tenor">
                <h1>Alterar Imagem</h1>
                <div>
                    <?php
                    $idImagem = $_GET['id'];
                    require_once '../model/banco.php';
                    require_once 'model/dao.php';

                    $objImagem->setIdImagem($idImagem);

                    $imagem = $objRodapeDao->listaImagem1($objImagem);
                    ?>
                    <form id="cadImagem" enctype="multipart/form-data" method="post" action="control/controleRodape.php">
                        <input type="hidden" name="idImagem" id="idImagem" value="<?php echo $idImagem; ?>" />
                        <input type="hidden" name="idCategoria" id="idCategoria" value="<?php echo $imagem['idCategoria']; ?>" />
                        <input type="hidden" name="imagemAntiga" id="imagemAntiga" value="<?php echo $imagem['imagem']; ?>" />
                        <input type="hidden" name="opcao" id="opcao" value="alterarImagem" />
                        <table class="tableform">
                            <tr>
                                <td>Nome:</td>
                                <td>
                                    <input type="text" name="nome" id="nome" value="<?php echo $imagem['nome']; ?>" /><br />
                                    <span id="spanNome" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Link:</td>
                                <td>
                                    <input type="text" id="link" name="link" value="<?php echo $imagem['link']; ?>" /><br />
                                    <span class="erro" id="spanLink"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td>
                                    <select id="status" name="status">
                                        <option value="">Selecione um status</option>
                                        <option value="1" <?php if ($imagem['status'] == 1) {
                        echo 'selected';
                    } ?>>Habilitado</option>
                                        <option value="2" <?php if ($imagem['status'] == 2) {
                        echo 'selected';
                    } ?>>Desabilitado</option>
                                    </select><br />
                                    <span class="erro" id="spanStatus"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Imagem:</td>
                                <td>
                                    <input type="file" id="imagem" name="imagem" /><br />
                                    <img src="../images/<?php echo $imagem['imagem']; ?>" width="100" />
                                    <span id="spanImagem" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="button" id="btnAltImagem" value="Alterar" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
