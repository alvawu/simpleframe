<?php 
define( 'SYS_DIR', getcwd() );
include_once( SYS_DIR . DIRECTORY_SEPARATOR . 'config/config.php' );
include_once( INCLUDE_DIR . DIRECTORY_SEPARATOR . 'function.php' );

//set_time_limit(20);
$path =  SYS_DIR;
echo "indexing class files from '" . $path . "'" . PHP_EOL;
$fileList = scan_file($path, array( 'php' ));
$classList = scan_class( $fileList );
echo "class files found:" . PHP_EOL;
print_r($classList);
$arraySourceCode = '<?php return ' . var_export( $classList , true ) . ';';
file_put_contents(VAR_DIR . DIRECTORY_SEPARATOR . 'autoload_array.php', $arraySourceCode);
//print_r($fileList);