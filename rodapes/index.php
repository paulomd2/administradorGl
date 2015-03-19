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
                <a href="#">Categorias</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Últimas Categorias</h1>
                <a href="verCategorias.php" class="proPage">Ver todas as categorias</a>
                Selecione o idioma:
                <select id="selLingua">
                    <option value="pt" <?php
                    if ($_SESSION['idioma'] == 'pt') {
                        echo 'selected';
                    }
                    ?>>Português</option>
                    <option value="en" <?php
                    if ($_SESSION['idioma'] == 'en') {
                        echo 'selected';
                    }
                    ?>>Inglês</option>
                    <option value="es" <?php
                    if ($_SESSION['idioma'] == 'es') {
                        echo 'selected';
                    }
                    ?>>Espanhol</option>
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
                            <td>Status:</td>
                            <td>
                                <select id="status">
                                    <option value="" selected>Escolha um status...</option>
                                    <option value="1">Habilitado</option>
                                    <option value="2">Desabilitado</option>
                                </select><br />
                                <span id="spStatus" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Idioma:</td>
                            <td>
                                <input type="radio" name="lingua" id="pt" value="pt" <?php
                                if ($_SESSION['idioma'] == 'pt') {
                                    echo 'checked';
                                }
                                ?> /> <label for="pt">Português</label>
                                <input type="radio" name="lingua" id="en" value="en" <?php
                                if ($_SESSION['idioma'] == 'en') {
                                    echo 'checked';
                                }
                                ?> /> <label for="en">Inglês</label>
                                <input type="radio" name="lingua" id="es" value="es" <?php
                                if ($_SESSION['idioma'] == 'es') {
                                    echo 'checked';
                                }
                                ?> /> <label for="es">Espanhol</label>
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