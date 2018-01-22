<? require_once ('../config.php');
require_once (CLASS_PATH.'/db.class.php'); 
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
require_once ('../define.php'); 
echo YOUTUBE; ?>