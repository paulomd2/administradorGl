<?php
require_once '../model/banco.php';
require_once 'model/dao.php';

$id = $_GET['id'];

$email = $objContatoDao->verContato1($id);
?>
<html>
    <head>
        <script type="text/javascript" src="js/banners.js"></script>
        <script src="../plugin/ckeditor/ckeditor.js"></script>
        <script>
            document.ready(function(){
                $("#btnResponder").click(function(){
                    CKEDITOR.instances.texto.updateElement();
                    var mensagem  = CKEDITOR.instances.mensagem.getData();
                    
                    $(".erro").html('').css('display','none');
                    if(mensagem == ''){
                        $("#spanMensagem").html('Você deve preencher uma mensagem!').css('display','inline-block');
                    }else{
                        $.post('control/controleContatos.php',{idContato:idContato, mensagem:mensagem},
                        function(r){
                            console.log(r);
                        })
                    }
                });
            })
        </script>
    </head>
    <body>
        <table class="tableform">
            <tr>
                <td>Nome:</td>
                <td><?php echo $email['nome']; ?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?php echo $email['email']; ?></td>
            </tr>
            <tr>
                <td>Assunto:</td>
                <td><?php echo $email['assunto']; ?></td>
            </tr>
            <tr>
                <td>Mensagem:</td>
                <td><?php echo $email['mensagem']; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea id="mensagem" name="mensagem" rows="10" cols="40"></textarea><br />
                    <span id="spanMensagem" class="erro"></span>
                    <input type="hidden" value="<?php echo $id; ?>" name="idContato" id="idContato" />
                </td>
            </tr>
            <tr>
                <td colspan="2"> <input type="button" value="responder" id="btnResponder" /> </td>
            </tr>
        </table>
        <script>
            CKEDITOR.replace('mensagem', {
                uiColor: '#dfdfdf',
                filebrowserImageBrowseUrl: '../plugin/ckfinder/ckfinder.html?Type=Images',
            });
        </script> 
    </body>
</html>