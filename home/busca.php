<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script>
                $(document).ready(function(){
                    var titulo = localStorage.modulo.toLowerCase();
                    titulo += ' encontrados';
                    titulo = titulo.charAt(0).toUpperCase() + titulo.substring(1);
                    
                    $("#titulo").html(titulo);
                    
                    $("#listaBusca").load('listaBuscaAjax.php?modulo='+localStorage.modulo+'&busca='+localStorage.busca)
                })
        </script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="#"><i class="icon icon-home"></i> Home</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1 id="titulo"></h1>
                    <div id="listaBusca"></div>
                </table>
            </div>
        </div>
    </body>
</html>