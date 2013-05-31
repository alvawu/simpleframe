<?php 
class HelperYamlConfig
{
	private $data;
	private static $instanceList = array();
	
	public static function instance( $file )
	{
		if( !isset(self::$instanceList[$file]) )
		{
			self::$instanceList[$file] = new self( $file );
		}
		return self::$instanceList[$file];
	}
	
	private function __construct( $file )
	{
		$content = file_get_contents(HelperString::formatPath( CONFIG_DIR . '/yaml/' . $file . '.php'));
		$yamlStr = '';
		$tokens = token_get_all($content);
		foreach($tokens as $token)
		{
			if(T_COMMENT === $token[0])
			{
				$yamlStr .= HelperString::cutBetween( $token[1] , '/*' , '*/');
			}
			
		}

		$this->data = Spyc::YAMLLoad( $yamlStr );
	}
	private function __clone() {} 
	
	public function variable( $name )
	{
		return $this->data[$name] ;
	}
}