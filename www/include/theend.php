<? require_once ('../config.php'); 
require_once ('../define.php');
require_once ('../include/lang.php'); ?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $lang[LANG]['theend1'] ?><?= $lang[LANG]['theend2'] ?></title>
	  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Play|Russo+One" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<style> 
	#video-bg {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    overflow: hidden;
    z-index: 1;
    background: #8F8E8F; margin-top: 0;
}
 
#video-bg > video {
    position: absolute;
    top: 0;
    left: 0;
    min-width: 100%; 
    min-height: 100%;
    width: auto;
    height: auto; 
}
 
 @supports (object-fit: cover) {
     #video-bg > video {
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         object-fit: cover;
     }
 }
	</style>
</head>
<body >
	
<div id="video-bg">
    <video width="100%" height="auto" preload="auto" autoplay="autoplay"
    loop="loop" poster="bg/daisy-stock-poster.jpg">
        <source src="../video/video.mp4" type="video/mp4"></source>
      <!--   <source src="bg/daisy-stock-webm-video.webm" type="video/webm"></source> -->
    

</video>
	<center>
	
	<div style="position: absolute; top: 50%;  left: 50%;
  transform: translate(-50%, -50%);  "><h1 style="color:white;"><strong><?= $lang[LANG]['theend1'] ?></strong><br> <small style="color:white;"><?= $lang[LANG]['theend2'] ?></small></h1></div>
	
</center>

</div>
	
	
	 
	</body>
</html>
	
	
