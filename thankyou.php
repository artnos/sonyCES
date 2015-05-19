<?php

unset($_REQUEST['fName']);
unset($_REQUEST['lName']);
unset($_REQUEST['eMail']);
unset($_REQUEST['telephone']);
unset($_REQUEST['outlet']);
unset($_REQUEST['comfirm']);
unset($_REQUEST['time']);
unset($_REQUEST['day']);

/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // …
} else {
		header('Location: register.php');
		exit;	
}
*/
?><!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thank You Page Demo</title>
<link href="css/index.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">

// #############################################
(function($) {
	$(document).ready(function() {
		window.pulse_image = $('#customBG');
		window.pulse_continue_loop = true;
		PulseAnimation();

		$( "#whereWhen, #contact, #stayConnected" ).hide();
		$('#header span:first-child').animate({
			opacity: 1,
			left: "0",
		  }, 500);
		  
		 $('#header span:nth-child(2)').animate({
			opacity: 1,
			left: "0",
		  }, 750);
		  
		 $('#header span:nth-child(3)').animate({
			opacity: 1,
			left: "0",
		  }, 1000, function(){
			  
			var staggerTime = 0;
			$("#whereWhen").fadeIn(staggerTime+ 1000)				
			$("#contact").fadeIn(staggerTime+ 1500)				
			$("#stayConnected").fadeIn(staggerTime+ 1750)	
			  
		  });
			  
		
	});
})(jQuery);

// #############################################
function PulseAnimation()
{
	var minOpacity = .50;
	var fadeOutDuration = 5650;
	var fadeInDuration = 5650;
	
	window.pulse_image.animate({
		opacity: minOpacity
	}, fadeOutDuration, function() {
		window.pulse_image.animate({
			opacity: 1
		}, fadeInDuration, function() {
			if(window.pulse_continue_loop) {
				PulseAnimation();
			}
		})
	});
}


</script>
 <!--[if IE]>
<link href="css/all-ie-only.css" rel="stylesheet" type="text/css">
<![endif]-->
</head>
<body>
<div id="customBG"></div>
<div id="container">

<div><img src="img/logo_sony.jpg" /><img style="padding-left:50px;" src="img/logo_ces.jpg" /></div>
<div id="header">
<span>Thank you for registering to attend</span>
<span class="bold">Sony's Press Conference</span>
<span class="blue">at CES 2014</span>
</div>

<div id="whereWhen" style="height:90px; margin-top:40px; font-size:16px;">
    <span style=" width:260px;">
    <span class="header">Where</span>
    Las Vegas Convention Center<br/>
    Sony Booth 14200<br/>
    Central Hall, LVCC<br/>
    </span>
    <span style=" width:400px;">
    <span class="header">When</span>
    Monday January 6, 2014 <br/>
    Doors open at 4:30 p.m. <br/>
	Event starts at 5 p.m.<br/>
    </span>
</div>
<div id="contact">
    <span class="block" style="margin-top:40px;">
    For more information please contact:
    </span>
    <table cellpadding="0" cellspacing="0" border="0" class="bold">
    <tr>
	<td width="250">Ana Reyes</td>
    <td width="280">Jade Mai Mendoza</td>		    
    </tr>
    <tr>
    <td><a href="mailto:Ana.Reyes&#64;am.sony.com">Ana.Reyes@am.sony.com</a></td>	    
    <td><a href="mailto:Jade.Mendoza&#64;am.sony.com">Jade.Mendoza@am.sony.com</a></td>
    </tr>
    </table>
</div>
<footer>

<div id="stayConnected">
<img src="img/stay_connected.jpg" class="first" />
<a href="http://www.youtube.com/sonyelectronics" ><img src="img/youtube.png" alt="You Tube"></a>
<a href="http://instagram.com/sony/"><img src="img/instagram.png"  alt="instagram"></a>
<a href="http://www.pinterest.com/sonyelectronics/"><img src="img/pinterest.png"  alt="Pininterest"></a>
<a href="https://www.facebook.com/Sony"><img src="img/facebook.png"  alt="Facebook"></a>
<a href="https://twitter.com/sonyelectronics" class="last"><img src="img/twitter.png"  alt="Twitter"></a>
<a href="http://blog.sony.com/"><img src="img/sony_electronic_blog.png" class="last"></a>
</div>

</footer>
    

</div>
</body>
</html>