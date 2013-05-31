<?php 
if( !defined('SYS_DIR') )
{
	define('SYS_DIR', realpath( __FILE__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR ));// Defining the path of SYS_DIR in case of not defined before.
}
define('CORE_DIR', 		SYS_DIR . DIRECTORY_SEPARATOR . 'core');
define('INCLUDE_DIR', 	SYS_DIR . DIRECTORY_SEPARATOR . 'include');
define('APP_DIR', 		SYS_DIR . DIRECTORY_SEPARATOR . 'app');
define('LIB_DIR', 		SYS_DIR . DIRECTORY_SEPARATOR . 'lib');
define('VAR_DIR', 		SYS_DIR . DIRECTORY_SEPARATOR . 'var');
define('SCRIPTS_DIR',	SYS_DIR . DIRECTORY_SEPARATOR . 'scripts');
define('CONFIG_DIR',	SYS_DIR . DIRECTORY_SEPARATOR . 'config');
define('TEMPLATE_CACHE_DIR',	VAR_DIR . DIRECTORY_SEPARATOR . 'templates_cache');
define('TEMPLATE_COMPILE_DIR',	VAR_DIR . DIRECTORY_SEPARATOR . 'templates_c');
define('SMARTY_COMPILE_CHECK',	true);
define('SMARTY_FORCE_COMPILE',	true);