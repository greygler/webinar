<? session_start();require_once ('../config.php');
require_once ('../define.php');
require_once ('../include/lang.php');
?>
function getTimeRemaining(endtime){
		  var t = Date.parse(endtime) - Date.parse(new Date());
		  var seconds = Math.floor( (t/1000) % 60 );
		  var minutes = Math.floor( (t/1000/60) % 60 );
		  var hours = Math.floor( (t/(1000*60*60)) % 24 );
		  var days = Math.floor( t/(1000*60*60*24) );
		  return {
		   'total': t,
		   'days': days,
		   'hours': hours,
		   'minutes': minutes,
		   'seconds': seconds
		  };
		}
		
		function LdgZero(n) {
			return "0".substring(n >= 10) + n;
}
		
		function initializeClock(id, begintime, endtime){
  var clock = document.getElementById(id);
  var timeinterval1 = setInterval(function(){
   var t1 = getTimeRemaining(begintime);
   var t2 = getTimeRemaining(endtime);
 //  clock.innerHTML = 'days: ' + t.days + ' ' + 'hours: '+ t.hours + ' ' + 'minutes: ' + t.minutes + ' ' + 'seconds: ' + t.seconds;
   clock.innerHTML = ' ' + LdgZero(t1.hours) + ':' + LdgZero(t1.minutes) + ':' + LdgZero(t1.seconds);
   if ((t1.total<=0) && (t2.total>0)){ //clearInterval(timeinterval1); 
	
	if (t1.total<=0) { 
    document.getElementById('help-clock').innerHTML = '<?= $lang[LANG]['help-clock1'] ?>'; }
	
   } 
   else 
	   if (t2.total<0) { 
    document.getElementById('uch').innerHTML = '<?= $lang[LANG]['uch_no'] ?>'; 
    document.getElementById('help-clock').innerHTML = '<?= $lang[LANG]['help-clock2'] ?>'; 
    document.getElementById('button').innerHTML = '<?= $lang[LANG]['button'] ?>'; 
	button.setAttribute('disabled', true); 
	input_name.setAttribute('disabled', true); 
	input_email.setAttribute('disabled', true); 

	
	}
   
   
   },1000); 
}