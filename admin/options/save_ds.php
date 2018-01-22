<? session_start();
//print_r($_SESSION);
//print_r($_POST); echo"<br>";
if (($_SESSION['login']!="") AND ($_SESSION['password']!="") AND ($_SESSION['admin']=='1') ) {

require_once ($_SERVER['DOCUMENT_ROOT'].'/config.php');
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php'); 
require_once (CLASS_PATH.'/functions.class.php');
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
$result = mysql_query ("TRUNCATE TABLE `ds`");
if ($result==true) {
$clean = trim($_POST['ds']);
$str1=str_replace(" ," , "," , $clean);
$str=str_replace(", " , "," , $str1);
$values="('".str_replace("," , "'), ('" , $str)."')";

$result = mysql_query ("INSERT INTO `ds` (`name`) VALUES {$values}");
//echo ("INSERT INTO `ds` (`name`) VALUES {$values}");
if ($result==true) $save=1; else $save=3;
}
else $save=2;
}
header("location: /ds/?save={$save}"); 
