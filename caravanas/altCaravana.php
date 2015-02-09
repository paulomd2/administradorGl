<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/caravanas.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home"><i class="icon icon-home"></i> Home</a>
                <a href="./">Caravanas</a>
                <a href="#">Cadastrar Caravana</a>
            </div>
            <div class="tenor" style="overflow: hidden!important;">
                <h1>Cadastrar caravana</h1>
                <a href="verCaravanas.php" class="proPage">Todas as Caravanas</a>
                <?php
                    require_once '../model/banco.php';
                    require_once 'model/dao.php';
                    
                    $objCaravana->setIdCaravana($_GET['id']);
                    
                    $caravana = $objCaravanaDao->listaCaravana1($objCaravana);
                ?>
                <form name="altCaravana" class="tableform">
                    <input type="hidden" value="<?php echo $_GET['id']; ?>" id="idCaravana" />
                    <table>
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" value="<?php echo $caravana['nome']; ?>" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Responsável:</td>
                            <td>
                                <input type="text" name="responsavel" id="responsavel" value="<?php echo $caravana['responsavel']; ?>" /><br />
                                <span id="spanResponsavel" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>
                                <input type="text" name="email" id="email" value="<?php echo $caravana['email']; ?>" /><br />
                                <span id="spanEmail" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Telefone:</td>
                            <td>
                                <input type="text" name="telefone" id="telefone" value="<?php echo $caravana['telefone']; ?>" /><br />
                                <span id="spanTelefone" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Celular:</td>
                            <td>
                                <input type="text" name="celular" id="celular" value="<?php echo $caravana['celular']; ?>" /><br />
                                <span id="spanTelefone" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td>
                                <select name="estado" id="estado">
                                    <option value="">Selecione um Estado...</option>
                                    <option value="AC" <?php if($caravana["estado"] == 'AC'){ echo 'selected'; }?>>Acre</option>
                                    <option value="AL" <?php if($caravana["estado"] == 'AL'){ echo 'selected'; }?>>Alagoas</option>
                                    <option value="AP" <?php if($caravana["estado"] == 'AP'){ echo 'selected'; }?>>Amapá</option>
                                    <option value="AM" <?php if($caravana["estado"] == 'AM'){ echo 'selected'; }?>>Amazonas</option>
                                    <option value="BA" <?php if($caravana["estado"] == 'BA'){ echo 'selected'; }?>>Bahia</option>
                                    <option value="CE" <?php if($caravana["estado"] == 'CE'){ echo 'selected'; }?>>Ceará</option>
                                    <option value="DF" <?php if($caravana["estado"] == 'DF'){ echo 'selected'; }?>>Distrito Federal</option>
                                    <option value="ES" <?php if($caravana["estado"] == 'ES'){ echo 'selected'; }?>>Espirito Santo</option>
                                    <option value="GO" <?php if($caravana["estado"] == 'GO'){ echo 'selected'; }?>>Goiás</option>
                                    <option value="MA" <?php if($caravana["estado"] == 'MA'){ echo 'selected'; }?>>Maranhão</option>
                                    <option value="MS" <?php if($caravana["estado"] == 'MS'){ echo 'selected'; }?>>Mato Grosso do Sul</option>
                                    <option value="MT" <?php if($caravana["estado"] == 'MT'){ echo 'selected'; }?>>Mato Grosso</option>
                                    <option value="MG" <?php if($caravana["estado"] == 'MG'){ echo 'selected'; }?>>Minas Gerais</option>
                                    <option value="PA" <?php if($caravana["estado"] == 'PA'){ echo 'selected'; }?>>Pará</option>
                                    <option value="PB" <?php if($caravana["estado"] == 'PB'){ echo 'selected'; }?>>Paraíba</option>
                                    <option value="PR" <?php if($caravana["estado"] == 'PR'){ echo 'selected'; }?>>Paraná</option>
                                    <option value="PE" <?php if($caravana["estado"] == 'PE'){ echo 'selected'; }?>>Pernambuco</option>
                                    <option value="PI" <?php if($caravana["estado"] == 'PI'){ echo 'selected'; }?>>Piauí</option>
                                    <option value="RJ" <?php if($caravana["estado"] == 'RJ'){ echo 'selected'; }?>>Rio de Janeiro</option>
                                    <option value="RN" <?php if($caravana["estado"] == 'RN'){ echo 'selected'; }?>>Rio Grande do Norte</option>
                                    <option value="RS" <?php if($caravana["estado"] == 'RS'){ echo 'selected'; }?>>Rio Grande do Sul</option>
                                    <option value="RO" <?php if($caravana["estado"] == 'RO'){ echo 'selected'; }?>>Rondônia</option>
                                    <option value="RR" <?php if($caravana["estado"] == 'RR'){ echo 'selected'; }?>>Roraima</option>
                                    <option value="SC" <?php if($caravana["estado"] == 'SC'){ echo 'selected'; }?>>Santa Catarina</option>
                                    <option value="SP" <?php if($caravana["estado"] == 'SP'){ echo 'selected'; }?>>São Paulo</option>
                                    <option value="SE" <?php if($caravana["estado"] == 'SE'){ echo 'selected'; }?>>Sergipe</option>
                                    <option value="TO" <?php if($caravana["estado"] == 'TO'){ echo 'selected'; }?>>Tocantins</option>
                                </select><br />
                                <span id="spanEstado" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Cidade:</td>
                            <td>
                                <input type="text" name="cidade" id="cidade" value="<?php echo $caravana['cidade']; ?>" /><br />
                                <span id="spanCidade" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Local:</td>
                            <td>
                                <input type="text" name="local" id="local" value="<?php echo $caravana['local']; ?>" /><br />
                                <span id="spanLocal" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnAlterarCaravana" value="Alterar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>