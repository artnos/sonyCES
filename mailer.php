<?php
//sendEmailComfirm('artnos@gmail.com,art.siriamonthep@carluccidesign.com','name');
function sendEmailComfirm($email,$name,$dateFormatted ){
//$to      = 'art.siriamonthep@carluccidesign.com';
$dateOptions = ' http://162.242.222.233/imgDates/blank.jpg';

if ($dateFormatted != ''){
	/*
$dateFormatted = date("l, M j \a\\t g:i a", strtotime($dateFormatted )      );
$dateFormatted = str_replace('am','a.m.', $dateFormatted);
$dateFormatted = str_replace('pm','p.m.', $dateFormatted);

$dateOptions ='You have schedule a booth tour appointment on<br/>'.
$dateFormatted ;
*/
$dateOptions = ' http://162.242.222.233/imgDates/'.$dateFormatted;

} 
		 
$to = $email;
$subject = 'Sony CES 2014 Comfirmation';
$message = '<html>
<style>
@font-face {
    font-family: myFont;
    src: local(ITCAvantGardeStd-Bk), url(\' http://162.242.222.233/font/ITCAvantGardeStd-Bk.otf\') format(\'opentype\');
}

@font-face {
    font-family: myFontBold;
    src: local(ITCAvantGardeStd-Demi), url(\' http://162.242.222.233/font/ITCAvantGardeStd-Demi.otf\') format(\'opentype\');
}
</style>
<body style="color:000001"> 
<table border="0" cellpadding="0" cellspacing="0">
<tr>
    <td>
    <table  border="0" cellpadding="0" cellspacing="0">
    <tr><td><img style="display: block;" style="display:block; margin:0px; padding:0px;"  src=" http://162.242.222.233/slice/01.jpg" alt="Sony CES 2014 International"/></td></tr>
    </table>
    </td>
</tr>
<tr>
    <td>
    <table border="0" cellpadding="0" cellspacing="0">
    <tr><td><img style="display: block;" style="display:block; margin:0px; padding:0px;"  src=" http://162.242.222.233/slice/02.jpg"/></td>
    <td style="font-family:myFont,CenturyGothic, AppleGothic; padding-left:10px; padding-top:11px; font-size:42px; font-family:\'myFontBold\'"><strong>'. $name .'</strong></td></tr>
    </table>
    </td>
</tr>
<tr><td><img style="display: block;" style="display:block; margin:0px; padding:0px;"  src=" http://162.242.222.233/slice/04.jpg"/></td></tr>
<tr>
	<td>
    <table border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td>
	<img style="display: block;" src="'.$dateOptions .'"/>
	</td>
    <td><img style="display: block;" src=" http://162.242.222.233/slice/08.jpg"/></td>				
    </tr>
    </table>
    </td>
</tr>
<tr><td><img style="display: block;" src=" http://162.242.222.233/slice/09.jpg"/></td></tr>
<tr>
<td>
    <table border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td><img style="display: block;" src=" http://162.242.222.233/slice/11.jpg"/></td>
    <td><a href="mailto:Ana.Reyes&#64;am.sony.com"><img style="display: block;" src=" http://162.242.222.233/slice/12.jpg"/></a></td>
    <td><img style="display: block;" src=" http://162.242.222.233/slice/13.jpg"/></td>
    <td><a href="mailto:Jade.Mendoza&#64;am.sony.com"><img style="display: block;" src=" http://162.242.222.233/slice/14.jpg"/></a></td>
    <td><img style="display: block;" src=" http://162.242.222.233/slice/15.jpg"/></td>
    </tr>
    </table>
</td>
</tr>
<tr><td><img style="display: block;" src=" http://162.242.222.233/slice/16.jpg"/></td></tr>
<tr>
    <table border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td ><img style="display: block;"      src=" http://162.242.222.233/slice/17.jpg"/>
	</td>
	
    <td ><a href="http://www.youtube.com/sonyelectronics"><img style="display: block;" src=" http://162.242.222.233/slice/18.jpg" alt="YouTube"/></a></td>
	
    <td ><a href="http://instagram.com/sony/"><img style="display: block;" src=" http://162.242.222.233/slice/19.jpg" alt="instagram"/></a></td>
	
    <td ><a href="http://www.pinterest.com/sonyelectronics/"><img style="display: block;" src=" http://162.242.222.233/slice/20.jpg" alt="pininterests"/></a></td>
	
    <td ><a href="https://www.facebook.com/Sony"><img style="display: block;" src=" http://162.242.222.233/slice/21.jpg" alt="facebook"/></a></td>
	
    <td><a href="https://twitter.com/sonyelectronics"><img style="display: block;" src=" http://162.242.222.233/slice/22.jpg" alt="sony electronics"/></a></td>
    <td ><a href="http://blog.sony.com">
	<img style="display: block;" src=" http://162.242.222.233/slice/23.jpg"/></a>
	</td>
    </tr>
    </table>
</tr>
<tr><td><img style="display: block;" src=" http://162.242.222.233/slice/24.jpg"/></td></tr>
</table>
</body>
</html>';




//$sender = $_POST['req-email']; 
$sender = 'Ana.Reyes@am.sony.com';
	
$headers = "From: " . strip_tags($sender) . "\r\n";
$headers .= "Reply-To: ". strip_tags($sender) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();;

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");

// Send

@mail($to, $subject, $message, $headers);
}
sendEmailComfirm('Art','art.siriamonthep@carluccidesign.com','Tuesday, January 8, 2014, 4:00 PM' )
?>