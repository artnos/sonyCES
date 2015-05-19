<?php
sendEmailComfirm('artnos@gmail.com,art.siriamonthep@carluccidesign.com','name');

function sendEmailComfirm($email,$name ){
//$to      = 'art.siriamonthep@carluccidesign.com';
$to = $email;
$subject = 'Sony CES 2014 Comfirmation';
$message = '<html>
<style>
@font-face {
    font-family: myFont;
    src: local(ITCAvantGardeStd-Bk), url(\'font/ITCAvantGardeStd-Bk.otf\') format(\'opentype\');
}

@font-face {
    font-family: myFontBold;
    src: local(ITCAvantGardeStd-Demi), url(\'font/ITCAvantGardeStd-Demi.otf\') format(\'opentype\');
}
</style>
<body style="color:#000001; font-family: \'myFont\', sans-serif;"> 


<div style="
background-image:url(http://162.209.117.184/sony/imgMail/mailBG.jpg); 
background-repeat:no-repeat; 
margin-left:auto; 
margin-right:auto;
width:660px;
height:800px;
padding-top:50px;
padding-left:50px;
color:#5a5a5a;
font-size:15px;

 
">
<img src="http://162.209.117.184/sony/imgMail/logo_sony.jpg" alt="sony"/>
<img style="padding-left:50px;" src="http://162.209.117.184/sony/imgMail/logo_ces.jpg" alt="CES 2014"/>
<br/><br/>

<span style="font-size:40px; font-weight:300; color:#000001; ">
Thank you <span style="font-family:\'myFontBold\'">'  . $name .'</span><br/>
for registering to attend<br/>
<span style="font-family:\'myFontBold\'">Sony\'s Press Conference</span><br/>
<span style="color: #00A5DB;">at CES 2014</span><br/>
</span>

<div style="height:90px; margin-top:40px; ">
    <span style="float:left; width:260px;">
    <span style="font-family:\'myFontBold\'; display:block; margin-bottom:5px;">Where</span>
    Las Vegas Convention Center<br/>
    Sony Booth 14200<br/>
    Central Hall, LVCC<br/>
    </span>
    <span style="float:left; width:200px;">
    <span style="font-family:\'myFontBold\'; display:block; margin-bottom:5px;">When</span>
    Monday January 6, 2014
    5:00 PM
    </span>
</div>
<div style="margin-top:15px;">
    <span>For more information please contact:</span>
    <div style="margin-top:6px; font-size:14px; font-family:\'myFontBold\'">
    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
        <td width="250">Ana Reyes</td>
        <td width="280">Jade Mendoza</td>	    
        </tr>
        <tr>
        <td><a style="color:#00A5DB;" href="mailto:Ana.Reyes&#64;am.sony.com">Ana.Reyes@am.sony.com</a></td>	    
        <td><a style="color:#00A5DB;" href="mailto:Jade.Mendoza&#64;am.sony.com">Jade.Mendoza@am.sony.com</a></td>
        </tr>
    </table>
    </div>
</div>
<br/>
<div style="margin-top:80px;">

<span style="padding-bottom:5px; margin-top:6px; float:left;" >Stay Connected</span>
<a style="padding-left:10px;" 
href="http://www.youtube.com/sonyelectronics"><img src="http://162.209.117.184/sony/imgMail/youtube.jpg" alt="You Tube"></a>
<a style="padding-left:10px;" 
href="http://www.pinterest.com/sonyelectronics/"><img src="http://162.209.117.184/sony/imgMail/pinterest.jpg" alt="Pininterest"></a>
<a style="padding-left:10px;" 
href="https://www.facebook.com/Sony"><img src="http://162.209.117.184/sony/imgMail/facebook.jpg" alt="Facebook"></a>
<a style="padding-left:10px;" 
href="https://twitter.com/sonyelectronics"><img src="http://162.209.117.184/sony/imgMail/twitter.jpg" alt="Twitter"></a>
<a style="padding-left:10px;" 
href=""><img src="http://162.209.117.184/sony/imgMail/sony_electronic_blog.png"></a>
</div>
</div>

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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Mail Me</title>
</head>
<body>
mail sent
</body>
</html>