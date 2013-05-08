<?php 
class SysModel
{ 
	protected $_table = '';
	
	public static function fetch( $params )
	{
		
	}
	
	public function getFields()
	{
		$db = DB::instance();
		return $db->query('show columns from ' . $this->_table  );
	}
	
	
}