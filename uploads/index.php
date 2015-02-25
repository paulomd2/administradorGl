<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/upload.js"></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <!-- polyfiller file to detect and load polyfills -->
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
        <script src="../plugin/uploadify/jquery.uploadify.js"></script>
        <link rel="stylesheet" href="../plugin/uploadify/uploadify.css" />
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
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Expositores</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Últimos expositores</h1>
                <a href="verExpositores.php" class="proPage">Ver todos os expositores</a>
                <table class="tableAll">
                    <thead>
                        <tr>
                            <td>Arquivo</td>
                            <td>Pasta</td>
                            <td>Editar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody id="listaExpositores"></tbody>
                </table>
                <hr/>
                <h1>Cadastrar Arquivos</h1>
                <form name="cadUpload" id="cadUpload" action="control/controleUpload.php" enctype="multipart/form-data" method="post" class="tableform">
                    <input type="hidden" value="cadastrar" name="opcao" id="opcao" />
                    <table>
                        <tr>
                            <td>Pasta:</td>
                            <td>
                                <select id="pasta" name="pasta">
                                    <option value="">Pasta raiz</option>
                                    <?php
                                    require_once '../model/banco.php';
                                    require_once 'model/dao.php';

                                    $pastas = $objUploadDao->listaPastas();

                                    for ($i = 0; $i < count($pastas); $i++) {
                                        echo '<option value="' . $pastas[$i]["pastas"] . '">' . $pastas[$i]["pastas"] . '</option>';
                                    }
                                    ?>
                                    <option value="nova">Nova pasta</option>
                                </select>
                                <input type="text" name="outraPasta" id="outraPasta" style="display: none" /><br />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrar" value="Criar Pasta" /></td>
                        </tr>
                        <tr>
                            <td>Arquivo:</td>
                            <td>
                                <div id="queue"></div>
                                <input id="file_upload" name="file_upload" type="file" multiple="true">

                                <script type="text/javascript">
                                    <?php $timestamp = time(); ?>
                                    $(function () {
                                        pasta = '';
                                        
                                        if($("#outraPasta").val() != ''){
                                            pasta = $("#outraPasta").val();
                                        }else{
                                            pasta = $("#pasta").val();
                                        }
                                        $('#file_upload').uploadify({
                                            'formData': {
                                                'timestamp': '<?php echo $timestamp; ?>',
                                                'token': '<?php echo md5('unique_salt' . $timestamp); ?>',
                                                'folder': pasta
                                            },
                                            'swf'      : '../plugin/uploadify/uploadify.swf',
                                            'uploader': '../plugin/uploadify/uploadify.php'
                                        });
                                    });
                                </script>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
