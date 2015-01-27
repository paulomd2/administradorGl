<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Conteúdos</a>
                <a href="#">Gerenciar conteúdo</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Gerenciar conteúdo</h1>
                <h2>Cadastrar novo menu</h2>
                <form name="cadMenu">
                    <table class="tableform">
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" name="titulo" id="titulo" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Link:</td>
                            <td>
                                <input type="text" name="link" id="link" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrarMenu" value="Cadastrar" /></td>
                        </tr>
                    </table>
                </form>
                <hr/>
                <h2>Menus cadastrados</h2>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 80%;">Título</td>
                            <td style="width: 10%;">Editar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaMenus">
                        <?php
                        require_once 'listaMenuAjax.php';
                        
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>