<?php
require_once '../model/banco.php';
require_once '../conteudos/model/dao.php';

$diretorio = $_SERVER['REQUEST_URI'];
$diretorio = explode('/', $diretorio);
?>

<aside class="barra-lateral" id="barra-lateral">
    <ul>
        <li class="hasub"><a href="#1"><i class="icon icon-file-text2"></i> Conteúdo </a>
            <ul id="1">
                <li><a href="../conteudos/cadMenu.php">Cadastrar menu</a></li>
                <?php
                $menu = $objConteudoDao->listaMenus();

                for ($i = 1; $i < count($menu); $i++) {
                    echo '<li><a href="../conteudos/verSubmenus.php?id=' . $menu[$i]["idMenu"] . '#1" onclick="javascript:void(0);">' . $menu[$i]['titulo'] . '</a></li>';
                }
                ?>


            </ul>
        </li>
        <li class="hasub"><a href="#2"><i class="icon icon-cog"></i> Administração</a>
            <ul id="2">
                <li><a href="#" onclick="javascript:void(0);">Item</a></li>
            </ul>
        </li>
        <li class="hasub"><a href="#3"><i class="icon icon-user"></i> Usuários</a>
            <ul id="3">
                <li><a href="../usuarios/">Cadastrar usuário</a></li>
                <li><a href="../usuarios/verUsuarios.php">Usuários Cadastrados</a></li>
            </ul>
        </li>
        <li><a href="../noticias" <?php
            if (array_search('noticias', $diretorio) == true) {
                echo 'class="ativo"';
            }
            ?>><i class="icon icon-newspaper"></i> Notícias</a></li>
        <li><a href="../releases/" <?php
            if (array_search('releases', $diretorio) == true) {
                echo 'class="ativo"';
            }
            ?>><i class="icon icon-newspaper"></i> Releases</a></li>
        <li><a href="#"><i class="icon icon-tv"></i> Destaques</a></li>
        <li><a href="../eventos" <?php
            if (array_search('eventos', $diretorio) == true) {
                echo 'class="ativo"';
            }
            ?>><i class="icon icon-calendar"></i> Eventos</a></li>
        <li><a href="#"><i class="icon icon-image"></i> Banners</a></li>
        <li><a href="#"><i class="icon icon-upload2"></i> Uploads</a></li>
    </ul>
    <section id="scrollbar-track">
        <div id="scrollbar"></div>
    </section>
</aside>