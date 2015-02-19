<?php
@session_start();

if(empty($_SESSION)){
    header('Location: ../');
}
?>
<script src="../usuarios/js/usuario.js"></script>
<div class="center-user">
    <div class="detail-user">
        <figure class="avatar fl">
            <a href="../home"><img src="http://www.portalgl.com.br/imagens/logo_glevents.png" alt="Nome avatar" /></a>
        </figure>
        <div class="fr"></div>
        <span><em>Seja Bem vindo</em></span>
        <span>
            <?php
            require_once '../model/banco.php';
            require_once '../usuarios/model/dao.php';
            
            $objUsuario->setIdUsuario($_SESSION['id']);
            
            $usuarioLogado = $objUsuarioDao->verUsuario1($objUsuario);
            
            echo $usuarioLogado['nome'];
            ?>
        </span>
    </div>
    <div class="barra-user">
        <div class="busca">
            <a href="#" onclick="javascript:mostraForm('formbusca');"><i class="icon icon-search"></i></a>
            <form action="" method="get" class="form-busca-oculta" id="formbusca">
                <input type="text" name="nome"/>
                <select>
                    <option>NOTÍCIA</option>
                    <option>RELEASES</option>
                    <option>EVENTOS</option>
                </select>
                <input type="submit" value="BUSCAR"/>
            </form>
        </div>
        <div class="logout">
            <a href="#" class="visu-site">Visualizar site</a>
            <a href="#" onclick="deslogar()" class="sair">Sair</a>
        </div>
    </div>
    <div class="cb"></div>
</div>
