<style>
#play, #current-time{color: blue;}
#play:hover, #progress-bar:hover{
	color:red;
	cursor: pointer;
}
#play_input, #duration {
	color: red;
}
.iga{
	width: 80px;
}

</style>

<div class="container container_user_data"><!--
<div class="page-header">
<h1>Виртуальные комментарии</h1>
</div> -->

<div id="video" class="col-md-7 col-lg-7 text-center">
<h3> <?= TITLE ?> <small><b><span id="duration">0:00</span></b></small></h3>
<div id="video-placeholder"></div>
<!--<div class="panel panel-default">

  <div class="panel-body">
    
  

<div class="col-md-1 col-lg-1 text-center"> <i id="play" title="play" class="fa fa-play-circle fa-2x" aria-hidden="true"></i></div>
<div class="col-md-10 col-lg-10">  <input type="range" id="progress-bar" value="0">  </div>
<div class="col-md-1 col-lg-1"><b><span id="current-time">0:00</span><b></div>
</div>


</div> -->


  <div class="form-group">

<div class="input-group">
  <span  class="input-group-addon"><i id="play" title="play" class="fa fa-pause" aria-hidden="true"></i></span>
  <input type="range" name="message" class="form-control" id="progress-bar" value="0">
  <span id="current-time" class="input-group-addon"></span>
</div>
</div>



<form action="">
<div class="form-group">
<div class="input-group">
 <span style="min-width: 70px" class="input-group-addon">Ник:</span>
<select  style="width: 100%;" class="form-control">
  <option value="">Случайный</option>
<? $result = mysql_query("SELECT * FROM ds");
$myrow = mysql_fetch_array($result);
do {
?>
<option value="<?= $myrow['name'] ?>"><?= $myrow['name'] ?></option>
<?
 }
while ($myrow = mysql_fetch_array($result)); ?>
</select>
</div>
</div>
  <div class="form-group">

<div class="input-group">
  <span style="width: 70px" class="input-group-addon"><i id="play_input" title="play" class="fa fa-stop" aria-hidden="true"></i>&nbsp; &nbsp;<b id="current-time-input">0:00</b></span>
  <input required type="text" name="message" class="form-control" placeholder="Введите сообщение и нажмите ENTER">
  <input id="videotime" type="hidden" name="time" value="0.00" >

  <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">↵</button>
      </span>
</div>
</div>
</form>



</div> <div class="col-md-5 col-lg-5"> Комменты</div>
</div>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="js/youtube.php"></script>
<script>
	var options = $('#city option');
	var array_option = new Array();

	for(var i=1; i<options.length; i++)  {
		array_option.push(options[i].text);
	}

	$("#input_search").autocomplete({
		source: array_option,
		minLength: 3 // Количество символов, от скольки начинать поиск
	});
	
	$.expr[":"].exact = $.expr.createPseudo(function(arg) {
		return function(element) {
			return $(element).text() === arg.trim();
		};
	});

	$(document).on("click", ".ui-widget-content li div",function() {
		var target_option = $(this).text();
		$("#city option:exact("+target_option+")").attr("selected", "selected");
	});
</script>