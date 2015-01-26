<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/banners.js"></script>
        <link href='../plugin/romeDateTimePicker/dist/rome.css' rel='stylesheet' type='text/css' />
        <script src='../plugin/romeDateTimePicker/dist/rome.js'></script>
        <script>
            rome(left, {
                dateValidator: rome.val.beforeEq(right)
            });
            rome(right, {
                dateValidator: rome.val.afterEq(left)
            });
        </script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="./">Banner</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Últimos releases</h1>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td style="width: 20%;">Nome</td>
                            <td style="width: 60%;">Imagem</td>
                            <td style="width: 10%;">Alterar</td>
                            <td style="width: 10%;">Excluir</td>
                        </tr>
                    </thead>

                    <tbody id="listaReleases"></tbody>
                </table>
                <a href="verBanners.php" class="proPage">Ver todos os banners</a>

                <hr/>
                <h1>Cadastrar Banner</h1>
                <table>
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
                            <input type="text" name="link" id="link" /><br />
                            <span id="spanLink" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Target:</td>
                        <td>
                            <select id="status" name="status">
                                <option value="">Selecione um target...</option>
                                <option value="1">Abrir na mesma página</option>
                                <option value="2">Abrir em outra página</option>
                            </select><br />
                            <span class="erro" id="spanTarget"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>

                            <select id="status" name="status">
                                <option value="">Selecione um Status...</option>
                                <option value="1">Publicado</option>
                                <option value="2">Revisão</option>
                            </select><br />
                            <span class="erro" id="spanStatus"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Data de Publicação:</td>
                        <td>
                            <input id="left" class="input">
                            <input id="right" class="input">

                            <br /><br />
                            <input type="text" id="datepicker" name="dataPublicacao" value="00/00/0000" />
                        </td>
                    </tr>
                    <tr>
                        <td>Data de Saída:</td>
                        <td><input type="text" id="dataSaida" name="dataSaida" value="00/00/0000" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" id="btnCadastrar" value="Enviar" /></td>
                    </tr>
                </table>
                <div class="divError">Erro ao subir imagem</div>
            </div>
        </div>
        <!--script src='../plugin/romeDateTimePicker/example/example.js'></script-->
    </body>
</html>