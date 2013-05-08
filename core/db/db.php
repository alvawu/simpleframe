<?php  
/**
 * 
 * DB class
 * @author alva.silentsea@gmail.com
 *
 */
class DB
{
	/**
	 * 
	 * Instance list of DB connection.
	 * @var array
	 */
	private static $instanceList = array();
	
	/**
	 * 
	 * Instance of PDO
	 * @var PDO
	 */
	private $pdo = null;
	
	private function __construct( $name )
	{
		$config = HelperYamlConfig::instance( 'database.yaml' );
		$dbConfig = $config->variable( $name );
		
		$this->pdo = new PDO( $dbConfig['dsn'], $dbConfig['user'], $dbConfig['pass'], $dbConfig['options'] );
	//	dump($this->pdo);
	}
	private function __clone() {} 
	
	public static function instance( $name = 'default' )
	{
		if( !self::$instanceList[$name] )
		{
			self::$instanceList[$name] = new self( $name );
		}
		return self::$instanceList[$name];
	}
	
	public function query( $sql )
	{
		$statement = $this->pdo->query( $sql );
		if( $statement )
		{
			return $statement->fetchAll();
		}
		else
		{
			throw new DBException('DB Query Failed: ' . $sql);
		}
	}
	
	public function __call($func, $args)
	{
		call_user_func_array(array($this->pdo, $func), $args);
	}
}