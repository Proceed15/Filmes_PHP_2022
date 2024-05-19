<?php

/** O nome do banco de dados*/
define('DB_NAME', 'Put your web database name here');
//define("DB_NAME", "wda_crud");

/** Usuário do banco de dados MySQL */
//define('DB_USER', 'root');
define("DB_USER", "Put your web database user here");

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'Put your web database password here');

/** nome do host do MySQL */
//define('DB_HOST', 'localhost');
define('DB_HOST', 'Put the domain of your web hoster here');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** caminho no server para o sistema **/
//if ( !defined("BASEURL") )
	//define("BASEURL","Put your path to the system server here");
if ( !defined("BASEURL") )
	define("BASEURL", "/");
	
/** caminho do arquivo de banco de dados **/
if ( !defined("DBAPI") )
	define("DBAPI", ABSPATH ."inc/database.php");
define("HEADER_TEMPLATE", ABSPATH . "inc/header.php");
define("FOOTER_TEMPLATE", ABSPATH . "inc/footer.php");
