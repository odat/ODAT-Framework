<?php
class Languages_library {
	private $default = 'english';
	private $data = array();
	private $Request = array() ; 
	private $db ; 
  	public function __construct() {
  		
			$this->db = new MysqlImproved_Driver;  
		}
 
  	public function get($key) {
   		return (isset($this->data[$key]) ? $this->data[$key] : $key);
  	}
	  	public function getall() {
   		return (isset($this->data) ? $this->data : null);
  	}
	
	public function load($filename) {
		$file =  DIR_LANGUAGE  . '/' . $this->default .  '/' . $filename . '.php';
		if (file_exists($file)) {
			$l = array();
	  		
			require($file);
		
			$this->data = array_merge($this->data, $l);
			
			return $this->data;
 
		} else {
			trigger_error('Error: Could not load language ' . $filename . '!');
		//	exit();
		}
  	}

			public function setlanguage($new)
			{
			$this->default = $new ; 
			}
			
			
			public function getLanguages() 
			{
			   $result = $this->db->query("select * from languages order by sort") ; 
			   	  
			 if($result->num_rows==0)
				return array("ResultMessage"=>"No Language was found in system") ;
			 else
			 {
				
			foreach ($result->rows as $result) {
			
	 		$this->data['Languages'][$result->LanguageId] = array(
	 				'LanguageId'				=> $result->LanguageId ,
	 				'LanguageTitle'			=> $result->LanguageTitle ,
	 				'Shortcode'		=> $result->Shortcode ,
	 				'flag'			=> $result->flag ,
	 				'IsDefault'		=> $result->IsDefault ,

									
	 				
	 		);
	 	}
	 	return $this->data['Languages'] ;
			}
		}


}
?>