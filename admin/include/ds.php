<div class="container container_user_data">
<div class="page-header">
<h1>«Мертвые Души»<? if ($_GET['save']=='1') echo(' <small>- <font color="green">Данные успешно сохранены!</font></small>'); 
 if (($_GET['save']=='2') OR ($_GET['save']=='3')) echo(' <small>- <font color="red">Ошибка сохранения данных!</font></small>'); ?>
</h1>
</div>
		
<form class="form-horizontal" role="form" action="options/save_ds.php" method="POST">
<p><textarea required class="form-control" name="ds" id="ds" cols="30" rows="10">
<?
$result = mysql_query("SELECT * FROM `ds`");
$myrow = mysql_fetch_array($result);
do
{
$ds.=$myrow['name'].", ";

}
while ($myrow = mysql_fetch_array($result));
$ds = substr($ds, 0, -2);
echo $ds;
?>
</textarea>
<span class="help-block">Введите через запятую имена виртуальных посетителей Вашего автовебинара, или отредактируйте готовый список. Например: <i>Иван Иванов, Петр Петров, Вася....</i></span></p>
<button type="submit" class="form-control btn btn-primary">Сохранить</button>
</form>
</div>
