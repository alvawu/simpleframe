<?php 
function SysAutoload( $class )
{
	static $autoload;
	$autoload = require VAR_DIR . DIRECTORY_SEPARATOR . 'autoload_array.php';
	
	if( $autoload[$class] )
	{
		include_once( $autoload[$class] );	
	}
}

spl_autoload_register('SysAutoload');