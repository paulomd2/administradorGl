<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <style>
            .slidesjs-pagination{margin:0 15px 0 0;list-style:none;position:relative;z-index:999}.slidesjs-pagination li{float:left;margin:0 1px}.slidesjs-pagination li a{display:block;width:13px;height:0;padding-top:13px;background-image:url(../imagens/pagination.png);background-position:0 0;float:left;overflow:hidden}.slidesjs-pagination li a.active,.slidesjs-pagination li a:hover.active{background-position:0 -13px}.slidesjs-pagination li a:hover{background-position:0 -26px}#slides{width:90%;height:auto;position:relative}#slides img{width:100%}
        </style>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="#"><i class="icon icon-home"></i> Home</a>
            </div>
            <div class="box noticias">
                <div class="tit-box">
                    <strong>ÚLTIMAS</strong> NOTÍCIAS
                    <!--<div class="plus"><a href="#"><i class="icon icon-pencil"></i></a></div>-->
                    <div class="plus"><a href="../noticias/verNoticias.php">+</a></div>
                </div>
                <table>
                    <?php
                    require_once '../model/banco.php';
                    require_once '../noticias/model/dao.php';

                    $noticias = $objNoticiasDao->verNoticias(4);

                    for ($i = 1; $i < count($noticias); $i++) {
                        $explode = explode('/', $noticias[$i]["dataPublicacao"]);
                        $data = $explode[0] . '/' . $explode[1];

                        echo '
                                    <tr>
                                        <td>' . $data . '</td>
                                        <td><a href="../noticias/altNoticia.php?id=' . $noticias[$i]["idNoticia"] . '">' . $noticias[$i]["titulo"] . '</a></td>
                                    </tr>
                                 ';
                    }
                    ?>
                </table>
            </div>
            <div class="box eventos">
                <div class="tit-box">
                    <strong>ÚLTIMOS</strong> EVENTOS
                    <div class="plus"><a href="../eventos/verEventos.php">+</a></div>
                </div>
                <table>
                    <?php
                    require_once '../model/banco.php';
                    require_once '../eventos/model/dao.php';

                    $eventos = $objEventoDao->verEventos(8);

                    for ($i = 1; $i < count($eventos); $i++) {
                        $explode = explode('/', $eventos[$i]["dataInicio"]);
                        $data = $explode[0] . '/' . $explode[1];

                        echo '
                                    <tr>
                                        <td>' . $data . '</td>
                                        <td><a href="../eventos/altEvento.php?id=' . $eventos[$i]["idEvento"] . '">' . $eventos[$i]["nome"] . '</a></td>
                                    </tr>
                                 ';
                    }
                    ?>
                </table>
            </div>
            <div class="box banners" style="background: #fff;">
                <div class="tit-box">
                    <strong>ÚLTIMOS</strong> BANNERS
                    <div class="plus"><a href="../banners/verBanners.php">+</a></div>
                </div>
                <div style="width: 373px; height: 230px; margin: 0 auto; padding: 15px 0;">
                    <div id="slides">
                        <img src="../imagens/example-slide-1.jpg" alt="Photo by: Missy S Link: http://www.flickr.com/photos/listenmissy/5087404401/">
                        <img src="../imagens/example-slide-2.jpg" alt="Photo by: Daniel Parks Link: http://www.flickr.com/photos/parksdh/5227623068/">
                        <img src="../imagens/example-slide-3.jpg" alt="Photo by: Mike Ranweiler Link: http://www.flickr.com/photos/27874907@N04/4833059991/">
                        <img src="../imagens/example-slide-4.jpg" alt="Photo by: Stuart SeegerLink: http://www.flickr.com/photos/stuseeger/97577796/">
                    </div>

                    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
                    <script src="../js/jquery.slides.min.js"></script>
                    <script>
                        $(function() {
                            $('#slides').slidesjs({
                                width: 373,
                                height: 220,
                                navigation: false
                            });
                        });
                    </script>
                </div>

            </div>
            <div class="box destaques">
                <div class="tit-box">
                    <strong>ÚLTIMOS</strong> DESTAQUES
                    <div class="plus"><a href="../destaques/verDestaques.php">+</a></div>
                </div>
                <table>
                    <tr>
                        <td>29/09</td>
                        <td><a href="#">FLAMENGO X BAURU NA NBB 07</a></td>
                    </tr>
                    <tr>
                        <td>29/09</td>
                        <td><a href="#">LANÇAMENTO DO DVD - PAULO GUSTAVO</a></td>
                    </tr>
                    <tr>
                        <td>29/09</td>
                        <td><a href="#">ED SHEERAN</a></td>
                    </tr>
                    <tr>
                        <td>29/09</td>
                        <td><a href="#">Lançamento do DVD de Martin</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
