<? session_start();
if (($_SESSION['login']!="") AND ($_SESSION['password']!="")) {
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
require_once (CLASS_PATH.'/db.class.php'); 
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
require_once ($_SERVER['DOCUMENT_ROOT'].'/define.php');

date_default_timezone_set(TIME_ZONE);
$get = explode("/", $_SERVER['REQUEST_URI']);

require_once('include/menu.php');
if ($get['1']!="") $page=$get['1'].".php"; else $page="main.php";

//if ($_GET['p']!="") $page=$_GET['p'].".php"; else $page="main.php";
if (!file_exists('include/'.$page)) $page="main.php";

require_once (CLASS_PATH.'/favicon.class.php'); 
require_once (CLASS_PATH.'/functions.class.php');
require_once (CLASS_PATH.'/pagination.class.php');

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="ru"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="ru"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="ru"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="<?= LANG ?>"><!--<![endif]-->
<head>
    <meta http-equiv="content-type" content="text/html; utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="GreyGler" />
    <meta name="copyright" content="http://greygler.pro" />
	<title>Система управления автовебинаром - «<?= TITLE ?>»</title>
    <meta name="description" content="<?= DESCRIPTION ?>">
	<meta name="robots" content="none"> 
	<?= favicon::favicons(FAVICON_PATH, FAVICON_G_PATH, FAVICON); // Favicon ?>
	 <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Play|Russo+One" rel="stylesheet">
	
	<link rel="stylesheet" href="<?= CSS_PATH ?>/normalize.css" />
		<link rel="stylesheet" href="<?= CSS_PATH ?>/switch.css" />
	<link rel="stylesheet" href="<?= CSS_PATH ?>/flags/flags.css" />
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="<?= CSS_PATH ?>/bootstrap-switch.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="<?= CSS_PATH ?>/main.css" />
	 <script src="//code.jquery.com/jquery-3.1.1.min.js"></script> 
 
 <script src="<?= JS_PATH ?>/clipboard.min.js"></script>
	<script src="<?= JS_PATH ?>/switch.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
  </head>
  <body>
  
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Навигация</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <a class="navbar-brand" href="/">
	  <img width="47" class="img-responsive" src="/favicon/apple-touch-icon-57x57.png" alt="«<?= TITLE ?>»">
	  
	  </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	  
	  <? foreach($menu as $key => $li_menu) 
	//  if ($_SESSION['admin']=='1') ($_SESSION['admin']==$li_menu['admin']) 
		if ((($li_menu['admin']=='1') OR ($li_menu['admin']=='0')) AND ($_SESSION['admin']=='1') )
	  { ?>
		  
       <li <? if ($get['1']==$li_menu['key'])  echo ('class="active"'); ?>><a title="<?= $li_menu['key'] ?>" href="/<?= $li_menu['key'] ?>"><?= $li_menu['name'] ?></a></li>
		  
	 <? } ?>
	  
      <!--  <li <? if (($_GET['p']=='') OR ($_GET['p']=='main')) echo ('class="active"'); ?>><a title="Статистика посещений" href="?p=main">Статистика</a></li>
        <li <? if ($_GET['p']=='ds') echo ('class="active"'); ?>><a title="Имена виртуальных пользователей" href="?p=ds">«Мертвые Души»</a></li>
        <li <? if  ($_GET['p']=='comment') echo ('class="active"'); ?>><a title="Управление виртуальными комментариями" href="?p=comment">Виртуальные комментарии</a></li>
        
	
		<? if ($_SESSION['admin']=='1') { ?> 
        <li <? if ($_GET['p']=='users') echo ('class="active"'); ?>><a title="Управление пользователями системы" href="?p=users">Пользователи системы</a></li>
		<li <? if ($_GET['p']=='opt') echo ('class="active"'); ?>><a title="Общие настройки" href="?p=opt">Настройки</a></li>
		<? } ?> -->
		
		
		
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"  data-toggle="modal" data-target="#logout"><i class="fa fa-power-off" aria-hidden="true"></i> <?= $_SESSION['name'] ?></a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  

 <!-- --> 
 
  <? include('include/'.$page);   ?>
  
  <!-- -->
  
 <footer class="footer text-center">
 <div class="container">
 <p>&copy; <?= date("Y"); ?> Система управления автовебинаром  «<?= TITLE ?>», All rights reserved </p>
 <!--
<div class="text-right"><small>Разработчик: GreyGler</small></div> -->
 </div>
 </footer>
 
 
 <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Выход из админпанели</h4>
      </div>
      <div class="modal-body">
        Вы действительно хотите выйти?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <a href="signin/logout.php" type="button" class="btn btn-primary">Выход</a>
      </div>
    </div>
  </div>
</div>
  


 


 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


  
  </body>
  </html>
  <? } else header("location: /signin"); ?>