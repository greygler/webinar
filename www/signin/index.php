<? session_start();
if(!isset($_SESSION['utms'])) {
    $_SESSION['utms'] = array();
    $_SESSION['server'] = array();
    $_SESSION['utms']['utm_source'] = '';
    $_SESSION['utms']['utm_medium'] = '';
    $_SESSION['utms']['utm_term'] = '';
    $_SESSION['utms']['utm_content'] = '';
    $_SESSION['utms']['utm_campaign'] = '';
}
$_SESSION['utms']['utm_source'] = $_GET['utm_source'];
$_SESSION['utms']['utm_medium'] = $_GET['utm_medium'];
$_SESSION['utms']['utm_term'] = $_GET['utm_term'];
$_SESSION['utms']['utm_content'] = $_GET['utm_content'];
$_SESSION['utms']['utm_campaign'] = $_GET['utm_campaign'];
$_SESSION['server']['referer'] = $_SERVER['HTTP_REFERER'];
require_once ('../config.php');
require_once (CLASS_PATH.'/db.class.php'); 
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
//$_SESSION['define']['TIME_TEXT']='';
require_once ('../define2session.php');
require_once ('../include/lang.php');
require_once ('../define.php');


date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/favicon.class.php'); 
require_once (CLASS_PATH.'/functions.class.php');
//print_r(get_defined_constants(true));
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
  <head>
  
  <meta http-equiv="content-type" content="text/html; utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="GreyGler" />
    <meta name="copyright" content="http://greygler.pro" />
	<title><?= $lang[LANG]['title'] ?> <? if (FREE=='true')  echo("🆓"); ?> <?= TITLE ?>, <?= DATE ?> <?= TIME_TEXT ?> </title>
    <meta name="description" content="<?= DESCRIPTION ?>">
	<meta name="keywords" content="<?= KEYWORDS ?>">
	<meta name="robots" content="none"> 
	<?= favicon::favicons(FAVICON_PATH, FAVICON_G_PATH, FAVICON); // Favicon ?>
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Play|Russo+One" rel="stylesheet">
	<link rel="stylesheet" href="<?= CSS_PATH ?>/main.css" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="<?= CSS_PATH ?>/signin.css" rel="stylesheet">
	<meta property="og:title" content="<?= TITLE ?>" />
	<meta property="og:description" content="<?= DESCRIPTION ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://<?= $_SERVER['SERVER_NAME'] ?>" />
	<meta property="og:image" content="https://<?= $_SERVER['SERVER_NAME'] ?>/<?= OG_IMAGE ?>" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript">
    x = new Date() // получаем текущее время по Гринвичу.
    a = -x.getTimezoneOffset() // Вычисляем временное смещение между временем сайта и клиента в минутах.
	width=screen.width; // ширина  
	height=screen.height; // высота
	</script>
  </head>

  <body>

    <div class="container">
	<center><div class="page-header"><strong><?= $lang[LANG]['title'] ?></strong> <? if (FREE=='true')  echo("🆓"); ?><br><?= TITLE ?><br><small><?= DATE ?> <?= TIME_TEXT ?></small></div> 
	
	
	
	<div class="alert alert-danger alert-dismissable visible-xs visible-sm">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <?= $lang[LANG]['comp'] ?>
	 </div>
	
      <form  role="form" action="signin.php" method="POST">
        <h3 id="uch" class="form-signin-heading" ><?= $lang[LANG]['uch'] ?></h3>
		<div class="form-signin">
		<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
			<input id="input_name" type="text" class="form-control" name="name" placeholder="<?= $lang[LANG]['name'] ?>" required autofocus>
			</div>
		</div>
		
		
			
		<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-at fa-fw" aria-hidden="true"></i></span>
			<input id="input_email" type="email" class="form-control" name="email" placeholder="<?= $lang[LANG]['email'] ?>" required>
			</div>
		</div>
		<script type='text/javascript'>
		document.write('<input type=\'hidden\' name=\'timezone\' value = \'' + a + '\' />');
		document.write('<input type=\'hidden\' name=\'width\' value = \'' + width + '\' />');
		document.write('<input type=\'hidden\' name=\'height\' value = \'' + height + '\' />');
		</script>
		<span id="help-clock" class="help-block"><small><?= $lang[LANG]['begin'] ?></small> <strong><span id="clockdiv">
		
<i class="fa fa-spinner fa-pulse  fa-fw"></i>
<span class="sr-only">00:00:00</span></span></strong></span>
        <button id="button" class="btn btn-lg btn-primary btn-block" type="submit"><?= $lang[LANG]['input'] ?></button>
		</div>
      </form>
	  
	 <center><div class="share42init" data-url="<?= SITE_ADDR ?>" data-title="<?= $lang[LANG]['title'] ?> <? if (FREE=='true')  echo("рџ†“"); ?> «<?= TITLE ?>», <?= DATE ?> <?= TIME_TEXT ?>  data-image="https://<?= $_SERVER['SERVER_NAME'] ?>/<?= OG_IMAGE ?>" data-description="<?= DESCRIPTION ?>"></div></center>

    </div> <!-- /container -->
<footer class="footer text-center">
 <div class="container">
	  <a data-toggle="modal" data-target="#conf">Политика конфиденциальности</a>&nbsp;|&nbsp;<a data-toggle="modal" data-target="#otkaz">Отказ от отвественности</a>&nbsp;|&nbsp;<a data-toggle="modal" data-target="#sogl">Согласие с рассылкой</a>&nbsp;|&nbsp;<a data-toggle="modal" data-target="#ofert">Договор офферты</a>
	  </div>
	 <p>&copy; <?= date("Y"); ?> <?= $lang[LANG]['title'] ?> <? if (FREE=='true')  echo("🆓"); ?> <?= TITLE ?>, <?= DATE ?> <?= TIME_TEXT ?>, www.<?= $_SERVER['SERVER_NAME'] ?> <!--<br><?= $seller_adress ?>, <a class="aphone" href="tel:<?= preg_replace('~[^0-9]+~','',$contact_phone1) ?>"><?= $contact_phone1 ?></a></p>
	
	<div class="text-right"><small>Разработчик: GreyGler</small></div> -->
	 </div>
 
 </footer>
 <? require_once("../include/modals.php"); 
//date_default_timezone_set('Europe/Kiev');
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script type="text/javascript" src="../share42/share42.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="<?= JS_PATH ?>/counter_signin.php"></script>
	<script>initializeClock('clockdiv', '<?= TIME_COUNTER_BEGIN ?>', '<?= date("F d Y").' '.TIME_END ?>');</script>
<?// date("d.m.Y h:i:s") ?>
  </body>
</html>