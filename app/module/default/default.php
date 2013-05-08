<?php 
class ActionDefaultDefault extends SysModuleAction
{
	public function process( $user = 1, $pass )
	{
		
		$model = new ModelUser();
//		dump( $model->getFields() );
		
		$this->setViewParam('fields', $model->getFields());
		$this->setViewParam( 'greeting', 'hello world' );
		$this->setViewParam( 'user', 'J' );
		
		$this->setView( 'default/test.tpl' );
		
		$this->setLayout( 'two_cols.tpl' );
	}
}
