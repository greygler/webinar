<? session_start();
//print_r($_SESSION);
if (($_SESSION['login']!="") AND ($_SESSION['password']!="") AND ($_SESSION['admin']=='1') AND ($_POST['login']!="") ) {

require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php'); 
require_once (CLASS_PATH.'/functions.class.php');
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
//echo db::cound_bd('users', $where="login='{$_POST['login']}'");
$dl=db::cound_bd('users', $where="login='{$_POST['login']}'");
if ($dl>0) {header("location: /admin?p=users&i=u"); exit;} else {


$password=md5($_POST['password']);
if ($_POST['admin']!="") $admin=1; else $admin=0;
$result = mysql_query ("INSERT INTO `users` (name, login, password, admin) VALUES ('{$_POST['name']}', '{$_POST['login']}', '{$password}', {$admin})");
}
}
header("location: /users");
