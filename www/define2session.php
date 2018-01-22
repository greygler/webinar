<? 
$result = mysql_query("SELECT * FROM options");
$myrow = mysql_fetch_array($result);
do {
//define($myrow['name'], $myrow['value']);
$_SESSION['define'][$myrow['name']]=$myrow['value'];
//echo ("{$myrow['name']} = {$myrow['value']}<br>");
}
while ($myrow = mysql_fetch_array($result));
?>