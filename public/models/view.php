<?php
class View_Model
{

	private $data = array();
	private $smarty ; 
	private $render = FALSE;
	

	public function __construct($template)
	{
		$file = "public/views/default/" . $template .".tpl";
		$file = str_replace("/",DIRECTORY_SEPARATOR ,$file) ; 
		$file = str_replace("\\",DIRECTORY_SEPARATOR ,$file) ; 

		if(file_exists($file))
		$this->render = $file;
		else
		{echo "no tpl was found" ;
          exit() ; 		
		 }
		include('Smarty'.DIRECTORY_SEPARATOR.'libs'.DIRECTORY_SEPARATOR.'Smarty.class.php');
        $smarty = new Smarty();
		$this->smarty = $smarty ;
		
		
	}

	public function assign($variable , $value)
	{
	     $this->smarty->assign($variable, $value);
	}
	
	public function __destruct()
	{

	   if(file_exists($this->render))
	   {
		$data = $this->data;
        $this->smarty->display($this->render);
}
 	}
}
