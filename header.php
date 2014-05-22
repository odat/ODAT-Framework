<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
if(!isset($_SESSION['userid']))
{
?>
<script>window.location='index.php';</script>
<?php  } ?>
<?php /*
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	
 
<!----    // if IE>8 ---->
<link id="bs-css" href="public/views/default/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
body {
	padding-bottom: 40px;
}
.sidebar-nav {
	padding: 9px 0;
}
</style>
	<link href="public/views/default/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="public/views/default/css/charisma-app.css" rel="stylesheet">
 
	<link href="public/views/default/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='public/views/default/css/fullcalendar.css' rel='stylesheet'>
	<link href='public/views/default/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='public/views/default/css/chosen.css' rel='stylesheet'>
	<link href='public/views/default/css/uniform.default.css' rel='stylesheet'>
	<link href='public/views/default/css/colorbox.css' rel='stylesheet'>
	<link href='public/views/default/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='public/views/default/css/jquery.noty.css' rel='stylesheet'>
	<link href='public/views/default/css/noty_theme_default.css' rel='stylesheet'>
	<link href='public/views/default/css/elfinder.min.css' rel='stylesheet'>
	<link href='public/views/default/css/elfinder.theme.css' rel='stylesheet'>
	<link href='public/views/default/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='public/views/default/css/opa-icons.css' rel='stylesheet'>
	<link href='public/views/default/css/uploadify.css' rel='stylesheet'>
	<script src="ckeditor/ckeditor.js"></script>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	</head>

	<body>
<!-- topbar starts -->
<div class="navbar">
      <div class="navbar-inner">
    <div class="container-fluid"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="./index.php"> <img alt="Integrated Technology Group" src="public/views/default/img/ITG_EN-01.png" /></a> 
          
          <!-- theme selector starts -->
          <div class="btn-group pull-right theme-container" > <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-tint"></i><span class="hidden-phone"> Change Theme / Skin</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu" id="themes">
              <li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
              <li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
              <li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
              <li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
              <li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
              <li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
              <li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
              <li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
              <li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
            </ul>
      </div>
          <!-- theme selector ends --> 
          
          <!-- user dropdown starts -->
          <div class="btn-group pull-right" > <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> <i class="icon-user"></i><span class="hidden-phone"> admin</span> <span class="caret"></span> </a>
        <ul class="dropdown-menu">
              <li><a href="#">Profile</a></li>
              <li class="divider"></li>
              <li><a href="./?common/logout">Logout</a></li>
            </ul>
      </div>
          <!-- user dropdown ends -->
          
          <div class="top-nav nav-collapse">
        <ul class="nav">
              <li><a href="../index.php">Visit Site</a></li>
              <li>
            <form class="navbar-search pull-left">
                  <input placeholder="Search" class="search-query span2" name="query" type="text">
                </form>
          </li>
            </ul>
      </div>
          <!--/.nav-collapse --> 
        </div>
  </div>
    </div>
<!-- topbar ends -->
<div class="container-fluid">
<div class="row-fluid">

<!-- left menu starts -->
<div class="span2 main-menu-span">
      <div class="well nav-collapse sidebar-nav">
    <ul class="nav nav-tabs nav-stacked main-menu">
          <li class="nav-header hidden-tablet"> Main</li>
          <li><a class="ajax-link" href=""><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
          <li class="nav-header hidden-tablet"> Public Relations
		  <ul>
          <li><a class="ajax-link" href="./?contents/articles"><i class="icon-th-list"></i><span class="hidden-tablet"> Articles Manager</span></a></li>
          <li><a class="ajax-link" href="./?modules/events"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
          <li><a class="ajax-link" href="gallery_boards.php?id=1"><i class="icon-list"></i><span class="hidden-tablet"> Boards</span></a></li>
          <li><a class="ajax-link" href="gallery_photos.php"><i class="icon-picture"></i><span class="hidden-tablet"> Photo Gallery</span></a></li>
          <li><a class="ajax-link" href="gallery_videos.php"><i class="icon-facetime-video"></i><span class="hidden-tablet"> Video Gallery</span></a></li>
          <li><a class="ajax-link" href="opportunities.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Opportunities</span></a></li>
          <li><a class="ajax-link" href="exhibitions.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Exhibitions</span></a></li>
          <li><a class="ajax-link" href="news.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> News</span></a></li>
		  </ul>
		  </li>
          <li class="nav-header hidden-tablet"> Trainings<ul>
          <li><a class="ajax-link" href="./?modules/eventstraining"><i class="icon-calendar"></i><span class="hidden-tablet"> Training Manager</span></a></li>
          <li><a class="ajax-link" href="./traning.php"><i class="icon-calendar"></i><span class="hidden-tablet"> Training Users</span></a></li>
		  </ul></li>
          <li class="nav-header hidden-tablet"> Library<ul>
          <li><a class="ajax-link" href="./?contents/pages&edit&id=1"><i class="icon-ok"></i><span class="hidden-tablet"> Establish the library</span></a></li>
          <li><a class="ajax-link" href="./?contents/pages&edit&id=2"><i class="icon-file"></i><span class="hidden-tablet"> Library Vision</span></a></li>
          <li><a class="ajax-link" href="./?contents/pages&edit&id=3"><i class="icon-file"></i><span class="hidden-tablet"> Library Mission</span></a></li>
          <li><a class="ajax-link" href="./?contents/newsl"><i class="icon-th-list"></i><span class="hidden-tablet"> Library News</span></a></li>
          <li><a class="ajax-link" href="books.php"><i class="icon-book"></i><span class="hidden-tablet"> Books</span></a></li>
          <li><a class="ajax-link" href="business_directories.php"><i class="icon-book"></i><span class="hidden-tablet"> Business Directories</span></a></li>
          <li><a class="ajax-link" href="periodicals.php"><i class="icon-book"></i><span class="hidden-tablet"> Periodicals</span></a></li>
          <li><a class="ajax-link" href="bulletins.php"><i class="icon-book"></i><span class="hidden-tablet"> Statistical bulletins</span></a></li>
          <li><a class="ajax-link" href="./?modules/links"><i class="icon-resize-small"></i><span class="hidden-tablet"> Manage Links</span></a></li>
		   </ul></li>
          <li class="nav-header hidden-tablet">Settings<ul>
          <li><a class="ajax-link" href="./?poll/poll"><i class="icon-signal"></i><span class="hidden-tablet"> Polls Manager</span></a></li>
          <li><a class="ajax-link" href="./?contents/pages&edit&id=-1"><i class="icon-list-alt"></i><span class="hidden-tablet"> Welcome Content</span></a></li>
          <li><a class="ajax-link" href="./?settings/options"><i class="icon-share"></i><span class="hidden-tablet"> Contact and Social</span></a></li>
		  </ul></li>
          <li class="nav-header hidden-tablet"> Studies and Research<ul>
          <li><a class="ajax-link" href="sar_categories.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> Studies and Research</span></a></li>
		    </ul></li>
		            <li class="nav-header hidden-tablet"> Website Content<ul>
          <li><a class="ajax-link" href="./?contents/pages&edit&id=5"><i class="icon-list-alt"></i><span class="hidden-tablet"> Address by President</span></a></li>
          <li><a class="ajax-link" href="./?contents/pages&edit&id=14"><i class="icon-list-alt"></i><span class="hidden-tablet"> Vision</span></a></li>
          <li><a class="ajax-link" href="./?contents/pages&edit&id=15"><i class="icon-list-alt"></i><span class="hidden-tablet"> Mission</span></a></li>
          <li><a class="ajax-link" href="./?contents/pages&edit&id=4"><i class="icon-list-alt"></i><span class="hidden-tablet"> Values</span></a></li>
		  <li><a class="ajax-link" href="./?contents/pages&edit&id=8"><i class="icon-list-alt"></i><span class="hidden-tablet"> Studies and Research</span></a></li>
		  <li><a class="ajax-link" href="./?contents/pages&edit&id=7"><i class="icon-list-alt"></i><span class="hidden-tablet"> Directors Board</span></a></li>
		  <li><a class="ajax-link" href="./?contents/pages&edit&id=9"><i class="icon-list-alt"></i><span class="hidden-tablet"> Goals</span></a></li>
		  <li><a class="ajax-link" href="./?contents/pages&edit&id=10"><i class="icon-list-alt"></i><span class="hidden-tablet"> About Us</span></a></li>
		  <li><a class="ajax-link" href="./?contents/pages&edit&id=11"><i class="icon-list-alt"></i><span class="hidden-tablet"> Administrative Council</span></a></li>
		  
			</ul></li>
            
          		<li class="nav-header hidden-tablet"> Career<ul>
          <li><a class="ajax-link" href="./?contents/pages&edit&id=12"><i class="icon-list-alt"></i><span class="hidden-tablet"> Vacancies</span></a></li>
		  <li><a class="ajax-link" href="./?contents/pages&edit&id=13"><i class="icon-list-alt"></i><span class="hidden-tablet"> Our environment</span></a></li>
            </ul></li>
            
        </ul>
     
  </div>
      <!--/.well --> 
    </div>
<!--/span--> 
<!-- left menu ends -->
<noscript>
    <div class="alert alert-block span10">
  <h4 class="alert-heading">Warning!</h4>
  <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
</div>
    </noscript>
*/
?>
<?php 
include('../config.php') ; 
$dir = dirname(__FILE__);
define('SERVER_ROOT' , $dir);
define('SITE_ROOT' , $site_url.'/admin');
define('DIR_LANGUAGE' , $dir.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'languages');
define('DIR_Controllers' , $dir.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'controllers');
define('DIR_Models' , $dir.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'models');
define('DIR_Views' , $dir.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'default');
define('URL_Views' , SITE_ROOT.'/'.'public'.'/'.'views'.'/'.'default');
include('../Smarty'.DIRECTORY_SEPARATOR.'libs'.DIRECTORY_SEPARATOR.'Smarty.class.php');
$view = new Smarty();
  $view->assign('DIR_Views' , DIR_Views );
 $view->assign('URL_Views' , URL_Views );
$view->display('public/views/default/common/header.tpl');

  ?>

