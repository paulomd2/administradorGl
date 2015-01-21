<?php
define('CON_ADMIN_HOST','localhost');
define("CON_ADMIN_USER","root");
define("CON_ADMIN_PASS","");
define("CON_ADMIN_BASE","admingl");

//Constantes de banco
define("DB_ADMIN"," ".CON_ADMIN_BASE.".");

//Constantes prefixo sistema
define("TBL_ADMIN","");

//Constantes de Tabela
//Tabelas ADMIN
define("TBL_USUARIOS",DB_ADMIN.TBL_ADMIN."usuarios ");
define("TBL_NOTICIAS",DB_ADMIN.TBL_ADMIN."noticias ");
define("TBL_EVENTOS",DB_ADMIN.TBL_ADMIN."eventos ");
define("TBL_MENU",DB_ADMIN.TBL_ADMIN."menus ");
define("TBL_SUBMENU",DB_ADMIN.TBL_ADMIN."submenus ");
define("TBL_RELEASE",DB_ADMIN.TBL_ADMIN."releases ");