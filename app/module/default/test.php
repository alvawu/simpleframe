<?php 
class ActionDefaultTest extends  SysModuleAction
{
	public function process( $user )
	{
		$this->setViewParam( 'greeting', 'hello world' );
		$this->setViewParam( 'user', $user );
	}
}