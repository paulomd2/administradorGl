<?php
session_start();
setcookie("ck_authorized", "true", 0, "/");
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/releases.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
        <script src="../plugin/ckfinder/ckfinder.js"></script>
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
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="#">Releases</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Últimos releases</h1>
                <a href="verReleases.php" class="proPage">Ver todos os releases</a>
                Selecione o idioma:
                <select id="selIdioma">
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
                            <td style="width: 60%;">Título</td>
                            <td style="width: 20%;">Mês</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>

                    <tbody id="listaReleasesIndex">
                    </tbody>
                </table>

                <hr/>
                <h1>Cadastrar release</h1>
                <form name="cadRelease" id="cadRelease">
                    <table class="tableform">
                        <tr>
                            <td>Título:</td>
                            <td>
                                <input type="text" name="titulo" id="titulo" /><br />
                                <span id="spanTitulo" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Mês:</td>
                            <td>
                                <select id="mes" name="mes">
                                    <option value="">Selecione um Mês...</option>
                                    <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                </select><br />
                                <span class="erro" id="spanMes"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select id="status" name="status">
                                    <option value="">Selecione um Status...</option>
                                    <option value="1">Habilitado</option>
                                    <option value="2">Desabilitado</option>
                                </select><br />
                                <span id="spanStatus" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Texto:</td>
                            <td>
                                <textarea name="texto" id="texto" rows="10" cols="40"></textarea>
                                <span id="spanTexto" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Publicação:</td>
                            <td><input type="date" id="dataPublicacao" value="00/00/0000" name="dataPublicacao" /></td>
                        </tr>
                        <tr>
                            <td>Data de Saída:</td>
                            <td><input type="date" id="dataSaida" value="00/00/0000" name="dataSaida" /></td>
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
                            <td colspan="2"><input type="button" id="btnCadastrar" value="Cadastrar" /></td>
                        </tr>
                    </table>
                </form>                

                <script>
                    CKEDITOR.replace('texto', {
                        uiColor: '#dfdfdf',
                        filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
                    });
                </script>
            </div>
        </div>
    </body>
</html>
