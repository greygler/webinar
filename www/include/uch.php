<? session_start();
require_once ('../config.php');
	require_once ('../define.php');
 ?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Участники вебинара</title>
	 <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Play|Russo+One" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	 <link rel="stylesheet" href="<?= CSS_PATH ?>/flags/flags.css">
<style> 
.list-inline li{
	    border: 1px solid #a0b4e2;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
	 background: #a0b4e2; 
     padding: 3px 7px 3px 7px;
	 margin: 3px 5px 3px 5px;

}
.list-inline li span{
	    color: red;

}
</style>	
</head>
<body style="margin: 20px; ">
<!-- 
<center><b>Участники вебинара:</b></center><br> -->

<ul class="list-inline">
<? include("uchbody.php")?>	
</ul>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>