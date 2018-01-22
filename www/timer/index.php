<? 
session_start();
require_once ('../config.php');
require_once ('../define.php');
require_once ('../value.php');
require_once ('../include/lang.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Timer</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Mobile Specific Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Play|Russo+One" rel="stylesheet">
<!-- Stylesheets -->
 	
<link rel="stylesheet" href="css/reset.css" />

<link rel="stylesheet" href="css/styles.css" />

<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<!-- JS -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/countdown.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
	
		$(document).ready(function(){
			$("#countdown").countdown({
				date: "<?= TIME_COUNTER_BEGIN ?>",
				format: "on"
			},
			
			function() {
				// callback function
			});
		});
	
	</script>
</head>
<body style="margin-top: 2%;">

<!-- LOGO --> 

<!-- TIMER -->
<div class="timer-area">
<h1>До начала  <span class="hidden-sm">вебинара</span> осталось:</h1>
<ul id="countdown">
 <li class="hidden-sm"> <span class="days">00</span>
<p class="timeRefDays hidden-sm">дней</p>
</li> 
<li> <span class="hours">00</span>
<p class="timeRefHours">часов</p>
</li>
<li> <span class="minutes">00</span>
<p class="timeRefMinutes">минут</p>
</li>
<li> <span class="seconds">00</span>
<p class="timeRefSeconds">секунд</p>
</li>
</ul>

</div>
<!-- end timer-area 
Тут еще какая-то информация о вебинаре--> 

</body>
</html>