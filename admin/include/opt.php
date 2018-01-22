<div class="container container_user_data
<div class="page-header">
<h1>Основные настройки автовебинара<? if ($_GET['save']=='1') echo(' <small>- <font color="green">Данные успешно сохранены!</font></small>'); 
 if (($_GET['save']=='2') OR ($_GET['save']=='3')) echo(' <small>- <font color="red">Ошибка сохранения данных!</font></small>'); ?></h1>
</div> 

<form role="form" action="options/save_opt.php" enctype="multipart/form-data" method="POST">
<div class="container">
<? $result = mysql_query("SELECT * FROM options");
$myrow = mysql_fetch_array($result);
do
{
$help_form=str_replace("%time_zone%", TIME_ZONE, $myrow['help_form']);
$help_form=str_replace("%time_zone_gmt%", TIME_ZONE_GMT, $help_form);

	?> <div class="form-group">
 <div class="col-md-2 col-lg-2">
<label for="<?= $myrow['name']?>"><?= $myrow['label']?></label></div><div class="col-md-10 col-lg-10">
<? if ($myrow['select']!="") { 
$select = unserialize($myrow['select']);
?>
<select class="form-control" name="value[<?= $myrow['name']?>]" id="<?= $myrow['name']?>">
<? foreach($select as $key => $value_opt) { ?>
<option <? if ($value_opt['value']==$myrow['value']) echo("selected") ?> value="<?= $value_opt['value'] ?>"><?= $value_opt['options'] ?>
<? if ($value_opt['value']==$myrow['value']) echo("&nbsp;&#10004;") ?> 
</option>
<? } ?>
</select>

<? } else  { ?>

<? if ($myrow['type']=="file") echo('<div class="row panel "><div class="col-xs-8">') ?>

<input <?= $myrow['required']?> class="form-control" id="<?= $myrow['name']?>" type="<? if ($myrow['type']!="") echo $myrow['type']; else echo("text"); ?>" name="value[<?= $myrow['name']?>]" value="<?= $myrow['value']?>" <? if ($myrow['accept']!="") echo('accept="'.$myrow['accept'].'"'); ?>>
<? if ($myrow['type']=="file") echo('</div><div class="col-xs-4"> <img width="100" class="img-responsive" src="'.FAVICON_G_PATH.'/'.$myrow['value'].'" alt=""> </div></div>') ?>
<? }   ?>
	

<span class="help-block"><?= $help_form ?></span></div></div>
<input type="hidden" name="help_form[<?= $myrow['name'] ?>]" value="<?= $myrow['help_form']?>">
<input type="hidden" name="label[<?= $myrow['name'] ?>]" value="<?= $myrow['label']?>">
<input type="hidden" name="select[<?= $myrow['name'] ?>]" value='<?= $myrow['select']?>'>
<input type="hidden" name="value[<?= $myrow['name'] ?>]" value="<?= $myrow['value']?>">
<?
$value[$myrow['name']]=$myrow['value'];
}
while ($myrow = mysql_fetch_array($result));
?>
<button type="submit" class="btn btn-primary form-control">Сохранить</button>
</div>
</form>

</div>
<script type="text/javascript" src="../js/wickedpicker.min.js"></script>
 <link href="../css/wickedpicker.min.css" rel="stylesheet">


<script> 
$('#TIME').wickedpicker({now: "<?= $value['TIME']?>", twentyFour: true, showSeconds: true});
$('#TIME_COUNT').wickedpicker({now: "<?= $value['TIME_COUNT']?>", twentyFour: true, showSeconds: true});
</script>