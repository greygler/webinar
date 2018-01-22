<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php'); 
require_once (CLASS_PATH.'/favicon.class.php'); 
require_once (CLASS_PATH.'/functions.class.php');
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
?>
<!DOCTYPE html>
<html lang="<?= LANG ?>">
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
	<link rel="stylesheet" href="<?= CSS_PATH ?>/main.css" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
    <link href="<?= CSS_PATH ?>/bootstrap-switch.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="<?= CSS_PATH ?>/signin.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
	<center><div class="page-header">
  <img class="img-responsive" src="../favicon/apple-touch-icon-120x120.png" alt="«<?= TITLE ?>»"></div> 

      <form class="form-signin" role="form" action="signin.php" method="POST">
        <h3 class="form-signin-heading">Авторизуйтесь</h3>
		<? if ($_GET['login']=='no') echo('<font color="red"> Не правильный логин или пароль! </font>')?>
		<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
			<input type="text" class="form-control" name="login" placeholder="Логин" required autofocus>
			</div>
		</div>
		
			
		<div class="form-group">
			<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
			<input type="password" class="form-control" name="password" placeholder="Пароль" required>
			</div>
		</div>
		
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Запомнить меня
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Авторизация</button>
      </form>

    </div> <!-- /container -->
<footer class="footer text-center">
 
 <p>&copy; <?= date("Y"); ?> Система управления автовебинаром «<?= TITLE ?>», All rights reserved </p>
 

 
 </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>