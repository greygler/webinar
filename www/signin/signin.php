<? session_start();
require_once ('../config.php');
require_once (CLASS_PATH.'/db.class.php'); 
require_once (CLASS_PATH.'/functions.class.php');

$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
require_once ('../define.php');
//require_once ('../value.php');
require_once ('../include/lang.php');

date_default_timezone_set(TIME_ZONE);
 function whereid($email){
	 $result = mysql_query("SELECT * FROM  `realuser` WHERE `email`='{$email}'");
		$myrow = mysql_fetch_array($result);
		return $myrow['id'];
}
$ip=func::GetRealIp();
$country=func::tabgeo_country_v4($ip);
$server=serialize($_SERVER);
$file = '../include/uchbody.php';
$file2 = '../include/counter.dat';
$file_json='../json/uch.json';
$current = file_get_contents($file);
$current2 = file_get_contents($file2);
$json = file_get_contents($file_json);
$uch=json_decode($json,true);

$device=func::device_icon(func::is_mobile());

//print_r($_POST);

//$password=md5($_POST['password']);
//if (db::cound_bd('users', "(login='{$_POST['login']}' AND password='{$password}')")>0) {
	if (db::cound_bd('realuser', "`email`='{$_POST['email']}'")>0) {
		$id=whereid($_POST['email']);
	//	echo $id;
		$result = mysql_query("UPDATE `realuser` SET  `login` =  '1' WHERE `realuser`.`id`='{$id}';");
		
		
	}
	else {
		$result = mysql_query("INSERT INTO `realuser` (`name` ,`email` ,`session` ,`login`, `server`, `country`) VALUES ('{$_POST['name']}', '{$_POST['email']}',  '',  '1','{$server}','{$country}')");
		$id=whereid($_POST['email']);
	//	echo $id;
		
	}
	
	$_SESSION['name']=$_POST['name'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['id']=$id;
	$_SESSION['country']=$country;
	$_SESSION['timezone']=$_POST['timezone'];
	$_SESSION['device']=$device;
	$_SESSION['width']=$_POST['width'];
	$_SESSION['height']=$_POST['height'];
	
	$user=array(
	 'name'		=> $_POST['name'],
	 'email'	=> $_POST['email'],
	 'id'		=> $id,
	 'timezone'	=> $_POST['timezone'],
	 'device'	=> $device,
	);

	$uch[]=$user;
	
	$json=json_encode($uch);
	
	
$current.='<li><i class="flag-'.$country.'"></i>&nbsp;'.$_POST['name'].'&nbsp;'.$device.'</li>'."\n";
$current2=$current2+1;
file_put_contents($file, $current);
file_put_contents($file2, $current2);
file_put_contents($file_json, $json);

header("location: /");
//print_r($_SESSION);

