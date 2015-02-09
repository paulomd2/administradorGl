<?php
@session_start();
@$idUsuario = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/blog.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <!-- polyfiller file to detect and load polyfills -->
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
        <script>
            webshims.setOptions('waitReady', false);
            webshims.setOptions('forms-ext', {types: 'date'});
            webshims.polyfill('forms forms-ext');
        </script>
    </head>
</head>
<body>
    <?php include_once '../include/header.php'; ?>
    <?php include_once '../include/lateral.php'; ?>

    <div class="main-admin">
        <div class="guia-site">
            <a href="../home"><i class="icon icon-home"></i> Home</a>
            <a href="#">Usuário</a>
        </div>
        <div class="tenor" style="overflow: hidden!important;">
            <h1>Últimas Postagens</h1> <a href="verPostagens.php" class="proPage">Ver todas as postagens</a>
            <table class="tableAll">
                <thead>
                    <tr>
                        <td>Título</td>
                        <td>Data de Publicação</td>
                        <td>Editar</td>
                        <td>Excluir</td>
                    </tr>
                </thead>
                <tbody id="listaPostagens"></tbody>
            </table>
            <hr/>
            <h1>Cadastrar Postagem</h1>
            <form name="cadPostagem" class="tableform" method="post" action="control/controlePostagem.php" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $idUsuario ?>" id="idUsuario" name="idUsuario" />
                <input type="hidden" value="cadastrar" id="opcao" name="opcao" />
                <table>
                    <tr>
                        <td>Título:</td>
                        <td>
                            <input type="text" name="titulo" id="titulo" /><br />
                            <span id="spanTitulo" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Texto:</td>
                        <td>
                            <textarea id="texto" name="texto"></textarea><br />
                            <span id="spanTexto" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Data de Publicação:</td>
                        <td>
                            <input type="date" name="dataPublicacao" id="dataPublicacao" /><br />
                            <span id="spanDataPublicacao" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Data de Saída:</td>
                        <td>
                            <input type="date" name="dataSaida" id="dataSaida" /><br />
                            <span id="spanDataSaida" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Imagem:</td>
                        <td>
                            <input type="file" id="imagem" name="imagem" /><br />
                            <span id="spanImagem" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><h2>SEO</h2></td>
                    </tr>
                    <tr>
                        <td>Tag SEO:</td>
                        <td>
                            <input type="text" id="tagSeo" name="tagSeo" /><br />
                            <span id="spanTagSeo" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Descrição SEO:</td>
                        <td>
                            <textarea id="descricaoSeo" name="descricaoSeo"></textarea><br /><br />
                            <span id="spanDescricaoSeo" class="erro"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" id="btnCadastrar" value="Cadastrar" /></td>
                    </tr>
                </table>
            </form>
            <script>
                CKEDITOR.replace('texto', {
                    uiColor: '#ffffff',
                    filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
                });
                
                CKEDITOR.replace('descricaoSeo', {
                    uiColor: '#ffffff',
                    filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
                });
            </script>
        </div>
    </div>
</body>
</html>
