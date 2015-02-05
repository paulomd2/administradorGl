<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/expositores.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="index.php">Eventos</a>
                <a href="#">Cadastrar expositor</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Cadastrar Expositor</h1>
                <a href="verExpositores.php" class="proPage">Todos os expositores</a>
                <?php
                if(isset($_GET['errorId']) && $_GET['errorId'] == 50) {
                    echo '<span class="erro" style="display:inline-block !important">a imagem não pode ser maior que 200Kb</span>';
                }
                ?>
                <form name="cadExpositor" id="cadExpositor" action="control/controleExpositores.php" enctype="multipart/form-data" method="post" class="tableform">
                    <input type="hidden" value="cadastrar" name="opcao" id="opcao" />
                    <table class="tableform">
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
                            <td>Estande:</td>
                            <td>
                                <input type="text" name="estande" id="estande" /><br />
                                <span id="spanEstande" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Publicação:</td>
                            <td>
                                <input type="text" name="dataPublicacao" id="dataPublicacao" /><br />
                                <span id="spanDataPublicacao" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Imagem:</td>
                            <td>
                                <input type="file" name="imagem" id="imagem" /><br />
                                <span id="spanImagem" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrar" value="Cadastrar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
