<?php 
define( 'SYS_DIR', getcwd() );
include_once( SYS_DIR . DIRECTORY_SEPARATOR . 'config/config.php' );
include_once( INCLUDE_DIR . DIRECTORY_SEPARATOR . 'autoload.php' );
include_once( INCLUDE_DIR . DIRECTORY_SEPARATOR . 'function.php' );


$cacheFiles = scan_file( TEMPLATE_CACHE_DIR );
foreach( $cacheFiles as $file )
{
	echo 'deleing: ' . $file . PHP_EOL; 
	unlink( $file );
}

$cacheFiles = scan_file( TEMPLATE_COMPILE_DIR );
foreach( $cacheFiles as $file )
{
	echo 'deleing: ' . $file . PHP_EOL; 
	unlink( $file );
}