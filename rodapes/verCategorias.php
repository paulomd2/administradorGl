<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/rodape.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <script>
            $(document).ready(function() {
                $("#contentLeft ul").sortable({
                    opacity: 0.6,
                    cursor: 'move',
                    update: function() {
                        var order = $(this).sortable("serialize") + '&opcao=ordena';
                        $.post("control/controleCategorias.php", order, function(theResponse) {
                            console.log(theResponse);
                        });
                    }
                });

            });
        </script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="#">Administração</a>
                <a href="./">Rodapé</a>
                <a href="#">Categorias</a>
            </div>
            <div class="tenor">
                <h1>Todas as categorias</h1>
                <a href="cadCategoria.php" class="proPage">Cadastrar categoria</a>
                Selecione o idioma:
                <select id="selLingua">
                    <option value="pt" <?php if($_SESSION['idioma'] == 'pt'){ echo 'selected'; } ?>>Portugês</option>
                    <option value="en" <?php if($_SESSION['idioma'] == 'en'){ echo 'selected'; } ?>>Inglês</option>
                    <option value="es" <?php if($_SESSION['idioma'] == 'es'){ echo 'selected'; } ?>>Espanhol</option>
                </select>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td>Categoria</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                            <td style="width: 20%;">Ver imagem</td>
                        </tr>
                    </thead>

                    <tbody id="listaCategorias">
                        <?php
                        require_once 'listaCategoriasAjax.php';
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>
