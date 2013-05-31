<?php
class HelperString
{
	public static function capitalize( $str )
	{
		return ucwords( strtolower( $str ) );
	}
	
	public static function formatPath( $path )
	{
		$path = str_replace('/', '\\', $path);
		return str_replace('\\', DIRECTORY_SEPARATOR, $path);
	}
	
	public static function startsWith( $haystack, $needle, $case = true )
	{
   		if($case)
       		return strpos($haystack, $needle, 0) === 0;

   		return stripos($haystack, $needle, 0) === 0;
		
	}
	
	public static function endsWith( $haystack, $needle, $case=true )
	{
	  	$expectedPosition = strlen($haystack) - strlen($needle);
	
	  	if($case)
	      	return strrpos($haystack, $needle, 0) === $expectedPosition;
	
	  	return strripos($haystack, $needle, 0) === $expectedPosition;
	}

	public static function cutBetween($haystack, $left, $right)
	{
		return substr($haystack, strpos($haystack, $left) + strlen($left), strrpos($haystack, $right) - strpos($haystack, $left) - strlen($left)) ;
	}
	
}