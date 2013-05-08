<?php
class SysView extends Smarty
{
	private $_layout  = 'default.tpl';
	
	public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir( HelperString::formatPath( APP_DIR  . '/view/' ) );
        $this->setCompileDir( TEMPLATE_COMPILE_DIR );
        $this->setConfigDir( HelperString::formatPath( CONFIG_DIR . '/') );
        $this->setCacheDir( TEMPLATE_CACHE_DIR );
      
        $this->compile_check = SMARTY_COMPILE_CHECK; 
		$this->force_compile = SMARTY_FORCE_COMPILE;

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
    }
    
    public function setLayout( $layout )
    {
    	$this->_layout = $layout;
    }
    
	public function display( $page, $pid = null ) 
	{
    	$content = $this->fetch( $page );
    	$this->assign( 'content', $content );
        parent::display( HelperString::formatPath( '_layout/' ) . $this->_layout, $pid ); 
	}

}