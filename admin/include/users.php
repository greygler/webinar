<? if (($_SESSION['login']!="") AND ($_SESSION['password']!="")) { ?>
<div class="container">
<div class="text-right">
<button class="btn btn-success" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Добавить пользователя</button>
</div>
<? if ($_GET['i']=='d') echo('<center><font color="red">Данные не сохранены! Обнаружено несколько одинаковых логина! Исправьте!</font></center>') ?>
<? if ($_GET['i']=='u') echo('<center><font color="red">Данные не сохранены! Пользователь с таким логином существует! Исправьте!</font></center>') ?>
<form action="options/save_user.php" method="POST">
<table class="table table-striped">
<thead><th>id</th><th>Админ</th><th>Имя</th><th>Логин</th><th>Сменить пароль</th><th></th></thead>
<tbody>

<? 
$result = mysql_query("SELECT * FROM `users`");
$myrow = mysql_fetch_array($result);
do
{ ?>


<tr> 
<td><p><?= $myrow['id'] ?></p></td>
<td><input class="form-control" name="admin[<?= $myrow['id'] ?>]" type="checkbox" <? if ($myrow['admin']=='1')  echo("checked")?> <? if ($myrow['id']=='1')  echo("disabled")?>> <script>$("[name='admin[<?= $myrow['id'] ?>]']").bootstrapSwitch();</script></td>
<td><input class="form-control" type="text" name="name[<?= $myrow['id'] ?>]" value="<?= $myrow['name'] ?>" placeholder="Имя пользователя" required></td>
<td><input class="form-control" type="text" name="login[<?= $myrow['id'] ?>]" value="<?= $myrow['login'] ?>" placeholder="Логин" required></td>
<td><input class="form-control" type="password" name="password[<?= $myrow['id'] ?>]" value="" placeholder="Новый пароль" > 
</td><td><a href="#" <? if ($myrow['id']=='1')  echo("disabled")?> data-toggle="modal" data-target="#del_user_<?= $myrow['id'] ?>" class="btn btn-danger" title="Удалить пользователя"><i class="fa fa-trash" aria-hidden="true"></i></a>
</td>
</tr>
<? if ($myrow['id']!='1') { ?>
 <div class="modal fade" id="del_user_<?= $myrow['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Удалить пользователя</h4>
      </div>
      <div class="modal-body">
        Вы действительно хотите удалить пользователя <strong><?= $myrow['name'] ?></strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <a href="options/del_user.php?id=<?= $myrow['id'] ?>" type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</a>
      </div>
    </div>
  </div>
</div>  <? } 
}
while ($myrow = mysql_fetch_array($result));
?>
</tbody>


</table>
<input class="form-control btn-primary" type="submit" value="Сохранить">
</form>

</div>

<div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
	 <form action="options/add_user.php" method="POST">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Добавить пользователя</h4>
      </div>
      <div class="modal-body">
        
		<div class="form-group"> 
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user-o fa-fw" aria-hidden="true"></i></span>
		<input class="form-control" placeholder="Имя пользователя" name="name" required type="text">
		</div>
		</div>
		<div class="form-group"> 
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
		<input type="text" placeholder="Логин для входа в админпанель"  name="login" required class="form-control">
		</div></div>
		<div class="form-group"> 
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
		<input type="password" placeholder="Пароль для входа в админпанель" name="password" required class="form-control">
		</div></div>
		<div class="form-group"> 
		<div class="checkbox">
    <label>
          <input  value="1" name="admin" type="checkbox">Права администратора
        </label>
		
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
        <button type="submit" class="btn btn-primary">Добавить пользователя</button>
      </div>
	  </form>
    </div>
  </div>
</div>

</div><? } ?>