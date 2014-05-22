<?php
// Error Reporting
error_reporting(E_ALL);

$GLOBALS['request'] = $_SERVER['QUERY_STRING'];
$request = $GLOBALS['request'] ;
 $parsed = explode('&' , $GLOBALS['request'] );
 $page_cat = array_shift($parsed);
 if($page_cat=="")
$page_cat ="common/home" ;
$GLOBALS['page_cat'] = $page_cat  ;
  
$ex = explode("/",$page_cat) ; 
$GLOBALS['cat']=$ex[0] ;
$cat = $GLOBALS['cat'] ; 
$page=(isset($ex[1])?$ex[1]:false) ; 
 
function listFolderFiles($dir,$file){
    $ffs = scandir($dir);
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
			if($ff==$file)
			{
            require_once($dir.'/'.$file);
			}
			if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff,$file);
        }
    }

}
  function __autoload($className)
{
 	list($filename , $suffix) = explode('_' , $className);
$request = $GLOBALS['request'] ;
$cat = $GLOBALS['cat'] ; 
 	switch (strtolower($suffix))
	{	
		case 'model':
			
			$folder = '/public/models/';
	$file = SERVER_ROOT . $folder . (strtolower($filename)=='view' ? "" : $cat  . '/' ) . strtolower($filename) . '.php';
	
		break;
		
		case 'library':
		
			$folder = '/public/libraries/';
			$file = SERVER_ROOT . $folder . strtolower($filename) . '.php';
		break;
		
		case 'driver':
		
			$folder = '/public/libraries/drivers/';
		$file = SERVER_ROOT . $folder . strtolower($filename) . '.php';
		break;
		default : 
		$folder = '/public/controllers/';
		$file = SERVER_ROOT . $folder . (strtolower($filename)=='view' ? "" : $cat  . '/' ) . strtolower($filename) . '.php';

	}


 	
	if (file_exists($file))
	{
 		require_once($file);		
	}
	else
	{ 	
		list($public , $realfolder , $realfolder2)=explode("/",$folder) ; 
		listFolderFiles((SERVER_ROOT.'/public/'.$realfolder2),strtolower($filename).'.php') ;
 	}
	
}
 
$request = new Request_library() ; 
if(!$request->get('session','userid'))
{
$page_cat ='common/home' ;
 $page = "home" ;
 $cat = 'common' ; 
}
include('get_perm.php') ; 
if($request->get('session','userid'))
{
if(!get_perm($page_cat))
{$page_cat ='common/access' ;
 $page = "access" ;
 $cat = 'common' ; }
}
 $getVars = array();
foreach ($parsed as $argument)
{
    if(preg_match('/=/i',$argument))
	{
 	list($variable , $value) = explode('=' , $argument);
	$getVars[$variable] = urldecode($value);
	}else
	{
	$getVars[$argument] = true  ;
    }
}

 $target = SERVER_ROOT . '/public/controllers/' .$cat .'/'. $page . '.php';
 if (file_exists($target))
{
	include_once($target);
	
 	$class = ucfirst($page) . '_Controller';
	
 	if (class_exists($class))
	{
		$controller = new $class;
	}
	else
	{
 		die('class does not exist!');
	}
}
else
{
$target = SERVER_ROOT . '/public/controllers/' .'common' .'/'. 'home' . '.php';
include_once($target);
	
 	$class = ucfirst('home') . '_Controller';
	
 	if (class_exists($class))
	{
		$controller = new $class;
	}
	else
	{
 		die('class does not exist!');
	}
 }
 

function curPageURL() {
 $pageURL = 'http';
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

$Request = new Request_library() ;
$db = new MysqlImproved_Driver;
$UserId= $Request->get('session','userid') ; 
$IP=  $_SERVER["REMOTE_ADDR"] ;
$Link = curPageURL() ; 
if(isset($_SERVER['HTTP_REFERER'])) {
     $HTTP_REFERER = $_SERVER['HTTP_REFERER'];
 }else
 {
 $HTTP_REFERER = "" ; 
 }

$HTTP_REFERER = "" ; 
$HTTP_USER_AGENT =  $_SERVER['HTTP_USER_AGENT'] ;

$controller->main();

$r=$db->query("insert into visitor_statistics (UserId,IP,Link,HTTP_REFERER,HTTP_USER_AGENT) values ('$UserId','$IP',\"$Link\",\"$HTTP_REFERER\",\"$HTTP_USER_AGENT\")  ") ;  

