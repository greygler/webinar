<?
require_once ('functions.class.php');	
class track {
	
public function trackId()
{
	return dechex(time());
}	
	
public function WhatTrack($p)
{
	if ($p!="") {
		if (db::cound_bd('track', "`track_id`='{$p}'")>0) {
			$result = mysql_query("SELECT * FROM `track` WHERE `track_id`='{$p}'");
			$myrow = mysql_fetch_array($result);
			$track_id=$myrow['id'];
		}
		else $track_id='1';
	} else $track_id='1';
	
	return $track_id;
}

public function addTrack($p, $ip, $cookie)
{
	$track_id=track::WhatTrack($p);
	$server=serialize($_SERVER);
	$time=time();
	$country=func::tabgeo_country_v4($ip);
	$device=func::is_mobile();
	$result=mysql_query("INSERT INTO `whois` (`track_id`, `server`, `ip`,`time`,`country`, `device`, `cookie`) VALUES ('{$track_id}', '{$server}', '{$ip}', '{$time}', '{$country}', '{$device}', '{$cookie}')");
	if ($result == 'true') return "ok"; else echo "error";
	
}

public function track_id($track_id)
{

	$result = mysql_query("SELECT * FROM `track` WHERE `track_id`='{$track_id}'");
	$myrow = mysql_fetch_array($result);
	$path['id']=$myrow['id'];
	$path['mod']=$myrow['mod'];
	$path['ab']=$myrow['ab'];
	$path['1']=$myrow['track1'];
	$path['riderict']=$myrow['riderict'];
	if ($myrow['track2']!="") $path['2']=$myrow['track2']; else $path['2']=$myrow['track1'];
	return $path;
}

public function track_default()
{
	$result = mysql_query("SELECT * FROM `track` WHERE `id`=1");
	$myrow = mysql_fetch_array($result);
	return $myrow['track1'];
}

public function active_track($track_id)
{
	$track=track::WhatTrack($track_id);
	if ($track>0) $path=track::track_id($_GET['p']); else $path=track::track_default();	
	
	return $path;
}

public function count_ip($ip, $id="")
{
	if ($id!="") $wid=" AND `track_id`='{$id}'";
	$count_ip=db::cound_bd('whois', "`ip`='{$ip}'{$wid}");
	return $count_ip;
}

public function count_ip_48($ip, $id="")
{
	if ($id!="") $wid=" AND `track_id`='{$id}'";
	$h48=time()-(60*60*24*2);
	$count_ip=db::cound_bd('whois', "`ip`='{$ip}' AND `time`>{$h48}{$wid}");
	return $count_ip;
}

 public function is_one_ip($ip_one, $net) // Принадлежность ip маске net
 {
	$ip=ip2long($ip_one);
	list($net,$mask)=explode('/',$net);
	$net=ip2long($net);
	$mask=pow(2,32-$mask)-1;
	$net=$net&~$mask;
	if (!(($ip^$net)&~$mask)) { return true; } else { return false; }
 }
 
 public function is_ip($ip, $file_ip) // принадлежность ip группе маск
 {
	$all_ip=file($file_ip);
	foreach ($all_ip as $key => $value) 
		if (track::is_one_ip($ip,$value)==true) {$is_ip=true;}
	return $is_ip;
 }
 
 
public function riderict($href)
{
	header("Location: {$href}");
}

public function curl_go($href)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $href);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
}

public function go_to($href, $riderict)
{
	if ($riderict>0) track::riderict($href);
	else track::curl_go($href);
}

}
?>