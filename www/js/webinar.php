<? session_start(); require_once ('../config.php');
require_once (CLASS_PATH.'/db.class.php'); 
$db_result=db::connect_db(DB_HOST,DB_NAME,DB_LOGIN,DB_PASS);
require_once ('../define.php');
require_once ('../include/lang.php');
?>
deleteCookie('yt');deleteCookie('end');
$('#people').on('click', function() { $('#chatframe iframe')[0].src='include/uch.php';$('#och').removeClass('active');$('#uch').addClass('active');$('#tchat').prop('disabled',true);$('#bchat').prop('disabled',true);$('#pchat').addClass('hidden');$('#pchat_u').removeClass('hidden');});
	$('#chat').on('click', function() {	
		$.post('include/numchat.dat', function(data) {
		$('#chatframe iframe')[0].src='include/chat.php#'+data;
		});
	
	$('#uch').removeClass('active'); $('#och').addClass('active'); $('#tchat').prop('disabled',false); $('#bchat').prop('disabled',false); $('#pchat').removeClass('hidden');$('#pchat_u').addClass('hidden');});
	
		setInterval(function () {
			var t1 = Date.parse('<?= TIME_COUNTER_BEGIN ?>') - Date.parse(new Date());
			var t2 = Date.parse('<?= TIME_COUNTER_END ?>') - Date.parse(new Date());
			//alert(t1);
			if (($("#tchat").attr("disabled")!='disabled') && (t2>0) && (t1<=0))
			{
				$.post('include/numchat.dat', function(data) {
					var src_frame='include/chat.php?sendid='+data; //#'+data;
				//	alert(src_frame);
					$('#chatframe iframe').attr('src', src_frame);
					//$('#chatframe iframe')[0].src=src_frame;
				});
			//$('#chatframe iframe').attr('src', 'include/chat.php#');
			
			$.post('include/counter.dat', function(data2) {
					//alert(data2);
					//$('#wcu').text=data2;
					document.getElementById("wcu").innerHTML = data2;
				});
			}
			
			
		}, <?= SETINTERVAL ?>);
		
		setInterval(function () {
				var dp = Date.parse(new Date());
				var t1 = Date.parse('<?= TIME_COUNTER_BEGIN ?>') - dp;
				var t2 = Date.parse('<?= TIME_COUNTER_END ?>') - dp;
//alert(t1+' ~ '+t2);
			   if ((t1<=0) && (t2>0)) {
						   if (getCookie('yt')==undefined){
							$.post('include/webinar.php', function(data) {
							setCookie('yt', dp);
							$('#webinar iframe')[0].src=data;
							$('#tchat').prop('disabled',false);
							$('#tchat').prop('placeholder','<?= $lang[LANG]['mess'] ?>');
							$('#bchat').prop('disabled',false);
						});
				   }
						} else { 
							if (t2<0) { //alert(t1+' ~ '+t2);
									if (getCookie('end')==undefined){
									setCookie('end', dp);
									deleteCookie('yt');
									$('#webinar iframe')[0].src='include/theend.php';
									$('#tchat').prop('disabled',true);
									$('#tchat').prop('placeholder','<?= $lang[LANG]['block'] ?>');
									$('#bchat').prop('disabled',true);
									
									}
							}
						}
			}, 1000);