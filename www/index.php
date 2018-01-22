<? 
session_start();
if (($_SESSION['name']!="") AND ($_SESSION['email']!="")) { 
require_once ('config.php');require_once (CLASS_PATH.'/db.class.php');
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
require_once ('define.php'); require_once ('value.php');
require_once ('include/lang.php');require_once (CLASS_PATH.'/favicon.class.php'); 
$file = 'include/numchat.dat'; $current = file_get_contents($file); 
$file2 = 'include/counter.dat'; $counter = file_get_contents($file2);
$height=($_SESSION['height']/2.4);
$margin_top=($_SESSION['height']/10);
if ($_SESSION['width']<525) $limer_link="/timer_mob"; else $limer_link="/timer";

if (TIMESTAMP_BEGIN>time()) {$link=$limer_link;  $dis_chat="disabled"; $mess=$lang[LANG]['block'];} else 
	if ((TIMESTAMP_BEGIN<time()) AND (TIMESTAMP_END>time())) {$link=YOUTUBE; $mess=$lang[LANG]['mess'];}
	else {$link="include/theend.php"; setcookie("end", time()); $dis_chat="disabled"; $mess=$lang[LANG]['block'];}
	
?>
<!doctype html>
<html lang="<?= LANG ?>">
  <head>
    <meta http-equiv="content-type" content="text/html; utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="GreyGler" />
    <meta name="copyright" content="http://greygler.pro" />
	<title><?= $lang[LANG]['title'] ?> <? if (FREE=='true')  echo("🆓"); ?> «<?= TITLE ?>», <?= DATE ?> <?= TIME_TEXT ?> </title>
    <meta name="keywords" content="<?= KEYWORDS ?>">
    <meta name="description" content="<?= DESCRIPTION ?>">
	<meta name="robots" content="<?= ROBOTS ?>"> 
		
	<?= favicon::favicons(FAVICON_PATH, FAVICON_G_PATH, FAVICON); // Favicon ?>
	
	<meta property="og:title" content="<?= $lang[LANG]['title'] ?> <? if (FREE=='true')  echo("🆓"); ?> «<?= TITLE ?>», <?= DATE ?> <?= TIME_TEXT ?> " />
	<meta property="og:description" content="<?= DESCRIPTION ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://<?= $_SERVER['SERVER_NAME'] ?>" />
	<meta property="og:image" content="https://<?= $_SERVER['SERVER_NAME'] ?>/<?= OG_IMAGE ?>" />
	
	<!-- Подключение CSS -->
   <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Play|Russo+One" rel="stylesheet">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= CSS_PATH ?>/flags/flags.css">
	<link rel="stylesheet" href="<?= CSS_PATH ?>/main.css" />
	<link rel="stylesheet" href="<?= CSS_PATH ?>/slick.css" />
	<link rel="stylesheet" href="<?= CSS_PATH ?>/slick-theme.css" />
	
   <!-- /Подключение CSS -->
   
  <!-- Подключение поддержки HTML-5 для IE8 -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 <!-- 
  <div class="header"><div class="container">
  <h1>Привет, мир!</h1><div class="user text-right">Пользователи</div></div>
    </div></div> -->
	
	
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"><?= $lang[LANG]['menu'] ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="navbar-brand"><?= $lang[LANG]['title'] ?> <? if (FREE=='true') echo("🆓"); ?>
		  <? if ($_SESSION['width']>1200) echo ("«".TITLE."», <font size='1'>".DATE." ".TIME_TEXT."</font> </span>"); ?>
        </div>
        <div class="navbar-collapse collapse">
		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="flag-<?= $_SESSION['country']; ?>"></i> <?= $_SESSION['name']; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
					<!--<li><a href="#">Action</a></li>
					 <li class="divider"></li>  Разделитель -->
					<li><a href="/signin/logout.php"><span class="glyphicon glyphicon-off"></span> <?= $lang[LANG]['exit'] ?></a></li>
			</ul>
		</ul>
		</div>
          
        </div><!--/.navbar-collapse -->
      </div>
    </div>
	
	
	
	
<? //echo "{$link}<br>".BEGIN ?>
	
<div class="container">

<div class="col-md-8 col-lg-8"> <? if ($_SESSION['width']<1200) { ?> 
 <h1><?= TITLE ?><br><small><?= DATE ?> <?= TIME_TEXT ?></small></h1> 
<? } ?>
<div id="webinar" class="thumb-wrap"> 




<iframe width="640" height="360" src="<?= $link ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen>
</iframe>



</div>
<center><div class="share42init" data-url="<?= SITE_ADDR ?>" data-title="<?= $lang[LANG]['title'] ?> <? if (FREE=='true')  echo("рџ†“"); ?> «<?= TITLE ?>», <?= DATE ?> <?= TIME_TEXT ?>  data-image="https://<?= $_SERVER['SERVER_NAME'] ?>/<?= OG_IMAGE ?>" data-description="<?= DESCRIPTION ?>"></div></center>

</div>
<div class="col-md-4 col-lg-4"> 
 
<div class="panel panel-default chat ">
   <!--<div class="panel-heading">

   <h3 class="panel-title text-right">Участников: <b>286</b></h3>  
  </div> -->
  <div class="panel-body">
   <ul class="nav nav-tabs nav-justified hidden-xs">
  <li id="och" class="active"><a id="chat" href="#"><?= $lang[LANG]['chat'] ?></a></li>
 
  <li id="uch"><a id="people" href="#"><?= $lang[LANG]['people'] ?>&nbsp;<span id="wcu" class="badge"><?= $counter ?></span></a></li>
</ul>
<div id="chatframe">
   <iframe  width="100%" height="<?= $height ?>" src="include/chat.php#<?= $current ?>" frameborder="0"></iframe></div>
  </div>
  <div id="pchat" class="panel-footer">
  <div class="row">
  
  <form class="chat"  role="form" action=""> <!-- <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"> -->
  <fieldset>
  
    <legend class="hidden-xs"><?= $lang[LANG]['legend'] ?></legend>
	<div class="input-group">
	<input id="tchat" type="text" <?= $dis_chat ?> class="form-control" required placeholder="<?= $mess ?>">
	<span class="input-group-btn">
        <button id="bchat"  class="btn btn-primary" <?= $dis_chat ?> type="submit">&crarr;</button>
      </span>
	  </div>
<!-- <textarea id="tchat" required class="form-control" name="message" id="message" cols="25" rows="3"></textarea>
</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
<button id="bchat" type="submit" class="btn btn-primary" style="margin-top: <?= $margin_top ?>px">&crarr;</button></div> -->


<fieldset>
</form></div>
  </div>
  
    <div id="pchat_u" class="panel-footer hidden">
 <?= DESCRIPTION ?>
  </div> 
</div>



</div>
	</div>
	<footer class="footer text-center">
	 <div class="container">
	  <a data-toggle="modal" data-target="#conf">Политика конфиденциальности</a>&nbsp;|&nbsp;<a data-toggle="modal" data-target="#otkaz">Отказ от ответственности</a>&nbsp;|&nbsp;<a data-toggle="modal" data-target="#sogl">Согласие с рассылкой</a>&nbsp;|&nbsp;<a data-toggle="modal" data-target="#ofert">Договор офферты</a>
	  </div>
	 <p>&copy; <?= date("Y"); ?> <?= $lang[LANG]['title'] ?> <? if (FREE=='true')  echo("🆓"); ?> «<?= TITLE ?>», <?= DATE ?> <?= TIME_TEXT ?>  <!--<br><?= $seller_adress ?>, <a class="aphone" href="tel:<?= preg_replace('~[^0-9]+~','',$contact_phone1) ?>"><?= $contact_phone1 ?></a></p>
	
	<div class="text-right"><small>Разработчик: GreyGler</small></div> -->
	 </div>
 </footer>
    
		
	<? require_once("include/modals.php"); ?>
		
		
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

   
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<? if (TIMESTAMP_END>time()) { ?> 
    <script src="<?= JS_PATH ?>/cookie.js"></script>
	<script src="<?= JS_PATH ?>/webinar.php"></script>
	<? } ?>
	<script type="text/javascript" src="share42/share42.js"></script>
  </body>
</html>
  <? } else {
	 // print_r($_SERVER);
	   if ($_SERVER['QUERY_STRING']!="") $get="/?".$_SERVER['QUERY_STRING'];
	 
	   
  header("location: /signin".$get); }?>