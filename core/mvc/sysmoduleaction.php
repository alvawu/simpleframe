<?php
class SysModuleAction
{
	public function __construct()
	{
		
	}
	
	public function __call($func, $args)
	{
		$app = APP::instance();
		call_user_func_array(array($app, $func), $args);
	}
}