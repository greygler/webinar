<? session_start();
//print_r($_SESSION);
if (($_SESSION['login']!="") AND ($_SESSION['password']!="") AND ($_SESSION['admin']=='1') AND ($_POST['login']!="") ) {

require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php'); 
require_once (CLASS_PATH.'/functions.class.php');
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);

$no_login=false;
$login_count=array_count_values ($_POST['login']);
foreach ($login_count as $key => $value) if ($value>1) $no_login=true;

if ($no_login) header("location: /admin?p=users&i=d");

foreach($_POST['name'] as $key => $value) {
	if ($_POST['password'][$key]!="") {$password=md5($_POST['password'][$key]); $pass_db=", password='{$password}'";} else $pass_db="";
	if ($_POST['admin'][$key]!="") $admin=1; else $admin=0;
$result = mysql_query ("UPDATE `users` SET name='{$value}', login='{$_POST['login'][$key]}', admin='{$admin}' {$pass_db} WHERE id='{$key}'");
//echo  ("UPDATE users SET name='{$value}', login='{$_POST['login'][$key]}' {$pass_db} WHERE id='{$key}'");
}
}
header("location: /users");
