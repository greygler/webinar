<? 
class func {
public function user_browser($agent) {
	preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/", $agent, $browser_info); // регулярное выражение, которое позволяет отпределить 90% браузеров
        list(,$browser,$version) = $browser_info; // получаем данные из массива в переменную
        if (preg_match("/Opera ([0-9.]+)/i", $agent, $opera)) return 'Opera '.$opera[1]; // определение _очень_старых_ версий Оперы (до 8.50), при желании можно убрать
        if ($browser == 'MSIE') { // если браузер определён как IE
                preg_match("/(Maxthon|Avant Browser|MyIE2)/i", $agent, $ie); // проверяем, не разработка ли это на основе IE
                if ($ie) return $ie[1].' based on IE '.$version; // если да, то возвращаем сообщение об этом
                return 'IE '.$version; // иначе просто возвращаем IE и номер версии
        }
        if ($browser == 'Firefox') { // если браузер определён как Firefox
                preg_match("/(Flock|Navigator|Epiphany)\/([0-9.]+)/", $agent, $ff); // проверяем, не разработка ли это на основе Firefox
                if ($ff) return $ff[1].' '.$ff[2]; // если да, то выводим номер и версию
        }
        if ($browser == 'Opera' && $version == '9.80') return 'Opera '.substr($agent,-5); // если браузер определён как Opera 9.80, берём версию Оперы из конца строки
        if ($browser == 'Version') return 'Safari '.$version; // определяем Сафари
        if (!$browser && strpos($agent, 'Gecko')) return 'Browser based on Gecko'; // для неопознанных браузеров проверяем, если они на движке Gecko, и возращаем сообщение об этом
        return $browser.' '.$version; // для всех остальных возвращаем браузер и версию
}

 
public function is_mobile() {
	#Определяем пренадлежность браузера к мобильным устройствам
    #Возвращает false - если браузер не определен или стационарный
    #и от 1 до 4 (зависит от типа определения) - если браузер относится к мобильным устройствам
  $user_agent=strtolower(getenv('HTTP_USER_AGENT'));
  $accept=strtolower(getenv('HTTP_ACCEPT'));
 
  if ((strpos($accept,'text/vnd.wap.wml')!==false) ||
      (strpos($accept,'application/vnd.wap.xhtml+xml')!==false)) {
    return 1; // Возращает 1 если мобильный браузер определен по HTTP-заголовкам
  }
 
  if (isset($_SERVER['HTTP_X_WAP_PROFILE']) ||
      isset($_SERVER['HTTP_PROFILE'])) {
    return 2; // Возвращает 2 если мобильный браузер определен по установкам сервера
  }
 
  if (preg_match('/(mini 9.5|vx1000|lge |m800|e860|u940|ux840|compal|'.
    'wireless| mobi|lg380|ahong|lgku|lgu900|lg210|lg47|lg920|lg840|'.
    'lg370|sam-r|mg50|s55|g83|mk99|vx400|t66|d615|d763|sl900|el370|'.
    'mp500|samu4|samu3|vx10|xda_|samu6|samu5|samu7|samu9|a615|b832|'.
    'm881|s920|n210|s700|c-810|_h797|mob-x|sk16d|848b|mowser|s580|'.
    'r800|471x|v120|rim8|c500foma:|160x|x160|480x|x640|t503|w839|'.
    'i250|sprint|w398samr810|m5252|c7100|mt126|x225|s5330|s820|'.
    'htil-g1|fly v71|s302|-x113|novarra|k610i|-three|8325rc|8352rc|'.
    'sanyo|vx54|c888|nx250|n120|mtk |c5588|s710|t880|c5005|i;458x|'.
    'p404i|s210|c5100|s940|teleca|c500|s590|foma|vx8|samsu|vx9|a1000|'.
    '_mms|myx|a700|gu1100|bc831|e300|ems100|me701|me702m-three|sd588|'.
    's800|8325rc|ac831|mw200|brew |d88|htc\/|htc_touch|355x|m50|km100|'.
    'd736|p-9521|telco|sl74|ktouch|m4u\/|me702|8325rc|kddi|phone|lg |'.
    'sonyericsson|samsung|nokia|240x|x320vx10|sony cmd|motorola|'.
    'up.browser|up.link|mmp|symbian|android|tablet|iphone|ipad|mobile|smartphone|j2me|wap|vodafone|o2|'.
    'pocket|kindle|mobile|psp|treo)/', $user_agent)) {
    return 3; // Возвращает 3 если мобильный браузер определен по сигнатуре User Agent
  }
 
  if (in_array(substr($user_agent,0,4),
    Array("1207", "3gso", "4thp", "501i", "502i", "503i", "504i", "505i", "506i",
          "6310", "6590", "770s", "802s", "a wa", "abac", "acer", "acoo", "acs-",
          "aiko", "airn", "alav", "alco", "alca", "amoi", "anex", "anyw", "anny",
          "aptu", "arch", "asus", "aste", "argo", "attw", "au-m", "audi", "aur ",
          "aus ", "avan", "beck", "bell", "benq", "bilb", "bird", "blac", "blaz",
          "brew", "brvw", "bumb", "bw-n", "bw-u", "c55/", "capi", "ccwa", "cdm-",
          "cell", "chtm", "cldc", "cmd-", "dmob", "cond", "craw", "dait", "dall", 
          "dbte", "dc-s", "devi", "dica", "doco", "dopo", "ds-d", "ds12", "dang",
          "el49", "elai", "eml2", "emul", "eric", "erk0", "esl8", "ez40", "ez60",
          "ez70", "ezos", "ezwa", "ezze", "fake", "fetc", "fly-", "fly_", "g-mo",
          "g1 u", "g560", "gene", "gf-5", "go.w", "good", "grad", "grun", "haie",
          "hcit", "hd-m", "hd-p", "hd-t", "hei-", "hiba", "hipt", "hita", "hp i",
          "hpip", "hs-c", "htc ", "htc-", "htc_", "htca", "htcg", "htcp", "htcs",
          "htct", "http", "hutc", "huaw", "i-20", "i-go", "i-ma", "i230", "iac",
          "iac-", "iac/", "ibro", "idea", "ig01", "ikom", "im1k", "inno", "ipaq",
          "iris", "jata", "java", "jbro", "jemu", "jigs", "kddi", "keji", "kgt",
          "kgt/", "klon", "kpt ", "kwc-", "kyoc", "kyok", "leno", "lexi", "lg g",
          "lg-a", "lg-b", "lg-c", "lg-d", "lg-f", "lg-g", "lg-k", "lg-l", "lg-m",
          "lg-o", "lg-p", "lg-s", "lg-t", "lg-u", "lg-w", "lg/k", "lg/l", "lg/u",
          "lg50", "lg54", "lge-", "lge/", "libw", "lynx", "m-cr", "m1-w", "m3ga",
          "m50/", "mate", "maui", "maxo", "mc01", "mc21", "mcca", "medi", "merc",
          "meri", "midp", "mio8", "mioa", "mits", "mmef", "mo01", "mo02", "mobi",
          "mode", "modo", "mot ", "mot-", "moto", "motv", "mozz", "mt50", "mtp1",
          "mtv ", "mwbp", "mywa", "n100", "n101", "n102", "n202", "n203", "n300",
          "n302", "n500", "n502", "n505", "n700", "n701", "n710", "nec-", "nem-",
          "neon", "netf", "newg", "newt", "nok6", "noki", "nzph", "o2 x", "o2-x",
          "o2im", "opti", "opwv", "oran", "owg1", "p800", "palm", "pana", "pand",
          "pant", "pdxg", "pg-1", "pg-2", "pg-3", "pg-6", "pg-8", "pg-c", "pg13",
          "phil", "pire", "play", "pluc", "pn-2", "pock", "port", "pose", "prox",
          "psio", "pt-g", "qa-a", "qc-2", "qc-3", "qc-5", "qc-7", "qc07", "qc12",
          "qc21", "qc32", "qc60", "qci-", "qtek", "qwap", "r380", "r600", "raks",
          "rim9", "rove", "rozo", "s55/", "sage", "sama", "sams", "samm", "sany",
          "sava", "sc01", "sch-", "scoo", "scp-", "sdk/", "se47", "sec-", "sec0",
          "sec1", "semc", "send", "seri", "sgh-", "shar", "sie-", "siem", "sk-0",
          "sl45", "slid", "smal", "smar", "smb3", "smit", "smt5", "soft", "sony",
          "sp01", "sph-", "spv ", "spv-", "sy01", "symb", "t-mo", "t218", "t250",
          "t600", "t610", "t618", "tagt", "talk", "tcl-", "tdg-", "teli", "telm",
          "tim-", "topl", "treo", "tosh", "ts70", "tsm-", "tsm3", "tsm5", "tx-9",
          "up.b", "upg1", "upsi", "utst", "v400", "v750", "veri", "virg", "vite",
          "vk-v", "vk40", "vk50", "vk53", "vk52", "vm40", "vulc", "voda", "vx52",
          "vx53", "vx60", "vx61", "vx70", "vx80", "vx81", "vx83", "vx85", "vx98",
          "w3c ", "w3c-", "wap-", "wapa", "wapi", "wapj", "wapp", "wapm", "wapr",
          "waps", "wapt", "wapu", "wapv", "wapy", "webc", "whit", "wig ", "winc",
          "winw", "wmlb", "wonu", "x700", "xda-", "xdag", "xda2", "yas-", "your",
          "zeto", "zte-"))) {
    return 4; // Возвращает 4 если мобильный браузер определен по сигнатуре User Agent
  }
 
  return 0; // Возвращает 0 если мобильный браузер не определен или браузер стационарный
}

public function device_name($device)
{
	if ($device>0) return "Мобильное устр-во"; else return "Компьютер";
}

public function device_icon($device)
{
	if ($device>0) return "📱"; else return "💻";
}

public function bots($file)
 {
	$bots_file = file($file);
	$bots="";
	foreach ($bots_file as $key => $value) 
		$bots.="(".preg_replace('/\r\n|\r|\n/u', '', $value).")|";
	 $bot=substr($bots, 0, -1);
	
	 return $bot;
 }

public  function getOS($userAgent) {
	$bot=func::bots($_SERVER['DOCUMENT_ROOT'].'/dat/bots.dat');
    $oses = array (
        // Mircrosoft Windows Operating Systems
'Windows 3.11' => '(Win16)',
'Windows 95' => '(Windows 95)|(Win95)|(Windows_95)',
'Windows 98' => '(Windows 98)|(Win98)',
'Windows 2000' => '(Windows NT 5.0)|(Windows 2000)',
'Windows 2000 Service Pack 1' => '(Windows NT 5.01)',
'Windows NT 4.0' => '(Windows NT 4.0)|(WinNT4.0)|(WinNT)',
'Windows ME' => '(Windows ME)|(Windows 98; Win 9x 4.90 )',
'Windows CE' => '(Windows CE)',
'Windows XP' => '(Windows NT 5.1)|(Windows XP)',
'Windows XP 64-bit Edition' => '(Windows NT 5.2)',
'Windows Vista' => '(Windows NT 6.0)|(Windows Vista)',
'Windows 7' => '(Windows NT 6.1)|(Windows 7)',
'Windows 8' => '(Windows NT 6.2)|(Windows 8)',
'Windows 8.1'=> '(Windows NT 6.3)|(Windows 8.1)',
'Windows 10' => '(Windows NT 10.0)',

// UNIX Like Operating Systems
'Mac OS X Kodiak (beta)' => '(Mac OS X beta)',
'Mac OS X Cheetah' => '(Mac OS X 10.0)',
'Mac OS X Puma' => '(Mac OS X 10.1)',
'Mac OS X Jaguar' => '(Mac OS X 10.2)',
'Mac OS X Panther' => '(Mac OS X 10.3)',
'Mac OS X Tiger' => '(Mac OS X 10.4)',
'Mac OS X Leopard' => '(Mac OS X 10.5)',
'Mac OS X Snow Leopard' => '(Mac OS X 10.6)',
'Mac OS X Lion' => '(Mac OS X 10.7)',
'Mac OS X' => '(Mac OS X)',
'Mac OS' => '(Mac_PowerPC)|(PowerPC)|(Macintosh)',
'Open BSD' => '(OpenBSD)',
'SunOS' => '(SunOS)',
'Solaris 11' => '(Solaris\/11)|(Solaris11)',
'Solaris 10' => '((Solaris\/10)|(Solaris10))',
'Solaris 9' => '((Solaris\/9)|(Solaris9))',
'CentOS' => '(CentOS)',
'QNX' => '(QNX)',
// Kernels
'UNIX' => '(UNIX)',
// Linux Operating Systems
'Ubuntu 12.10' => '(Ubuntu\/12.10)|(Ubuntu 12.10)',
'Ubuntu 12.04 LTS' => '(Ubuntu\/12.04)|(Ubuntu 12.04)',
'Ubuntu 11.10' => '(Ubuntu\/11.10)|(Ubuntu 11.10)',
'Ubuntu 11.04' => '(Ubuntu\/11.04)|(Ubuntu 11.04)',
'Ubuntu 10.10' => '(Ubuntu\/10.10)|(Ubuntu 10.10)',
'Ubuntu 10.04 LTS' => '(Ubuntu\/10.04)|(Ubuntu 10.04)',
'Ubuntu 9.10' => '(Ubuntu\/9.10)|(Ubuntu 9.10)',
'Ubuntu 9.04' => '(Ubuntu\/9.04)|(Ubuntu 9.04)',
'Ubuntu 8.10' => '(Ubuntu\/8.10)|(Ubuntu 8.10)',
'Ubuntu 8.04 LTS' => '(Ubuntu\/8.04)|(Ubuntu 8.04)',
'Ubuntu 6.06 LTS' => '(Ubuntu\/6.06)|(Ubuntu 6.06)',
'Red Hat Linux' => '(Red Hat)',
'Red Hat Enterprise Linux' => '(Red Hat Enterprise)',
'Fedora 17' => '(Fedora\/17)|(Fedora 17)',
'Fedora 16' => '(Fedora\/16)|(Fedora 16)',
'Fedora 15' => '(Fedora\/15)|(Fedora 15)',
'Fedora 14' => '(Fedora\/14)|(Fedora 14)',
'Chromium OS' => '(ChromiumOS)',
'Google Chrome OS' => '(ChromeOS)',
// Kernel
'Linux' => '(Linux)|(X11)',
// BSD Operating Systems
'OpenBSD' => '(OpenBSD)',
'FreeBSD' => '(FreeBSD)',
'NetBSD' => '(NetBSD)',
// Mobile Devices
'Android' => '(Android)',
'iPod' => '(iPod)',
'iPhone' => '(iPhone)',
'iPad' => '(iPad)',
//DEC Operating Systems
'OS/8' => '(OS/8)|(OS8)',
'Older DEC OS' => '(DEC)|(RSTS)|(RSTS\/E)',
'WPS-8' => '(WPS-8)|(WPS8)',
// BeOS Like Operating Systems
'BeOS' => '(BeOS)|(BeOS r5)',
'BeIA' => '(BeIA)',
// OS/2 Operating Systems
'OS/2 2.0' => '(OS\/220)|(OS\/2 2.0)',
'OS/2' => '(OS\/2)|(OS2)',
// Search engines
'Search engine or robot' => $bot
    );

	
	
    foreach($oses as $os=>$pattern){
			//echo "/{$pattern}/i";
        if(preg_match("~{$pattern}~i", $userAgent)) { 
	
            return $os;
        }
    }
    return 'Unknown'; 
}


public function LogoOs($os)
{
	$oses=array(
	 "windows" => "win",
	 "linux" => "lin",
	 "Ubuntu" => "lin",
	 "Fedora" => "lin",
	 "mac" => "mac",
	 "iPod" => "mac",
	 "iPhone" => "mac",
	 "iPhone" => "mac",
	 "iPad"  => "mac",
	);
}



public function tabgeo_country_v4($ip){
/******************************************************************************
 * Использование:
 * <?
 *  include("tabgeo_country_v4.php");
 *  $ip = $_SERVER['REMOTE_ADDR'];
 *  $country_code = tabgeo_country_v4($ip);
 * ?>
 *
 ******************************************************************************/
    $fh = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR . '../dat/tabgeo_country_v4.dat', 'rb');

    $iso = array('AD', 'AE', 'AF', 'AG', 'AI', 'AL', 'AM', 'AO', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ',
                 'BA', 'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS',
                 'BT', 'BV', 'BW', 'BY', 'BZ', 'CA', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN',
                 'CO', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EE',
                 'EG', 'EH', 'ER', 'ES', 'ET', 'FI', 'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF',
                 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GQ', 'GR', 'GS', 'GT', 'GU', 'GW', 'GY', 'HK', 'HM',
                 'HN', 'HR', 'HT', 'HU', 'ID', 'IE', 'IL', 'IM', 'IN', 'IO', 'IQ', 'IR', 'IS', 'IT', 'JE', 'JM',
                 'JO', 'JP', 'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY', 'KZ', 'LA', 'LB', 'LC',
                 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK',
                 'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA',
                 'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA', 'PE', 'PF', 'PG',
                 'PH', 'PK', 'PL', 'PM', 'PN', 'PR', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW',
                 'SA', 'SB', 'SC', 'SD', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS',
                 'ST', 'SV', 'SX', 'SY', 'SZ', 'TC', 'TD', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO',
                 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG', 'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VE', 'VG', 'VI',
                 'VN', 'VU', 'WF', 'WS', 'YE', 'YT', 'ZA', 'ZM', 'ZW', 'XA', 'YU', 'CS', 'AN', 'AA', 'EU', 'AP',
    );

	if (!function_exists('tabgeo_bs')) {
		function tabgeo_bs($data_array, $ip, $step){
			$start = 0;
			$end   = count($data_array) - 1;

			while (true) {
				$mid    = floor(($start + $end) / 2);
				$unpack = $step ? unpack('Noffset/Cip/Ccc_id', "\x00$data_array[$mid]") : unpack('Cip/Ccc_id', $data_array[$mid]);

				if ($unpack['ip'] == $ip) return $unpack;
				if ($end - $start  <   0) return $ip > $unpack['ip'] ? $unpack : $unpack_prev;
				if ($unpack['ip']  > $ip) $end = $mid - 1; else $start = $mid + 1;

				$unpack_prev = $unpack;
			}
		}
	}

    $ip_array = explode('.', $ip);

    fseek($fh, ($ip_array[0] * 256 + $ip_array[1]) * 4);
    $index_bin = fread($fh, 4);
    $index = unpack('Noffset/Clength', "\x00$index_bin");
    if($index['offset'] == 16777215) return $iso[$index['length']];

    fseek($fh, $index['offset'] * 5 + 262144);
    $bin = fread($fh, ($index['length'] + 1) * 5);
    $d = tabgeo_bs(str_split($bin, 5), $ip_array[2], TRUE);
    if($d['offset'] == 16777215) return $iso[$d['cc_id']];

    if($ip_array[2] > $d['ip']) $ip_array[3] = 255;
    fseek($fh, -(($d['offset'] + 1 + $d['cc_id']) * 2), SEEK_END);
    $bin = fread($fh, ($d['cc_id'] + 1) * 2);
    $d = tabgeo_bs(str_split($bin, 2), $ip_array[3], FALSE);
    return $iso[$d['cc_id']];
}


public function GetRealIp() { // Определяем ральный IP
 if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
   $ip=$_SERVER['HTTP_CLIENT_IP'];
 } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 } else {
   $ip=$_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}

public function device($device, $agent)
{
	$device_array['device']=func::device_name($device);
	$device_array['os']=func::getOS($agent);
	$device_array['browser']=func::user_browser($agent);
	return $device_array;
	
}

public function isProxy($serv_array){ // Определяем прокси
        $proxy_headers = array(
            'HTTP_VIA',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_FORWARDED',
            'HTTP_CLIENT_IP',
            'HTTP_FORWARDED_FOR_IP',
            'VIA',
            'X_FORWARDED_FOR',
            'FORWARDED_FOR',
            'X_FORWARDED',
            'FORWARDED',
            'CLIENT_IP',
            'FORWARDED_FOR_IP',
            'HTTP_PROXY_CONNECTION'
        );
        foreach($proxy_headers as $x){
            if (isset($serv_array[$x])){
                return true;
            }
        }
        return false;    
    }



	
}
 

?>