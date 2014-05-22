<?php
include('config.php') ; 
$dir = dirname(__FILE__);
define('SERVER_ROOT' , $dir);
define('SITE_ROOT' , $site_url.'/admin');
define('DIR_LANGUAGE' , $dir.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'languages');
define('DIR_Controllers' , $dir.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'controllers');
define('DIR_Models' , $dir.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'models');
define('DIR_Views' , $dir.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'default');
define('URL_Views' , SITE_ROOT.'/'.'public'.'/'.'views'.'/'.'default');
require_once(SERVER_ROOT .DIRECTORY_SEPARATOR. 'public'.DIRECTORY_SEPARATOR . 'router.php');
