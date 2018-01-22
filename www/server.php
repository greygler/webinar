<? print_r($_SERVER);
echo ("<br>");
print geoip_database_info(GEOIP_COUNTRY_EDITION);
echo ("<br>"); 
$ip=$_SERVER['REMOTE_ADDR'];
echo $ip;
$record = geoip_record_by_name($ip);
   print_r($record);echo ("<br>-"); 