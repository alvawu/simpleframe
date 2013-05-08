<?php 
include_once(INCLUDE_DIR . DIRECTORY_SEPARATOR . 'autoload.php');
include_once(INCLUDE_DIR . DIRECTORY_SEPARATOR . 'function.php');
$app = APP::instance();
$module = HelperValidator::stringNotEmpty( $_GET['module'] )? $_GET['module'] : 'default';
$action = HelperValidator::stringNotEmpty( $_GET['action'])? $_GET['action'] : 'default';
$app->dispatch($module, $action);
$app->render();