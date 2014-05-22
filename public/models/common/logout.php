<?php 

class Logout_Model
{
private $db;
private $Request;
public function __construct()
	{
		$this->db = new MysqlImproved_Driver;
	}
	public function getusername()
	{
	$this->Request = new Request_library() ;
	$userid=$this->Request->get('session','userid') ;
	 
	$result = $this->db->query("select UserName from users where UserId=$userid") ; 
	
	 if($result->num_rows==0)
	 	return  0 ;
		else
			  {
foreach ($result->rows as $result2) {

	 		$data = $result2->UserName;
		
			  }
			  	return $data ;
			  }
			  

			  }
 
public function logout() 
{

		
         session_destroy() ;
}
	
	}