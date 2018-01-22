<? // Вычисляем дату сегодня
$month['ru']=array('','Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря'); // Месяцы рус
$month['ua']=array('','Січня','Лютого','Березня','Квітня','Травня','Червня','Липня','Серпня','Вересня','Жовтня','Листопада','Грудня'); // Месяцы укр
$month['en']=array('','January','February','March','April','May','June','July ','August','September','October','November','December'); // Месяцы укр

$mt=date('n'); // Текущий номер месяца
$today=date("F d Y"); // Дата сегодня в формате месяц день год (December 24 2017)

// Вычисляем время окончания вебинара
list($h, $m) = explode(':', TIME);// Форматируем время до нужного формата
$time_end = date('H:i:s', strtotime("+$h hour $m minute", strtotime(TIME_COUNT))); // Вычисляем

// Прочие данные со временем

$tb=constant("TIME").' '.constant("TIME_ZONE_GMT"); // Время запуска по таймзоне ?
define('TIME_BEGIN',$tb); // Время запуска по таймзоне ?
define('TIME_END',$time_end.' '.TIME_ZONE_GMT); // Время окончания по таймзоне UA ?
define('DATE',date("j")." ".$month[LANG][$mt]." ".date("Y")); //Текущая дата c правописанием месяца на выбраном языке
define('TIME_COUNTER_BEGIN',$today.' '.TIME_BEGIN); //Дата\время начала автовебинара для запуска счетчиков обратного отсчета
define('TIME_COUNTER_END',$today.' '.TIME_END); //Дата\время окончания автовебинара для счетчиков обратного отсчета
define('TIMESTAMP_BEGIN', strtotime(TIME_COUNTER_BEGIN)); // Время UNIX начала вебинара
define('TIMESTAMP_END', strtotime(TIME_COUNTER_END)); // Время UNIX конец вебинара
define('BEGIN', time()-TIMESTAMP_BEGIN );

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
define('SETINTERVAL','5000'); // Время обновления чата, в мс

define('YT_GET1','?autoplay=1&amp;controls=0&amp;autohide=1&amp;modestbranding=1&amp;rel=0&amp;disablekb=1&amp;enablejsapi=1&amp;iv_load_policy=3&amp;webkit-playsinline=1&amp;playsinline=1&amp;showinfo=0&amp;start=');


define('YT_GET','?rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;fs=0&amp;iv_load_policy=3&amp;modestbranding=1&amp;showinfo=0&ampstart=');

define('YOUTUBE','https://www.youtube.com/embed/'.YOUTUBE_ID.YT_GET.BEGIN); // Формируем ссылку  на  YouTube-видео

define('UCH_ADMIN','<li>'.ADMIN_EMOJI.'&nbsp;<span>'.ADMIN.'</span>&nbsp;💻</li>'); // Администратор в участниках вебинара

?>