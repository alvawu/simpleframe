<?php 
class HelperYamlConfig
{
	private $data;
	private static $instanceList = array();
	
	public static function instance( $file )
	{
		if( !self::$instanceList[$file] )
		{
			self::$instanceList[$file] = new self( $file );
		}
		return self::$instanceList[$file];
	}
	
	private function __construct( $file )
	{
		$this->data = Spyc::YAMLLoad( HelperString::formatPath( CONFIG_DIR . '/yaml/' . $file) );
	}
	private function __clone() {} 
	
	public function variable( $name )
	{
		return $this->data[$name] ;
	}
}