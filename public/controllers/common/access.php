<?php

class access_Controller
{
	private $Request = array() ; 
	public $template = 'common/access';
	public $language ;
	public $model ;
	public $view ; 
	public $data ; 
	public $result; 
	public function __construct()
	{
		$this->language= new Languages_library() ; 
		$this->Request = new Request_library() ;

		}
	public function main()
	{

		
		
			$view = new View_Model($this->template);

			
			$view->assign('explorer' , 1 );

			 $view->assign('DIR_Views' , DIR_Views );
			$view->assign('URL_Views' , URL_Views );
		
		
		
 
 
		}
	
}

?>
