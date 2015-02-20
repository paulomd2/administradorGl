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
                <a href="./">Rodapé</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Últimas Categorias</h1>
                <a href="verCategorias.php" class="proPage">Ver todas as categorias</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 40%;">Categoria</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                            <td style="width: 10%;">Cadastrar</td>
                        </tr>
                    </thead>
                    <tbody id="listaCategorias"></tbody>
                </table>
                <hr/>
                <h1>Cadastrar Categoria</h1>
                <form id="cadCategoria">
                    <table class="tableform">
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrarCategoria" value="Cadastrar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>