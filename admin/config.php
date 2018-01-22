<?
// Данные о автовебинаре
/* define('TIME_ZONE','UTC');									// Временная зона, http://php.net/manual/ru/timezones.europe.php
define('TIME_ZONE_GMT','GMT+02:00');						// Cдвиг временной зоны GMT+02:00
define('LANG','ru'); 										// Язык страницы (ru, ua, en)
define('TITLE','«Организация продаж через LandingPage»'); 	// Название автовебинара, метатег title,
define('DESCRIPTION','Какая-то информация о вебинаре из Метатега description'); // Описание автовебинара, метатег description
define('FREE','true'); 									// Бесплатный вебинар - значек FREE (true, false)
define('KEYWORDS',''); 										// Метатег keywords
define('TIME_TEXT','19:00 (Киев)'); 						// Тестовое представление времени запуска
define('TIME','16:52:00'); 									// Время запуска по таймзоне TIME_ZONE_GMT c секундами, 19:00:00
define('TIME_COUNT','00:01:10'); 							// Продолжительность записи автовебинара c секундами, 02:10:00
define('YOUTUBE_ID','N1cZFhFTgBs');							// ID видео из YouTube
define('ADMIN','Администратор');							// Имя администратора\модератора чата вебинара
define('ADMIN_EMOJI','💁'); 									// Эмоджи админа
define('OG_IMAGE','image.jpg'); 							// Имя файла - рисунок для соцсетей */

	
define('TIME_ZONE','UTC');									// Зона времени http://php.net/manual/ru/timezones.europe.php
define('TIME_ZONE_GMT', 'GMT');								// Сдвиг временной зоны - GMT, GMT+2:00;
define('ADMIN_EMOJI','💁'); 									// Эмоджи админа


// Данные, для работы автовебинарной платформы	
define('SITE_ADDR','http://'.$_SERVER['SERVER_NAME']); // Адрес системы без слеш на конце!
//define('ABS_PATH','/var/www/greyg156/data/www/webinar.infotools.pp.ua/'); //  Абсолютный путь на сервере
define('ABS_PATH',$_SERVER['DOCUMENT_ROOT']); //  Абсолютный путь на сервере
define('FAVICON_PATH',ABS_PATH.'/favicon'); // Путь для favicon на сервере
define('FAVICON_G_PATH',SITE_ADDR.'/favicon'); // Абсолютный путь для favicon
define('FAVICON','favicon.png'); // Название файла PNG размером не менее 152x152 для создания favicon. 
define('JS_PATH',SITE_ADDR.'/js'); // Абсолютный путь для JS
define('CSS_PATH',SITE_ADDR.'/css'); // Абсолютный путь для css
define('CLASS_PATH',ABS_PATH.'/class'); // Серверный путь классов



$seller = "";
$seller_adress = "";
$contact_phone1 = "";
$contact_phone2 = "";
$contact_phone3 = "";
$contact_email = "test@test.com";



$timezone=array(
'UA' => 'Europe/Kiev',
'UA' => 'Europe/Kiev',
'UA' => 'Europe/Kiev',

);


define('DB_HOST', 'localhost'); 	// Адрес базы данных, может называться localhost
define('DB_NAME', 'webianar'); 	// Название базы данных
define('DB_LOGIN', 'webianar'); 	// Логин базы данных
define('DB_PASS', '1234567890'); 	// Пароль базы данных  */
?>
<?/*

define('DB_HOST', 'localhost'); 	// Адрес базы данных, может называться localhost
define('DB_NAME', 'greyg156_web'); 	// Название базы данных
define('DB_LOGIN', 'greyg156_web'); 	// Логин базы данных
define('DB_PASS', '9N9r1L9m'); 	// Пароль базы данных */
?>
<? // require_once('value.php');