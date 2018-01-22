<? require_once ('../config.php'); ?><!doctype html>
<html lang="en">
<head>
	
	<meta http-equiv="content-type" content="text/html; utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Play|Russo+One" rel="stylesheet">
	<link rel="stylesheet" href="<?= CSS_PATH ?>/main.css" />
	<link rel="stylesheet" href="<?= CSS_PATH ?>/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
  	<link href="<?= CSS_PATH ?>/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?= CSS_PATH ?>/signin.css" rel="stylesheet">
</head>
<body style="background-color: grey; color: white! important; margin-top: 7%">
<center>
	<span id="help-clock" class="help-block" style="color: white;"><small>До начала вебинара осталось:</small><br><strong><span id="clockdiv">
		
<i class="fa fa-spinner fa-pulse  fa-fw"></i>
<span class="sr-only">00:00:00</span></span></strong></span></center>
<script src="<?= JS_PATH ?>/counter_signin.js"></script>
	<script>initializeClock('clockdiv', '<?= TIME_COUNTER_BEGIN ?>', '<?= date("F d Y").' '.TIME_END ?>');</script>
</body>
</html>