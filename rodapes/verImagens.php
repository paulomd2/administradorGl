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
                <a href="#"><?php echo $categoria['nome']; ?></a>
                <a href="#">Ver Imagens</a>
            </div>
            <div class="tenor">
                <h1>Todos as imagens</h1>
                <a href="cadImagem.php?id=<?php echo $id; ?>" class="proPage">Cadastrar Imagem</a>
                <input type="hidden" value="<?php echo $id; ?>" id="idCategoria" />
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 50%;">Nome</td>
                            <td style="width: 30%;">Imagem</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>

                    <tbody id="listaImagens">
                        <?php
                        require_once 'listaImagensAjax.php';
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>