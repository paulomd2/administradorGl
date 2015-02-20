<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <style>
            .slidesjs-pagination{
                margin:0 15px 0 0;
                list-style:none;
                position:relative;
                z-index:999
            }
            .slidesjs-pagination li{
                float:left;
                margin:0 1px;
            }
            .slidesjs-pagination li a{
                display:block;
                width:13px;
                height:0;
                padding-top:13px;
                background-image:url(../imagens/pagination.png);
                background-position:0 0;
                float:left;
                /*overflow:hidden;*/
            }
            .slidesjs-pagination li a.active,.slidesjs-pagination li a:hover.active{
                background-position:0 -13px
            }
            .slidesjs-pagination li a:hover{
                background-position:0 -26px
            }
            #slides{
                width:90%;
                height:auto;
                position:relative;
            }
            #slides img{
                width:100%
            }
        </style>
        
        <script>
                $(document).ready(function(){
                    var titulo = '';
                    if(localStorage.modulo == 'noticias'){
                        titulo = 'Notícias encontradas';
                    }else if(localStorage.modulo == 'releases'){
                        titulo = 'Releases encontrados';
                    }else if(localStorage.modulo == 'eventos'){
                        titulo = 'Eventos encontrados';
                    }
                    
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