<?php
class Session_library {
	public $data = array();
			
  	public function __construct() {		
		if (!session_id()) {
			ini_set('session.use_cookies', 'On');
			ini_set('session.use_trans_sid', 'Off');
			
			session_set_cookie_params(0, '/');
			session_start();
		}

		$this->data =& $_SESSION;
	}
	
public function set($variable,$value)
{
$_SESSION[$variable] = $value ;
$this->data =& $_SESSION;
}	
public function get($variable)
{
return (isset($this->data[$variable]) ? $this->data[$variable] : null )  ;
}	
public function getall()
{
return (isset($this->data) ? $this->data : null )  ;
}	
public function delete($variable)
{
unset($_SESSION[$variable]) ; 

}	

	function getId() {
		return session_id();
	}
}
?>
