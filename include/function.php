<?php 

function scan_file( $path , $filterExtensions = array() )
{ 
	$fileList = array();//存放搜索出的文件路径
	$dirList = array( $path );//存放目录
	while( !empty( $dirList ) )
	{
		$currentPath = array_shift( $dirList );//当前目录
		$handle = opendir( $currentPath ); //打开目录
		
		while( false !== ( $entry = readdir( $handle ) ) )
		{
				
			if( $entry == '.' || $entry == '..' )
			{
				continue;
			}
			
			$target = $currentPath . DIRECTORY_SEPARATOR .  $entry;
			
			if( is_dir( $target ) )
			{
		//		print_r($dirList);
				array_push( $dirList, $target );
			}
			
			if( is_file( $target ) )
			{
				if ( !empty( $filterExtensions ) && !in_array( pathinfo( $target, PATHINFO_EXTENSION ), $filterExtensions) )
				{// 如果指定了过滤，但是却不存在，则跳过
					continue;
				}
				else{
					array_push( $fileList, $target );
				}
			}
		}
	}
	return $fileList;
}

function scan_class( $fileList )
{
	$classList = array();
	$tTrait = defined( 'T_TRAIT' ) ? T_TRAIT : -1;
	$tNamespace = defined( 'T_NAMESPACE' ) ? T_NAMESPACE : -1;
	foreach ( $fileList as $file )
	{
		if( file_exists( $file ) )
		{
			$source = file_get_contents( $file );
			$tokens = token_get_all($source);
		//	print_r($tokens);
			foreach ( $tokens as $key => $token )
			{
				if ( is_array( $token ) )
                { 
                    switch( $token[0] )
                    {
                    	case $tNamespace:
                            $offset = $key + 2;
                            $namespace = "";
                            while ( $tokens[$offset] !== ";" && $tokens[$offset] !== "{" )
                            {
                                if ( is_array( $tokens[$offset] ) )
                                {
                                    $namespace .= $tokens[$offset][1];
                                }

                                $offset++;
                            }

                            $namespace = trim( addcslashes( $namespace, '\\' ) );
                            break;
                        case T_CLASS:
                        case T_INTERFACE:
                        case $tTrait:
                            $className = $tokens[$key+2][1];
                            if ( $namespace !== null )
                            {
                                $className = "$namespace\\\\$className";
                            }
							$classList[$className] = $file;
							break;
                    }
                }
			}
		}
	}
	return $classList;
}

function dump( $variable )
{
	echo '<pre>';
	print_r( $variable );
	echo '</pre>';
}