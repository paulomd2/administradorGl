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
                <form name="cadCaravana" class="tableform">
                    <table>
                        <tr>
                            <td>Nome:</td>
                            <td>
                                <input type="text" name="nome" id="nome" /><br />
                                <span id="spanNome" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Responsável:</td>
                            <td>
                                <input type="text" name="responsavel" id="responsavel" /><br />
                                <span id="spanResponsavel" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>
                                <input type="text" name="email" id="email" /><br />
                                <span id="spanEmail" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Telefone:</td>
                            <td>
                                <input type="text" name="telefone" id="telefone" /><br />
                                <span id="spanTelefone" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Celular:</td>
                            <td>
                                <input type="text" name="celular" id="celular" /><br />
                                <span id="spanTelefone" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td>
                                <select name="estado" id="estado">
                                    <option value="">Selecione um Estado...</option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espirito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select><br />
                                <span id="spanEstado" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Cidade:</td>
                            <td>
                                <input type="text" name="cidade" id="cidade" /><br />
                                <span id="spanCidade" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Local:</td>
                            <td>
                                <input type="text" name="local" id="local" /><br />
                                <span id="spanLocal" class="erro"></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="button" id="btnCadastrarCaravana" value="Cadastrar" /></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>