<?php
require_once '../model/banco.php';
require_once '../conteudos/model/dao.php';

$diretorio = $_SERVER['REQUEST_URI'];
$diretorio = explode('/', $diretorio);
?>

<script type="text/javascript">
    $(document).ready(function () {
<?php
if (array_search('conteudos', $diretorio) == true) {
    echo "$('.tgl1').css('display', 'block');";
    echo "$('.tgl3').css('display', 'none');";
    echo "$('.tgl2').css('display', 'none');";
}

if (array_search('usuarios', $diretorio) == true) {
    echo "$('.tgl3').css('display', 'block');";
    echo "$('.tgl1').css('display', 'none');";
    echo "$('.tgl2').css('display', 'none');";
}


if (array_search('newsletter', $diretorio) || array_search('contatos', $diretorio) || array_search('redes', $diretorio) || array_search('rodapes', $diretorio)) {
    echo "$('.tgl2').css('display', 'block');";
    echo "$('.tgl1').css('display', 'none');";
    echo "$('.tgl3').css('display', 'none');";
}
?>
        $('span', '.hasub').click(function () {
            $(this).next().slideToggle('slow').siblings('.tgl:visible').slideToggle('fast');
        });
    });
</script>

<aside class="barra-lateral" id="barra-lateral">
    <ul>
        <li class="hasub">
            <span>
                <a href="#">
                    <i class="icon icon-file-text2"></i> Conteúdo
                </a>
            </span>
            <ul class="tgl1">
                <li><a href="../conteudos/">Gerenciar conteúdo</a></li>
                <?php
                $menu = $objConteudoDao->listaMenus();

                for ($i = 1; $i < count($menu); $i++) {
                    echo '<li><a href="../conteudos/verSubmenus.php?id=' . $menu[$i]["idMenu"] . '#1" onclick="javascript:void(0);">' . $menu[$i]['titulo'] . '</a></li>';
                }
                ?>
            </ul>
        </li>
        <li class="hasub">
            <span>
                <a href="#">
                    <i class="icon icon-cog"></i> Administração
                </a>
            </span>
            <ul class="tgl2">
                <li><a href="../newsletter" <?php
                    if (array_search('newsletter', $diretorio) == true) {
                        echo 'class="ativo"';
                    }
                    ?>>Newsletter</a></li>
                <li><a href="../contatos" <?php
                    if (array_search('contatos', $diretorio) == true) {
                        echo 'class="ativo"';
                    }
                    ?>>Contato</a></li>

                <li><a href="../redes" <?php
                    if (array_search('redes', $diretorio) == true) {
                        echo 'class="ativo"';
                    }
                    ?>>Redes Sociais</a></li>
                <li><a href="../rodapes" <?php
                    if (array_search('rodapes', $diretorio) == true) {
                        echo 'class="ativo"';
                    }
                    ?>>Rodpé</a></li>
            </ul>
        </li>
        <li><a href="../usuarios" <?php
            if (array_search('usuarios', $diretorio) == true) {
                echo 'class="ativo"';
            }
            ?>><i class="icon icon-user"></i> Usuários</a></li>
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
        <li><a href="../destaques" <?php
            if (array_search('destaques', $diretorio) == true) {
                echo 'class="ativo"';
            }
            ?>><i class="icon icon-tv"></i> Destaques</a></li>
        <li><a href="../eventos" <?php
            if (array_search('eventos', $diretorio) == true) {
                echo 'class="ativo"';
            }
            ?>><i class="icon icon-calendar"></i> Eventos</a></li>
        <li><a href="../banners/" <?php
            if (array_search('banners', $diretorio) == true) {
                echo 'class="ativo"';
            }
            ?>><i class="icon icon-image"></i> Banners</a></li>
        <li><a href="#"><i class="icon icon-upload2"></i> Uploads</a></li>
    </ul>
</aside>