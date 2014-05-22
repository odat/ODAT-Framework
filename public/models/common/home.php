<?php 

class Home_Model
{

	private $db;

	public function __construct()
	{
		$this->db = new MysqlImproved_Driver;
	}
 public function check_login($username,$password)
 {
  if(!isset($username) || !isset($password))
 {
 return array("ErrorMessage"=>"please fill username and password field ") ; 
 }
  if($username=='' || $password=='')
 {
 return array("ErrorMessage"=>"please fill username and password field ") ; 
 } 
$enc_password=md5($password) ; 
       $result= $this->db->query
		(
				"select userid from users where username=\"$username\" && password=\"$enc_password\"  "
		);
            
              if($result->num_rows>0)
			  {
			  $_SESSION['userid'] =   $result->row->userid ;
			  return array("ErrorMessage"=>"0")  ;
			  }
			  else
			  { 
			return array("ErrorMessage"=>"Invalid Username or Password ")  ;

			  }
 

 }
	public function get_result()
	{

	}
	
	public function getArticlesNumber()
	{
	$result = $this->db->query("select count(*) c from articles") ; 
	if($result->num_rows>0)
			  {
foreach ($result->rows as $result) {

	 		$data['NumberArticles'] = array(
					'count'			=> $result->c ,				
	 				
	 		);
			return $data['NumberArticles'] ; 
			  }
			  }
			  else
			  { 
			return array("ErrorMessage"=>"Invalid Username or Password ")  ;

			  }
	}
	
	public function getPagesNumber()
	{
	$result = $this->db->query("select count(*) c from pages") ; 
	if($result->num_rows>0)
			  {
foreach ($result->rows as $result) {

	 		$data['NumberPages'] = array(
					'count'			=> $result->c ,				
	 				
	 		);
			return $data['NumberPages'] ; 
			  }
			  }
			  else
			  { 
			return array("ErrorMessage"=>"Invalid Username or Password ")  ;

			  }
	}
	
	public function set_result($result) 
	{

	}
}
