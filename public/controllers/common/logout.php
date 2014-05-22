<?php

class Logout_Controller
{
	private $Request = array() ; 
	public $template = 'common/logout';
	public $language ;
	public $model ;
	public $view ; 
	public $data ; 
	public function __construct()
	{
		$this->language= new Languages_library() ; 
		$this->Request = new Request_library() ;
	}	
	public function main()
	{

         $sendtomodel = new Logout_Model() ; 
		
		 $this->result['username'] = $sendtomodel->getusername();
		  $sendtomodel->logout() ;
		  
		 $this->template = 'common/logout';
		 $view = new View_Model($this->template);
		$view->assign('result' ,  $this->result  );
 $view->assign('DIR_Views' , DIR_Views );
 $view->assign('URL_Views' , URL_Views );
		} 
}

?>
