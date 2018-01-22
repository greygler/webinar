<h1>Массивы для SELECT</h1>
Часовые пояса:<br><br>
<? 
$menu=array(
 '1' => array(
 'options' => 'GMT-12:00 (Анадырь, Камчатка)',
 'value' => 'GMT-12:00'
 ),
 '2' => array(
 'options' => 'GMT-11:00 (Ном (Аляска), Самоа)',
 'value' => 'GMT-11:00'
 ),
 '3' => array(
 'options' => 'GMT-10:00 (Аляска, Гавайи)',
 'value' => 'GMT-10:00'
 ),
 '4' => array(
 'options' => 'GMT-07:00 (Денвер, Феникс, о.Пасхи)',
 'value' => 'GMT-07:00'
 ),
 '5' => array(
 'options' => 'GMT-05:00 (Нью-Йорк, Вашингтон, Атланта, Оттава, Гавана, Богота, Лима)',
 'value' => 'GMT-05:00'
 ),
  '6' => array(
 'options' => 'GMT-04:00 (Ла-Пас, Каракас, Галифакс)',
 'value' => 'GMT-04:00'
 ),
 '7' => array(
 'options' => 'GMT-03:00 (Асунсьон, Буэнос-Айрес)',
 'value' => 'GMT-03:00'
 ),
  '8' => array(
 'options' => 'GMT-02:00 (Сан-Паулу, Бразилиа)',
 'value' => 'GMT-02:00'
 ),
 '9' => array(
 'options' => 'GMT-01:00 (Азорские о-ва)',
 'value' => 'GMT-01:00'
 ),
'10' => array(
 'options' => 'GMT (Гринвич, Лондон, Рейкьявик, Лиссабон, Дакар)',
 'value' => 'GMT'
 ),
 '11' => array(
 'options' => 'GMT+01:00 (Рим, Париж, Берлин, Осло, Мадрид, Копенгаген, Вена)',
 'value' => 'GMT+01:00'
 ),
 '12' => array(
 'options' => 'GMT+02:00 (Киев, Минск, Анкара, Афины, Иерусалим, Хельсинки, София, Бухарест, Кейптаун)',
 'value' => 'GMT+02:00'
 ),
 '13' => array(
 'options' => 'GMT+03:00 (Москва, Донецк, Луганск, Аддис-Абеба, Багдад)',
 'value' => 'GMT+03:00'
 ),
 '14' => array(
 'options' => 'GMT+04:00 (Тегеран, Баку, Абу-Даби)',
 'value' => 'GMT+04:00'
 ),
 '15' => array(
 'options' => 'GMT+05:00 (Душанбе, Ташкент, Карачи)',
 'value' => 'GMT+05:00'
 ),
 '16' => array(
 'options' => 'GMT+06:00 Алматы, Тюмень)',
 'value' => 'GMT+06:00'
 ),
 '17' => array(
 'options' => 'GMT+07:00 (Новосибирск, Джакарта, Бангкок)',
 'value' => 'GMT+07:00'
 ),
  '18' => array(
 'options' => 'GMT+08:00 (Иркутск, Пекин, Шанхай)',
 'value' => 'GMT+08:00'
 ),
  '19' => array(
 'options' => 'GMT+09:00 (Токио, Сеул, Пхеньян)',
 'value' => 'GMT+09:00'
 ),
  '20' => array(
 'options' => 'GMT+10:00 (Канберра, Сидней, Мельбурн)',
 'value' => 'GMT+10:00'
 ),
  '21' => array(
 'options' => 'GMT+11:00 (Магадан)',
 'value' => 'GMT+11:00'
 ),
  '22' => array(
 'options' => 'GMT+12:00 (Веллингтон)',
 'value' => 'GMT+12:00'
 ),
 


 );
 echo serialize($menu);
?>
<br><br>ВКЛ - ВЫКЛ (для free)<br><br>
<? 
$menu=array(
 '1' => array(
 'options' => 'Включить',
 'value' => 'true'
 ),
 '2' => array(
 'options' => 'Выключить',
 'value' => 'false'
 ),
 


 );
 echo serialize($menu);
?>
<br><br>Языки<br><br>
<? 
$menu=array(
 'ru' => array(
 'options' => 'Русский',
 'value' => 'ru'
 ),
 'ua' => array(
 'options' => 'Українська',
 'value' => 'ua'
 ),
  'en' => array(
 'options' => 'English',
 'value' => 'en'
 ),
 


 );
 echo serialize($menu);
?>
<br><br>ROBOTS<br><br>
<? 
$menu=array(
 'index' => array(
 'options' => ' index (индексировать эту страницу)',
 'value' => 'index'
 ),
  'noindex' => array(
 'options' => 'noindex (не индексировать эту страницу)',
 'value' => 'noindex'
 ),
 
 'follow' => array(
 'options' => 'follow (идти по ссылкам с этой страницы)',
 'value' => 'follow'
 ),
 
 'nofollow' => array(
 'options' => 'nofollow (не идти по ссылкам с этой страницы)',
 'value' => 'nofollow'
 ),
 
  'all' => array(
 'options' => 'all (индексировать эту страницу, идти по ссылкам с этой страницы',
 'value' => 'all'
 ),
   'none' => array(
 'options' => 'none (не индексировать эту страницу, не идти по ссылкам с этой страницы',
 'value' => 'none'
 ),
 


 );
 echo serialize($menu);
?>