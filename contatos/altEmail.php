<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <!--<script type="text/javascript" src="../js/jquery-2.1.3.js"></script>-->
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/contatos.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Contato</a>
                <a href="#">Alterar contatos</a>
            </div>
            <div class="tenor">
                <h1>Alterar notícia</h1>

                <?php
                require_once '../model/banco.php';
                require_once 'model/dao.php';

                $idEmail = $_GET['id'];

                $objEmail->setIdEmail($idEmail);

                $email = $objContatoDao->verEmail1($objEmail);
                ?>
                <div>
                    <form name="altContato">
                        <input type="hidden" value="<?php echo $email['idEmail']; ?>" id="idEmail" />
                        <table class="tableform">
                            <tr>
                                <td>Nome:</td>
                                <td>
                                    <input type="text" name="nome" id="nome" value="<?php echo $email['nome']; ?>" /><br />
                                    <span id="spanNome" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>
                                    <input type="text" name="email" id="email" value="<?php echo $email['email']; ?>" /><br />
                                    <span id="spanEmail" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="button" id="btnAlterar" value="Alterar" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
