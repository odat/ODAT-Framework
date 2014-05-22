<?php
final class MysqlImproved_Driver {
	private $mysqli;
	
	public function __construct() {
		$this->mysqli = new mysqli(database_host, database_user , database_password , database_name);
		
		if ($this->mysqli->connect_error) {
      		trigger_error('Error: Could not make a database link (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
		}
		
		$this->mysqli->query("SET NAMES 'utf8'");
		$this->mysqli->query("SET CHARACTER SET utf8");
		$this->mysqli->query("SET CHARACTER_SET_CONNECTION=utf8");
		$this->mysqli->query("SET SQL_MODE = ''");
  	}
		
  	public function query($sql) {
		$result = $this->mysqli->query($sql) ;

		

		if ($this->mysqli->errno) {
		//echo $this->mysqli->errno ;
		//echo $this->mysqli->error ;
		return array('error'=>$this->mysqli->error , 'errno'=>$this->mysqli->errno) ;
		}
		
	
				$data = array();
		$i=0 ;
		 if (stripos($sql,'SELECT')!==0)   
			{return array('s'=>"s") ;}
		
		
				while ($row = $result->fetch_object()) {
					$data[$i] = $row;
    	
					$i++;
				}

				//print_r($data) ; 
				//exit() ; 
				//$result->close();
				$query = new stdClass();
				$query->row = isset($data[0]) ? $data[0] : array();
				$query->rows = $data;
				$query->num_rows = $result->num_rows;
				
				unset($data);
				
				
				
				
				return $query;	
    		} 

	public function escape($value) {
		return $this->mysqli->real_escape_string($value);
	}
	
  	public function countAffected() {
    	return $this->mysqli->affected_rows;
  	}

  	public function getLastId() {
    	return $this->mysqli->insert_id;
  	}	
	
	public function __destruct() {
		$this->mysqli->close();
	}
}
?>
<?php

/******************************

class MysqlImproved_Driver extends Database_Library
{

	private $connection;
	

	private $query;
	

	private $result;

	public function connect()
	{
		//connection parameters
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$database = 'cms';
	
		//your implementation may require these...
		$port = NULL;
		$socket = NULL;	
		
		//create new mysqli connection
		$this->connection = new mysqli
		(
			$host , $user , $password , $database , $port , $socket
		);
		
		if (!$this->connection->set_charset("utf8")) {
			print("error in charset") ;	
		}  
 		return TRUE;
	}


	public function disconnect()
	{
		//clean up connection!
		$this->connection->close();	
		
		return TRUE;
	}
	

	public function prepare($query)
	{
		//store query in query variable
		$this->query = $query;	
		
		return TRUE;
	}

	public function escape($data)
	{
		return $this->connection->real_escape_string($data);
	}

	public function query()
	{
		if (isset($this->query))
		{
			//execute prepared query and store in result variable
			if($this->result = $this->connection->query($this->query))
			{
						return array("result"=>TRUE) ;

			}else
			{		return array("result"=>false,"error"=>mysqli_errno($this->connection)) ;		
             }
		
 		}
		return false ;
 	}
	
 
	public function fetch($type = 'object')
	{
		if (isset($this->result))
		{
			$rows = array();
				
			switch ($type)
			{
				case 'array':
				
					//fetch a row as array
					while($row = $this->result->fetch_array())
					{
                       $rows[] = $row;
						
					}
				break;
				
				case 'object':
				
				//fall through...
				
				default:

					while($row = $this->result->fetch_object())
					{  $rows[] = $row;
					}	
				break;
			}
    if( $mysqli->error ) exit( $mysqli->error );  
			if($this->result->num_rows==0)
                         return array('state'=>'no result found');
			return $rows;
		}
		 
		return array('state'=>'error');
	}
	
	public function get
}


*/