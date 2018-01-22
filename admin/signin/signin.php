<? session_start();
require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php'); 
require_once (CLASS_PATH.'/functions.class.php');
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
$password=md5($_POST['password']);
if (db::cound_bd('users', "(login='{$_POST['login']}' AND password='{$password}')")>0) {
	$result = mysql_query("SELECT * FROM  users WHERE (login='{$_POST['login']}' AND password='{$password}')");
	$myrow = mysql_fetch_array($result);
	$_SESSION['login']=$myrow['login'];
	$_SESSION['password']=$myrow['password'];
	$_SESSION['name']=$myrow['name'];
	$_SESSION['admin']=$myrow['admin'];
	header("location: /");
}
else header("location: /signin?login=no");
