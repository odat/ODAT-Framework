<?php
class Request_library {
	public $get = array();
	public $post = array();
	public $cookie = array();
    public $session = array();
	public $files = array();
	public $server = array();
	
  	public function __construct() {
			if (!session_id()) {
			ini_set('session.use_cookies', 'On');
			ini_set('session.use_trans_sid', 'Off');
			
			session_set_cookie_params(0, '/');
			session_start();
		}
		$_GET = $this->clean($_GET);
		$_POST = $this->clean($_POST);
		$_REQUEST = $this->clean($_REQUEST);
		$_COOKIE = $this->clean($_COOKIE);
		$_SESSION = $this->clean($_SESSION);
		$_FILES = $this->clean($_FILES);
		$_SERVER = $this->clean($_SERVER);
		
		$this->get = $_GET;
		$this->post = $_POST;
		$this->request = $_REQUEST;
		$this->cookie = $_COOKIE;
		$this->session = $_SESSION;
		$this->files = $_FILES;
		$this->server = $_SERVER;
	}
	
  	public function clean($data) {
    	if (is_array($data)) {
	  		foreach ($data as $key => $value) {
				unset($data[$key]);
				
	    		$data[$this->clean($key)] = ($this->clean($value)!=null ? $value : false);
	  		}
		} else { 
	  		$data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
		}

		return $data;
	}
	public function get($type,$name)
	{
	switch($type)
	{
	case 'get' : 	return (isset($this->get[$name]) ? $this->get[$name] : null) ;
	case 'post' : 	return (isset($this->post[$name]) ? $this->post[$name] : null) ;
	case 'cookie' : 	return (isset($this->cookie[$name]) ? $this->cookie[$name] : null) ;
	case 'session' : 	return (isset($this->session[$name]) ? $this->session[$name] : null) ;
	case 'files' : 	return (isset($this->files[$name]) ? $this->files[$name] : null) ;
	case 'server' : 	return (isset($this->server[$name]) ? $this->server[$name] : null) ;
	}
	return false ; 
}

	public function key($type,$name)
	{
	switch($type)
	{
	case 'get' : 	return (isset($this->get[$name]) ? true : false) ;
	case 'post' : 	return (isset($this->post[$name])  ? true : false) ;
	case 'cookie' : 	return (isset($this->cookie[$name])  ? true : false) ;
	case 'session' : 	return (isset($this->session[$name])  ? true : false) ;
	case 'files' : 	return (isset($this->files[$name])  ? true : false) ;
	case 'server' : 	return (isset($this->server[$name])  ? true : false) ;
	}
	return false ; 
}

	public function getall($type)
	{
		switch($type)
	{
	case 'get' : 		return $this->get ;
	case 'post' : 		return $this->post ;
	case 'cookie' : 	return $this->cookie ;
	case 'session' : 	return $this->session ;
	case 'files' : 		return $this->files ;
	case 'server' : 	return $this->server ;
	}
	
	}


}
?>