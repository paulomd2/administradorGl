<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/conteudo.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
        <style>
            .menu-conteudo{
                width: 600px;
                height: auto;
                /*padding: 8px;*/
                /*background: white;*/
                background: none;
                border: 1px solid #a2a5a6;
                /*box-shadow: 3px 3px #a2a5a6;*/
                border-radius: 5px;
                margin-bottom: 10px;
                background: white;
                padding: 5px;
            }
            .menu-conteudo span.titMenu{
                font-size: 16px;
                /*font-weight: bold;*/
                color: black;
                display: block;
                /*margin-bottom: 5px;*/
                /*border-bottom: 1px solid #a2a5a6;*/
                /*padding: 5px;*/
            }
            .menu-conteudo a{
                display: inline-block;
                font-size: 14px;
                color: #3366ff;
                text-decoration: none;
                /*padding: 5px;*/
            }
            .menu-conteudo a:hover{
                text-decoration: underline;
            }
            a.linkIcon{
                color: #333;
                text-decoration: none;
            }
            ul{
                list-style: none;
            }
        </style>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="#">Notícias</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1 style="display: inline;">Quem somos</h1> &nbsp;
                <a href="#" class="linkIcon"><i class="icon icon-pencil2"></i> Editar</a> |
                <a href="#" class="linkIcon"><i class="icon icon-bin"></i> Excluir</a>
                <br/>
                <a href="cadMenu.php" class="proPage">Cadastrar menu</a>
                <hr/>
                <h1>Sub conteúdos</h1>
                <ul>
                    <li>
                        <div class="menu-conteudo">
                            <span class="titMenu">Nome do submenu</span>
                            <a href="#">Editar</a> | <a href="#">Excluir</a>
                        </div>
                    </li>    
                    <li>
                        <div class="menu-conteudo">
                            <span class="titMenu">Nome do submenu</span>
                            <a href="#">Editar</a> | <a href="#">Excluir</a>
                        </div>
                    </li>    
                </ul>
            </div>
        </div>
    </body>
</html>