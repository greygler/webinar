<? 
session_start();
require_once ('../config.php');
$file = '../include/uchbody.php';
$file2 = '../include/counter.dat';
$file_json='../json/uch.json';
$current = "<?= ".UCH_ADMIN."?>";
$current2 = file_get_contents($file2);
$json = file_get_contents($file_json);

$uch=json_decode($json,true);
foreach($uch as $key=>$value) 

	if ($value['id']!=$_SESSION['id']) { $new_uch[]=$value;
	$current.='<li><i class="flag-'.$value['country'].'"></i>&nbsp;'.$value['name'].'&nbsp;'.$value['device'].'</li>'."\n";
	}
	//echo("{$key} = {$value['id']}");


//print_r($_SESSION);
date_default_timezone_set(TIME_ZONE);
require_once (CLASS_PATH.'/db.class.php'); 
require_once (CLASS_PATH.'/functions.class.php');
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
	$result = mysql_query("UPDATE `realuser` SET  `login` =  '0' WHERE `realuser`.`id`='{$_SESSION['id']}'");
	//echo("UPDATE `realuser` SET  `login` =  '0' WHERE `realuser`.`id`='{$_SESSION['id']}'");
		$_SESSION['name']='';
		$_SESSION['email']='';
		$_SESSION['id']='';
		$_SESSION['country']='';
		$_SESSION['timezone']='';
		$_SESSION['device']='';
		$_SESSION['width']='';
		$_SESSION['height']='';
		$_SESSION['define']=array();
		
		
		
		$json=json_encode($new_uch);
	
	
		
		$current2=$current2-1;
		file_put_contents($file, $current);
		file_put_contents($file2, $current2);
		file_put_contents($file_json, $json);


header("location: /");
?>