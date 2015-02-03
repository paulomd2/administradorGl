<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="js/redes.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="./">Redes</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Atualizar redes</h1>
                <?php
                    require_once '../model/banco.php';
                    require_once 'model/dao.php';
                    
                    $redes = $objRedeDao->listaRede1();
                    
                    if(count($redes)==0){
                        $opcao = 'cadastrar';
                    }else{
                        $opcao = 'alterar';
                    }
                ?>
                <table class="tableform">
                    <input type="hidden" value="<?php echo $opcao; ?>" id="opcao" />
                    <tr>
                        <td><i class="icon icon-facebook"></i> Facebook:</td>
                        <td><input type="text" name="facebook" id="facebook" value="<?php echo $redes['facebook']?>" /></td>
                    </tr>
                    <tr>
                        <td><i class="icon icon-twitter"></i> Twitter:</td>
                        <td><input type="text" name="twitter" id="twitter" value="<?php echo $redes['twitter']?>" /></td>
                    </tr>
                    <tr>
                        <td><i class="icon icon-google-plus"></i> Google Plus:</td>
                        <td><input type="text" name="google" id="google" value="<?php echo $redes['google']?>" /></td>
                    </tr>
                    <tr>
                        <td><i class="icon icon-instagram"></i> Instagram:</td>
                        <td><input type="text" name="instagram" id="instagram" value="<?php echo $redes['instagram']?>" /></td>
                    </tr>
                    <tr>
                        <td><i class="icon icon-flickr"></i> Flickr:</td>
                        <td><input type="text" name="flickr" id="flickr" value="<?php echo $redes['flickr']?>" /></td>
                    </tr>
                    <tr>
                        <td><i class="icon icon-youtube"></i> Youtube:</td>
                        <td><input type="text" name="youtube" id="youtube" value="<?php echo $redes['youtube']?>" /></td>
                    </tr>
                    <tr>
                        <td colspan='2'><input type="button" id="btnEnviar" value="Salvar" /></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>