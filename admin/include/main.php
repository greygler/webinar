<? 
if (($_GET['track']=='all') OR ($_GET['track']=='')) $where="WHERE track_id!=''";
else {$where="WHERE track_id='{$_GET['track']}'";} 
if ($_GET['data1']!="") $where.=" AND `time`>'".strtotime($_GET['data1'])."'";
if ($_GET['data1']==$_GET['data2']) $data2=strtotime($_GET['data2'])+(60*60*24); else $data2=strtotime($_GET['data2']);
if ($_GET['data2']!="") $where.=" AND `time`<'".$data2."'";
//echo $where;
?>



<div class="container container_user_data">
<div class="page-header">
		
<form class="form-horizontal" role="form" action="/admin" method="get">
<input type="hidden" value="main" name="p">
<div class="form-group">
<label style="font-size: 18px" class="control-label col-sm-4" for="track">Статистика по трекам:</label>
<div class="col-sm-8">
<select style="width: 250px;" class="form-control" name="track" id="track" onchange="this.form.submit()">
<option value="all">Все треки (<?= db::cound_bd('whois'); ?>)</option>
<? $result = mysql_query("SELECT * FROM `track` ");
$myrow = mysql_fetch_array($result);
do
{ $count_tr=db::cound_bd('calls', "`id`='{$myrow['id']}'");
?> 

<option <? if ($_GET['track']==$myrow['id']) echo ("selected")?> value="<?= $myrow['id'] ?>"><?= $myrow['name'] ?> (<?= $count_tr ?>)</option>
<? }
while ($myrow = mysql_fetch_array($result)); ?>

</select></div>
</div>
<div class="form-group">
<div class="col-sm-3">
<label class="control-label col-sm-4" for="track">Дата c:</label>
<input name="data1" style="width: 170px;" class="form-control" type="text" id="datepicker1"  <? if ($_GET['data1']!="") echo('value="'.$_GET['data1'].'"') ?>></div> 
<div class="col-sm-3 ">
<label class="control-label col-sm-4" for="track">Дата по:</label>
<input name="data2" style="width: 170px;" class="form-control" type="text" id="datepicker2" <? if ($_GET['data2']!="") echo('value="'.$_GET['data2'].'"') ?>></div> </div><div class="form-group">
<button type="submit" class="btn btn-primary form-control">Показать</button></div>
</form>		
</div>

<? 
$count_who=db::cound_bd_full('calls', $where); //"user_id='{$_GET['id']}'"
$limit=pagination::pagin($_GET, $count_who, $view_pages,"admin/".$_SERVER['PHP_SELF']); 	?>
<table class="table table-striped" >
<thead>
	<tr valign="middle">
		<th>Дата, время, IP-адрес, страна по IP,<br> визиты (всего / 48 час), Прокси
		<? strtotime($_GET['data1']) ?>
		</th>
		<th>Данные сервера<br>($_SERVER)</th>
		<th>Устройство моб/стационар<br>ОС, браузер</th>
		
	</tr>
</thead>	
	
	<tbody>
	 <? //echo $count_who;
	 if ($count_who>0) {
	 $result = mysql_query("SELECT * FROM `calls` {$where} ORDER BY id DESC  LIMIT {$limit['begin']}, {$limit['count']}"); 
	 // WHERE user_id='{$_GET['id']}'
		$myrow = mysql_fetch_array($result);
		do
		{ 
		$server=unserialize($myrow['server']);
		$user_agent=$server['HTTP_USER_AGENT']; 
		$device=func::device($myrow['device'],$user_agent);
		if (($_GET['track']=="") OR ($_GET['track']=="all")) $wid="";  else  $wid=$_GET['track'];
		$count_ip=track::count_ip($myrow['ip'],$wid);
		$count_ip_48=track::count_ip_48($myrow['ip'],$wid);
		$is_ip=track::is_ip($myrow['ip'],$_SERVER['DOCUMENT_ROOT'].'/dat/black_ip.dat');
		?>
		
		<tr <? if (($device['os']=="Search engine or robot") OR ($is_ip)) echo('style="background-color: #f8ffbb"'); ?>>
		<td><? if ($wid=="") { ?>
		
		<h3 align="center"><? 
		 $result_id = mysql_query("SELECT * FROM `track` WHERE `id`='{$myrow['track_id']}'"); 
		 $myrow_id = mysql_fetch_array($result_id); echo $myrow_id['name']; ?></h3>
		<? } ?>
		<dl class="dl-horizontal dl-order">
		<dt><i class="fa fa-calendar" aria-hidden="true"></i></dt><dd><?= date("d.m.Y", $myrow['time']); ?></dd>
		<dt><i class="fa fa-clock-o" aria-hidden="true"></i></dt><dd><?= date("H:i:s", $myrow['time']); ?></dd>
		<? $dt='';
		if (($myrow['country']!='AA') AND ($myrow['country']!='')) $flag="flag-{$myrow['country']}"; else $flag='fa fa-flag';
			if ($is_ip) {$flag="fa fa-exclamation-triangle"; $dt='style="color: red"';}	?>
		<dt <?= $dt ?>><i class="<?= $flag ?>" aria-hidden="true"></i></dt><dd <?= $dt ?>><?=  $myrow['ip']; ?>(<?= $myrow['country'] ?>) <?  ?> <br> <strong><small> Визиты: <?= $count_ip ?> / <?= $count_ip_48 ?></strong></small></dd>
		<? if (func::isProxy($server)) { $proxy='<font color="red">Использование Proxy</font>'; $fa_proxy="user-secret"; $title="Обнаружено использование прокси-сервера"; } else {$proxy="No Proxy";$fa_proxy="user";$title="Прокси-сервер не обнаружен, или тщательно замаскирован";} ?>
		<dt title="<?= $title ?>"><i class="fa fa-<?= $fa_proxy ?>" aria-hidden="true"></i></dt><dd title="<?= $title ?>"><?= $proxy; ?></dd>
		</dl>
		</td>
		<td>
		<? if ($wid=="") { ?>
		
		<h3 align="center">-</h3>
		<? } ?>
		<dl class="dl-horizontal dl-order">
		
		<? if ($server['HTTP_GEOIP_COUNTRY_CODE']!='') $flag2="flag-{$server['HTTP_GEOIP_COUNTRY_CODE']}"; else $flag2='fa fa-flag'; ?>
		<dt>Реферер: </dt><dd><? if($server['HTTP_REFERER']!="") echo ('<a target="_blank" href="'.$server['HTTP_REFERER'].'">'.$server['HTTP_REFERER']."</a>"); else echo ('<font color="red">Прямой заход</font>'); ?></dd>
		<? if($server['QUERY_STRING']!="") { ?><dt>Запрос: </dt><dd><?= '<a target="_blank" href="'.$server['QUERY_STRING'].'">'.$server['QUERY_STRING']."</a>"?></dd> <? } ?>
		<? if($server['HTTP_FROM']!="") { ?><dt>httpFrom: </dt><dd><?= $server['HTTP_FROM'] ?></dd> <? } ?>
		<dt>Язык браузера: </dt><dd><? if($server['HTTP_ACCEPT_LANGUAGE']) echo($server['HTTP_ACCEPT_LANGUAGE']); else echo ('<font color="red">Не указан</font>'); ?></dd>
		<dt> GeoIP: </dt><dd><i class="<?= $flag2 ?>" aria-hidden="true"></i> <? if($server['HTTP_GEOIP_COUNTRY_CODE']) echo($server['HTTP_GEOIP_COUNTRY_CODE']); else echo ('<font color="red">Не указан</font>'); ?></dd>
		<dt>UserAgent: </dt><dd style="width: 200px;">
		<? if($server['HTTP_USER_AGENT']) echo($server['HTTP_USER_AGENT']); else echo ('<font color="red">Пустой</font>'); ?>
		</dd>
		</dl>
		<? //print_r($server); ?>

		</td>
		<td>
		<? if ($wid=="") { ?>
		
		<h3 align="center">-</h3>
		<? } ?>
		<dl class="dl-horizontal dl-order">
				<? $dt='';
				if ($myrow['device']!='0') $dev_symbol="fa-mobile"; else $dev_symbol="fa-desktop"; 
				$dev=$device['os']; $dev_d=$device['device'].":";
				if ($device['os']=="Search engine or robot") {$dev_symbol="fa-exclamation-triangle"; $dt='style="color: red"'; $dev="Обнаружен бот!";$dev_d="";}
				?>
		<dt <?= $dt ?>><i title="<?=  $device['device']; ?>" class="fa <?= $dev_symbol ?>" aria-hidden="true"></i> <?=  $dev_d; ?></dt><dd <?= $dt ?>><?= $dev; ?></dd>
		<? if ($device['browser']!=" ") { ?><dt><i class="fa fa-terminal" aria-hidden="true"></i>  Браузер:</dt> <dd><?= $device['browser']; ?></dd><? } ?>
		<dt>Визитов:</dt><dd><?= $myrow['cookie']?></dd>
		</dl>
		<? //print_r($device) ?>
		</td>
		
		</tr>
		<? //echo $myrow['ИМЯ_ПОЛЯ1'];
		//echo $myrow['ИМЯ_ПОЛЯ2'];
		 }
	 while ($myrow = mysql_fetch_array($result)); }
	 else echo ("<tr><td></td><td>По данному треку нет данных</td><td></td></tr>");
		?>
	
	<tbody>
	</table>
<? $limit=pagination::pagin($_GET, $count_who, $view_pages,$_SERVER['PHP_SELF']); 	?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="<?= JS_PATH ?>/jquery.ui.datepicker-ru.js"></script>
<script> 
$(function() {
	$("#datepicker1").datepicker($.datepicker.regional["ru"]);
	$("#datepicker2").datepicker($.datepicker.regional["ru"]);
   
});
</script>
</div>