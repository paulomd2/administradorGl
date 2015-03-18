<?php
@session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once 'constantesBanco.php';

//função para remover expressões comuns de banco de dados
function seg($var) {
    $procura = array("insert into", "update", "delete from", "select % from");
    $retorno = str_ireplace($procura, '', $var);
//    $retorno = htmlentities($retorno);
    
    return $retorno;
}

//Constantes de Tabela
//Tabelas ADMIN
define("TBL_USUARIO",DB_ADMIN.TBL_ADMIN."usuarios ");
define("TBL_NOTICIA",DB_ADMIN.TBL_ADMIN."noticias ");
define("TBL_EVENTO",DB_ADMIN.TBL_ADMIN."eventos ");
define("TBL_MENU",DB_ADMIN.TBL_ADMIN."menus ");
define("TBL_SUBMENU",DB_ADMIN.TBL_ADMIN."submenus ");
define("TBL_PAGINA",DB_ADMIN.TBL_ADMIN."paginas ");
define("TBL_RELEASE",DB_ADMIN.TBL_ADMIN."releases ");
define("TBL_BANNER",DB_ADMIN.TBL_ADMIN."banners ");
define("TBL_DESTAQUE",DB_ADMIN.TBL_ADMIN."destaques ");
define("TBL_NEWS",DB_ADMIN.TBL_ADMIN."newsletters ");
define("TBL_EMAIL",DB_ADMIN.TBL_ADMIN."emailscontatos ");
define("TBL_CONTATO",DB_ADMIN.TBL_ADMIN."emailsrecebidos ");
define("TBL_RESPOSTAS", DB_ADMIN . TBL_ADMIN . "emailsrespostas ");
define("TBL_REDES", DB_ADMIN . TBL_ADMIN . "redes ");
define("TBL_CATEGORIA_RODAPE", DB_ADMIN . TBL_ADMIN . "rodapecategorias ");
define("TBL_IMAGEM_RODAPE", DB_ADMIN . TBL_ADMIN . "rodapeimagens ");
define("TBL_EXPOSITORES", DB_ADMIN . TBL_ADMIN . "expositores ");
define("TBL_TEXTO_CARAVANA", DB_ADMIN . TBL_ADMIN . "caravanaprincipal ");
define("TBL_CARAVANA", DB_ADMIN . TBL_ADMIN . "caravanas ");
define("TBL_BLOG_POSTAGEM", DB_ADMIN . TBL_ADMIN . "blogpostagens ");
define("TBL_UPLOAD", DB_ADMIN . TBL_ADMIN . "uploads ");
define("TBL_LOG", DB_ADMIN . TBL_ADMIN . "logs ");