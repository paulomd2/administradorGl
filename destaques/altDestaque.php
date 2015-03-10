<php
session_start();
setcookie("ck_authorized", "true", 0, "/");
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Painel | Fagga</title>
        <?php include_once '../include/head.php'; ?>
        <script type="text/javascript" src="../js/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/destaque.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php include_once '../include/header.php'; ?>
        <?php include_once '../include/lateral.php'; ?>

        <div class="main-admin">
            <div class="guia-site">
                <a href="../home/"><i class="icon icon-home"></i> Home</a>
                <a href="./">Destaques</a>
                <a href="#">Alterar destaque</a>
            </div>
            <div class="tenor">
                <h1>Alterar destaque</h1>

                <?php
                require_once '../model/banco.php';
                require_once 'model/dao.php';

                $idDestaque = $_GET['id'];

                $objDestaque->setIdDestaque($idDestaque);

                $destaque = $objDestaqueDao->verDestaque1($objDestaque);
                
                $explodeDataPublicacao = explode(' ',$destaque['dataPublicacao']);
                $dataPublicacao = $explodeDataPublicacao[0];
                $explodeHoraEntrada = explode(':', $explodeDataPublicacao[1]);
                $horaEntrada = $explodeHoraEntrada[0];
                $minutoEntrada = $explodeHoraEntrada[1];
                
                $explodeDataSaida= explode(' ',$destaque['dataSaida']);
                $dataSaida = $explodeDataSaida[0];
                $explodeHoraSaida = explode(':', $explodeDataSaida[1]);
                $horaSaida = $explodeHoraSaida[0];
                $minutoSaida = $explodeHoraSaida[1];
                ?>
                <div>
                    <form name="cadDestaque" id="cadDestaque" action="control/controleDestaque.php" enctype="multipart/form-data" method="post">
                        <input type="hidden" value="alterar" name="opcao" />
                        <input type="hidden" value="<?php echo $destaque['idDestaque'] ?>" name="idDestaque" />
                        <input type="hidden" value="<?php echo $destaque['imagem']; ?>" name="imagemAntiga" />
                        <table class="tableform">
                            <tr>
                                <td>Título:</td>
                                <td>
                                    <input type="text" name="titulo" id="titulo" value="<?php echo $destaque['titulo']; ?>" /><br />
                                    <span id="spanTitulo" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Sub-título:</td>
                                <td>
                                    <input type="text" name="subtitulo" id="subtitulo" value="<?php echo $destaque['subtitulo']; ?>" /><br />
                                    <span id="spanSub" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Link Externo:</td>
                                <td>
                                    <input type="text" name="link" id="link" value="<?php echo $destaque['link']; ?>" /><br />
                                    <span id="spanLink" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Data de Publicação:</td>
                                <td>
                                    <input type="date" name="dataPublicacao" id="dataPublicacao" value="<?php echo $dataPublicacao; ?>" />
                                    <select id="horaPublicacao" name="horaPublicacao">
                                        <option value="00" <?php if($horaEntrada == '00'){echo 'selected';} ?>>00</option>
                                        <option value="01" <?php if($horaEntrada == '01'){echo 'selected';} ?>>01</option>
                                        <option value="02" <?php if($horaEntrada == '02'){echo 'selected';} ?>>02</option>
                                        <option value="03" <?php if($horaEntrada == '03'){echo 'selected';} ?>>03</option>
                                        <option value="04" <?php if($horaEntrada == '04'){echo 'selected';} ?>>04</option>
                                        <option value="05" <?php if($horaEntrada == '05'){echo 'selected';} ?>>05</option>
                                        <option value="06" <?php if($horaEntrada == '06'){echo 'selected';} ?>>06</option>
                                        <option value="07" <?php if($horaEntrada == '07'){echo 'selected';} ?>>07</option>
                                        <option value="08" <?php if($horaEntrada == '08'){echo 'selected';} ?>>08</option>
                                        <option value="09" <?php if($horaEntrada == '09'){echo 'selected';} ?>>09</option>
                                        <option value="10" <?php if($horaEntrada == '10'){echo 'selected';} ?>>10</option>
                                        <option value="11" <?php if($horaEntrada == '11'){echo 'selected';} ?>>11</option>
                                        <option value="12" <?php if($horaEntrada == '12'){echo 'selected';} ?>>12</option>
                                        <option value="13" <?php if($horaEntrada == '13'){echo 'selected';} ?>>13</option>
                                        <option value="14" <?php if($horaEntrada == '14'){echo 'selected';} ?>>14</option>
                                        <option value="15" <?php if($horaEntrada == '15'){echo 'selected';} ?>>15</option>
                                        <option value="16" <?php if($horaEntrada == '16'){echo 'selected';} ?>>16</option>
                                        <option value="17" <?php if($horaEntrada == '17'){echo 'selected';} ?>>17</option>
                                        <option value="18" <?php if($horaEntrada == '18'){echo 'selected';} ?>>18</option>
                                        <option value="19" <?php if($horaEntrada == '19'){echo 'selected';} ?>>19</option>
                                        <option value="20" <?php if($horaEntrada == '20'){echo 'selected';} ?>>20</option>
                                        <option value="21" <?php if($horaEntrada == '21'){echo 'selected';} ?>>21</option>
                                        <option value="22" <?php if($horaEntrada == '22'){echo 'selected';} ?>>22</option>
                                        <option value="23" <?php if($horaEntrada == '23'){echo 'selected';} ?>>23</option>
                                        <option value="24" <?php if($horaEntrada == '24'){echo 'selected';} ?>>24</option>
                                    </select>:
                                    <select id="minutoPublicacao" name="minutoPublicacao">
                                        <option value="00" <?php if($minutoEntrada == '00'){echo 'selected';} ?>>00</option>
                                        <option value="15" <?php if($minutoEntrada == '15'){echo 'selected';} ?>>15</option>
                                        <option value="30" <?php if($minutoEntrada == '30'){echo 'selected';} ?>>30</option>
                                        <option value="45" <?php if($minutoEntrada == '45'){echo 'selected';} ?>>45</option>
                                    </select><br />
                                    <span id="spanSaida" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Data de Saída:</td>
                                <td>
                                    <input type="date" name="dataSaida" id="dataSaida" />
                                    <select id="horaSaida" name="horaSaida">
                                        <option value="00" <?php if($horaSaida == '00'){echo 'selected';} ?>>00</option>
                                        <option value="01" <?php if($horaSaida == '01'){echo 'selected';} ?>>01</option>
                                        <option value="02" <?php if($horaSaida == '02'){echo 'selected';} ?>>02</option>
                                        <option value="03" <?php if($horaSaida == '03'){echo 'selected';} ?>>03</option>
                                        <option value="04" <?php if($horaSaida == '04'){echo 'selected';} ?>>04</option>
                                        <option value="05" <?php if($horaSaida == '05'){echo 'selected';} ?>>05</option>
                                        <option value="06" <?php if($horaSaida == '06'){echo 'selected';} ?>>06</option>
                                        <option value="07" <?php if($horaSaida == '07'){echo 'selected';} ?>>07</option>
                                        <option value="08" <?php if($horaSaida == '08'){echo 'selected';} ?>>08</option>
                                        <option value="09" <?php if($horaSaida == '09'){echo 'selected';} ?>>09</option>
                                        <option value="10" <?php if($horaSaida == '10'){echo 'selected';} ?>>10</option>
                                        <option value="11" <?php if($horaSaida == '11'){echo 'selected';} ?>>11</option>
                                        <option value="12" <?php if($horaSaida == '12'){echo 'selected';} ?>>12</option>
                                        <option value="13" <?php if($horaSaida == '13'){echo 'selected';} ?>>13</option>
                                        <option value="14" <?php if($horaSaida == '14'){echo 'selected';} ?>>14</option>
                                        <option value="15" <?php if($horaSaida == '15'){echo 'selected';} ?>>15</option>
                                        <option value="16" <?php if($horaSaida == '16'){echo 'selected';} ?>>16</option>
                                        <option value="17" <?php if($horaSaida == '17'){echo 'selected';} ?>>17</option>
                                        <option value="18" <?php if($horaSaida == '18'){echo 'selected';} ?>>18</option>
                                        <option value="19" <?php if($horaSaida == '19'){echo 'selected';} ?>>19</option>
                                        <option value="20" <?php if($horaSaida == '20'){echo 'selected';} ?>>20</option>
                                        <option value="21" <?php if($horaSaida == '21'){echo 'selected';} ?>>21</option>
                                        <option value="22" <?php if($horaSaida == '22'){echo 'selected';} ?>>22</option>
                                        <option value="23" <?php if($horaSaida == '23'){echo 'selected';} ?>>23</option>
                                        <option value="24" <?php if($horaSaida == '24'){echo 'selected';} ?>>24</option>
                                    </select>:
                                    <select id="minutoSaida" name="minutoSaida">
                                        <option value="00" <?php if($minutoSaida == '00'){echo 'selected';} ?>>00</option>
                                        <option value="15" <?php if($minutoSaida == '15'){echo 'selected';} ?>>15</option>
                                        <option value="30" <?php if($minutoSaida == '30'){echo 'selected';} ?>>30</option>
                                        <option value="45" <?php if($minutoSaida == '45'){echo 'selected';} ?>>45</option>
                                    </select><br />
                                    <span id="spanPublicacao" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Conteudo:</td>
                                <td>
                                    <textarea name="conteudo" id="conteudo" rows="10" cols="40"><?php echo $destaque['conteudo']; ?></textarea>
                                    <span id="spanConteudo" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Imagem de Capa:</td>
                                <td>
                                    <img src='../images/<?php echo $destaque['imagem']; ?>' width="100"/><br />
                                    <input type="file" id="imagem" name="imagem" /><br />
                                    <span id="spanImagem" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Status:</td>
                                <td>
                                    <select id="status" name="status">
                                        <option value="">Selecione um status</option>
                                        <option value="1" <?php if($destaque['status'] == '1'){ echo 'selected'; } ?>>Habilitado</option>
                                        <option value="2" <?php if($destaque['status'] == '2'){ echo 'selected'; } ?>>Desabilitado</option>
                                    </select><br />
                                    <span id="spanStatus" class="erro"></span>
                                </td>
                            </tr>
                            <tr>
                            <td>Idioma:</td>
                            <td>
                                <input type="radio" name="lingua" id="pt" value="pt" <?php if($destaque['lingua'] == 'pt'){echo 'checked'; } ?> /> <label for="pt">Português</label>
                                <input type="radio" name="lingua" id="en" value="en" <?php if($destaque['lingua'] == 'en'){echo 'checked'; } ?> /> <label for="en">Inglês</label>
                                <input type="radio" name="lingua" id="es" value="es" <?php if($destaque['lingua'] == 'es'){echo 'checked'; } ?> /> <label for="es">Espanhol</label>
                            </td>
                        </tr>
                            <tr>
                                <td colspan="2"><input type="button" id="btnAlterar" value="Alterar" /></td>
                            </tr>
                        </table>
                    </form>                

                    <script>
                        CKEDITOR.replace('conteudo', {
                            uiColor: '#dfdfdf',
                            filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
                        });
                    </script>

                </div>
            </div>
    </body>
</html>
