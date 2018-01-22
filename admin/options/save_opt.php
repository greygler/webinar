<? session_start();
//print_r($_SESSION);
//print_r($_POST); echo"<br>";
if (($_SESSION['login']!="") AND ($_SESSION['password']!="") AND ($_SESSION['admin']=='1') ) {

require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php'); 
require_once (CLASS_PATH.'/functions.class.php');
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
$result = mysql_query ("TRUNCATE TABLE `options`");

if ($result==true) {

foreach ($_POST['value'] as $key => $value) {
	//echo "{$key} = {$value}<br>";
	$values.="('{$key}','{$value}','{$_POST['help_form'][$key]}','{$_POST['label'][$key]}','{$_POST['select'][$key]}' ),";
	
} 
$values = substr($values, 0, -1);
$db= "INSERT INTO  `options` (`name` ,`value` ,`help_form`,`label`, `select`) VALUES ".$values;
//echo $db;

$result = mysql_query ($db);
//echo ("INSERT INTO `ds` (`name`) VALUES {$values}");
if ($result==true) $save=1; else $save=3;
}
else $save=2;
}
header("location: /opt/?save={$save}"); 

//INSERT INTO  `options` (`name` ,`value` ,`help_form`) VALUES ('sdf',  'rty',  'dfg'), ('tyu',  'tyu',  'tyu') 
