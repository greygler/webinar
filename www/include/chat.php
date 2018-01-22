<? require_once ('../config.php'); 
$file = 'numchat.dat';
$current = file_get_contents($file);
//print_r($_GET);
echo("<br>-".$current."-");
$current++;
file_put_contents($file, $current);


?><!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Чат</title>
	 <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Play|Russo+One" rel="stylesheet">
	 <link rel="stylesheet" href="<?= CSS_PATH ?>/flags/flags.css">
	<link rel="stylesheet" href="<?= CSS_PATH ?>/chat.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->
</head>
<body>
	
</body>
</html>

<? for ($i=1; $i<$_GET['sendid']; $i++) { ?>


<div id="<?= $i ?>" class="bulb"><div class="writer"><b><i class="flag-UA"></i> Имя Пользователя <?= $i ?></b></div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, nesciunt, dolorum, laboriosam, saepe laudantium ratione numquam ex aut mollitia cumque incidunt quo dignissimos ducimus sint quos repellat labore dolorem minima.</div>
<? } ?>

<!--
<div id="300" class="bulb_admin"><div class="writer">💁&nbsp;<span>Имя Пользователя:<span></div>Similique, perspiciatis, vero, molestiae, minima distinctio veniam nobis unde accusantium deleniti iusto repudiandae molestias hic ratione ea omnis maiores eum voluptas quos magni delectus architecto. Quidem, aut dolores dignissimos id!</div> -->