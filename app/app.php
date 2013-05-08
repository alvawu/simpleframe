<?php 
/**
 * 
 * Application Class, Singleton pattern
 * @author alva.silentsea@gmail.com
 *
 */
class APP
{
	private static $instance 	= null;// instance of application class
	private $moduleAction 		= null;// current requesting module action name
	private $viewName 			= null;// name of view template
	private $layoutName 		= 'default.tpl'; // name of layout template
	private $viewParams 		= array();// params of view template
	
	private $sysView = null;// instance of SysView
	
	/**
	 * 
	 * Construction of APP class, private for preventing from creating outside
	 */
	private function __construct()
	{
		$this->sysView = new SysView();
	}
	
	/**
	 * 
	 * Clone of APP class, private for preventing from creating outside
	 */
	private function __clone() {} 
	
	/**
	 * 
	 * Instance method.
	 */
	public static function instance()
	{
		if ( !self::$instance )
		{
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	/**
	 * 
	 * Dispatch method of module action to script.
	 * @param string $module
	 * @param string $action
	 */
	public function dispatch( $module, $action )
	{ 
		$moduleName =  HelperString::capitalize( $module ); 
		$moduleActionName = 'Action' .  $moduleName . HelperString::capitalize( $action );
		
		$reflection = new ReflectionMethod($moduleActionName, 'process');
		$args = array();
		foreach( $reflection->getParameters() as $param)
		{
			$args[ $param->name ] = null;
			if( $_GET[ $param->name ] )
			{
				$args[ $param->name ] = $_GET[ $param->name ];
			}
			if( $_POST[ $param->name ] )
			{
				$args[ $param->name ] = $_POST[ $param->name ];
			}
		}

		$this->viewName = HelperString::formatPath( strtolower( $module ) . '/' . strtolower( $action ) . '.tpl' );
		$this->moduleAction = new $moduleActionName( );
		call_user_func_array( array($this->moduleAction , 'process'),  $args );
	}
	
	/**
	 * 
	 * Setter method of view params
	 * @param string $name
	 * @param mixed $value
	 * @param bool $force
	 */
	public function setViewParam( $name, $value, $force = true )
	{
		if ( !$force && $this->viewParams[ $name ] !== null )
		{
			return false;		
		}
		else 
		{
			$this->viewParams[ $name ] = $value;
			return true;
		}
	}
	
	/**
	 * 
	 * Setter method of layout name
	 * @param string $layoutName
	 */
	public function setLayout( $layoutName )
	{
		$this->layoutName = $layoutName;
	}
	
	/**
	 * 
	 * Setter method of view name
	 * @param string $viewName
	 */
	public function setView( $viewName )
	{
		$this->viewName = $viewName;
	}
	
	/**
	 * 
	 * Call to render the templates.
	 */
	public function render()
	{
		$this->sysView->assign( $this->viewParams );
		$this->sysView->setLayout( $this->layoutName );
		$this->sysView->display( $this->viewName , $this->viewName . '_' . $this->layoutName . '_' . md5( var_export( $this->viewParams, true ) ) );
	}
}
