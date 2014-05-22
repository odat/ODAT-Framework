<?php

class Home_Controller
{
	private $Request = array() ; 
	public $template = 'common/login';
	public $language ;
	public $model ;
	public $view ; 
	public $data ; 
	public $result; 
	public function __construct()
	{
		$this->language= new Languages_library() ; 
		$this->Request = new Request_library() ;
		$this->model = new  Home_Model() ;
	}
	public function main()
	{

		if($this->Request->get('session','userid')!=null)
		{
		
			$this->result['NumberArticles'] = $this->model->getArticlesNumber() ;
			$this->result['NumberPages'] = $this->model->getPagesNumber() ;		 
		 
		 
		 $this->template = 'common/home';
		  $view = new View_Model($this->template);
		  
		  $view->assign('ip' , $_SERVER["REMOTE_ADDR"] );
		  $view->assign('result' , $this->result );
		}elseif($this->Request->get('post','post')==null)
		{
		   $view = new View_Model($this->template);
		}elseif($this->Request->get('post','post')!=null){
		 $check = new Home_Model();
			$check_login = $check->check_login($this->Request->get('post','username'),$this->Request->get('post','password'));
			$view = new View_Model($this->template);
			$view->assign('error' , $check_login );
			if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']))
			{
			$view->assign('explorer' , 1 );
			
			}
		
			
		}
		if($this->Request->key('get','username'))
		{
		$view->assign('username' , $this->Request->get('get','username') );
		}
 $view->assign('DIR_Views' , DIR_Views );
 $view->assign('URL_Views' , URL_Views );
 
 
		}
	
}

?>
