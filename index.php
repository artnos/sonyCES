<?php
  	//session_start();
	include 'connectToDB.php';
	include 'mailer.php';
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	 $pageValid = false;
	}; //<!-
	
	//Extracting the data
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	 $pageValid = true;
	 
	
	}; //<!-- end of ($_SERVER['REQUEST_METHOD'] == 'POST')
	
	$c = "checked=\"checked\"";
  	$s = "selected = \"selected\"";
  	$redStyle = "<span style=\"color:red;\">*</span>";
  	$redStyle2 = 'style="border:solid 2px red;"';
	//validate firstName
	if (isset($_REQUEST['fName']) )	{	
		$fName =$_REQUEST['fName'];
		$fName = pregSS ($fName);
		if ($fName == '' || preg_match('/^[a-zA-Z]{2,}$/',$fName) == false)	{
			$pageValid = false;
			$fNameError = $redStyle;
		}
	} else { $pageValid = false;};
	
	
	//validate lastName
	if (isset($_REQUEST['lName'] ) )	{
		$lName =$_REQUEST['lName'] ;
		pregSS ($lName);
		if ($lName == '' || preg_match('/^[a-zA-Z]{2,}$/',$lName) == false) 		{
			$pageValid = false;
			$lNameError = $redStyle;
		}
	} else { $pageValid = false;};


	//validate email
	if (isset($_REQUEST['eMail']) )
	{	
		$eMail =$_REQUEST['eMail'];
		$eMail = strtolower($eMail);
		pregSS ($eMail);
		
		if ($eMail == '' || preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$eMail) == false) 
			{
				$pageValid = false;
				$eMailError = $redStyle;
			} 
		
		//check for duplicate email
		$data = $mysqli -> prepare("SELECT eMail FROM  `registration` ORDER BY ID") or die(mysqli_error());		  
		$data-> execute();
		$data-> bind_result($eMailCheck);
		
		while($data->fetch()){
			if ($eMail == $eMailCheck)
			{
			$pageValid = false; //change to false to validate dup emails
			$eMailError = $redStyle2;
			$eMailDup = 'This email was already registered';
			break;
			}
		}
		/* close statement */
    	$data->close();
		
		
		
			
	} else { $pageValid = false;};

	//validate telephone
	if (isset($_REQUEST['telephone']) )
	{	
		$telephone =$_REQUEST['telephone'];
		pregSS ($telephone);
	} else { $pageValid = false;};
	
	//validate outlet
	if (isset ($_REQUEST['outlet']) ) {
		$outlet =$_REQUEST['outlet'];
		pregSS ($outlet);
	}  else {$outlet = '';}
	
	//validate outlet
	if (isset ($_REQUEST['comfirm']) )	 {	
		 	$comfirm = $c;
			$comfirmation = 'yes';
	 } else {
		 	$comfirm = '';
			$comfirmation = 'no';		 
	 }
	 
	 
	if (isset ($_REQUEST['time'])){
		$preferTime =$_REQUEST['time'];
		switch ($preferTime) {
			case '9:00am': $am900 = $s;	break;
		}
		
	} else {
		$preferTime = '';	
	}
	
	//validate day
	if (isset ($_REQUEST['day']) ) {	
		$day = $_REQUEST['day'];
		switch ($day) {
			case 'January 7th 2014': $jan7 = $c;	break;
			case 'January 8th 2014': $jan8 = $c;	break;
			case 'January 9th 2014': $jan9 = $c;	break;
			case 'January 10th 2014': $jan10 = $c;	break;
		}
	} else {
		$day = '' ;
	}
	
	if ( $day != '' && $preferTime != ''){
		$day = $_REQUEST['day'];
		$preferTime =$_REQUEST['time'];
		//"Y-m-d H:i:s" //time code //2014-01-08 09:00
		//"F j, Y, g:i a"
		$dateFormatted = date("Y-m-d H:i", strtotime($day .' '. $preferTime )      );
		$dateJpg = date("d_hia", strtotime($day .' '. $preferTime )      );
		$dateJpg = $dateJpg . '.jpg';
	} else {
		$comfirmation = 'no';	
		$dateFormatted = '';
		$dateJpg = '';
	}
	
	
	//clean the text
	function pregSS ($SS)	{ 	
	$SS = htmlentities(trim($SS)); 	
	$SS = preg_replace('/\s+/', ' ', $SS);
	
	return $SS;	
	
	};
	
	
//redirect
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if ($pageValid  == true){
		
		$lName = ucfirst($lName);	
		$fName = ucfirst($fName);	

		$stmt = $dbh->prepare("INSERT INTO `registration`  (`id`, `firstName`, `lastName`, `eMail`, `telephone`, `outlet`, `comfirm`, `boothTour`)  VALUES (
		:id,
		:firstName, 
		:lastName,
		:eMail,
		:telephone,
		:outlet,
		:comfirm,
		:boothTour
		)");
		
		$id = NULL;
		$stmt->bindParam(':id', $id );
		$stmt->bindParam(':firstName', $fName);
		$stmt->bindParam(':lastName',$lName);
		$stmt->bindParam(':eMail', $eMail);
		$stmt->bindParam(':telephone', $telephone);
		$stmt->bindParam(':outlet', $outlet);	
		$stmt->bindParam(':comfirm',$comfirmation);
		$stmt->bindParam(':boothTour', $dateFormatted);
		//you may change values and do multiple insert/execute
		//example $name = 'two'; then execute();
		
		$stmt->execute();
		//var_dump($stmt->ErrorInfo());
	
		
		$log = 'firstname: ' . $fName . '<br/>lastname: '. $lName . '<br/>email: '. $eMail . '<br/>telephone: '.	$telephone . '<br/>outlet: '. $outlet . '<br/>comfirm '. $comfirmation . '<br/>prefertime: '. $preferTime . '<br/>day: '. $day . '<br/>$dateFormatted: ' . $dateFormatted .'   thank you for submitting  ';
		
		//$log = $myQuery;
		
		//just to comfirm page that sends email
		sendEmailComfirm($eMail,$fName,$dateJpg);
		header('Location: thankyou.php');
		exit;
		
		} else 	{  
		//if page is not valid redirect come back here
		//header('Location: register.php');
		//exit;
		};
} //<!--End of ($_SERVER['REQUEST_METHOD'] == 'POST')


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sony Electronics CES 2014 Registration</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href="css/index.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/index.css" rel="stylesheet" type="text/css">

<script src="js/index.js"></script>
<script>
$(document).ready(function() {
		<?php 
		//validate outlet
		if (isset ($_REQUEST['comfirm']) )	 {	
			  if($comfirmation != 'yes') {  echo 'comfirmOff();';	  }
		 } else {  echo 'comfirmOff();'; }
		?>
</script>
<!--[if lt IE 9]> 
 <script> document.createElement("stack"); </script>
 <![endif]-->
 <!--[if IE]>
<link href="css/all-ie-only.css" rel="stylesheet" type="text/css">
<![endif]-->
</head>

<body>
<div id="white"></div>
<div id="customBG"></div>
<div id="container">
<?php // if(	$pageValid == true || $_SERVER['REQUEST_METHOD'] == 'POST'){ echo '<p>'. $log.'</p>';} ?>

<div><img src="img/logo_sony.jpg" /><img style="padding-left:50px;" src="img/logo_ces.jpg" /></div>

<div id="header">
<span>You are invited to</span>
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
<div id="form" class="small ">
<form id="form1" name="form1"  method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<div class="col rightBorder">
        
            <div style="font-size:14px;">
			Space is limited: RSVP now by completing the form on the 
            right and pressing the submit button.
            </div>
            
            <div>
            <strong class="block bold blue pad10">Confirmation</strong>
            <input type="checkbox" name="comfirm" <?php print  $comfirm ?> value="yes"/>
            <label for="comfirm">Check here if you want a booth tour</label>
            
            </div>
            
            <div id="schedule">
            <strong class="block bold blue pad10 pad5b">Schedule a Sony booth tour</strong>

            <div class="col bold">
             
            <span class="block ">
            <input type="radio" name="day"<?php print $jan7 ?> value="January 7th 2014"> Tuesday, January 7th 2014 
            </span>
            
            <span class="block">
            <input type="radio" name="day" <?php print $jan8 ?> value="January 8th 2014"> Wednesday, January 8th 2014  
            </span>
            
            <span class="block">
            <input type="radio" name="day" <?php print $jan9 ?> value="January 9th 2014"> Thursday, January 9th 2014 
            </span>
            
            <span class="block">
            <input type="radio" name="day" <?php print $jan10 ?> value="January 10th 2014"> Friday, January 10th 2014 
            </span>
            </div>
             
            <div class="bold colLast">
            <label for="preferTime">Please enter your<br/> preferred time:</label>
            <br/>
            <select name="time" size="1" id="time">
            <option value="none" <?php print $none ?>></option>
            </select>
            </div>
            </div>
            <div id="log2"></div>

</div><!-- end of col-->
<div class="col50last">
        <div class="block bold">Attendee Information</div>
        <table cellpadding="0" cellspacing="0" border="0">
        <tr>
        <td width="250"><label for="firstName">First Name: <span class="red">*</span></label></td>
        <td width="280"><label for="lastName">Last Name: <span class="red">*</span></label></td>
        </tr>
        <tr>
        <td>
        <input name="fName" type="text" id="register" 
        value="<?php print $fName; ?>" size="35" maxlength="50" /> 
         <?php print $fNameError;?>          
        </td>
        <td>
        <input name="lName" type="text" id="register" 
        value="<?php print  $lName; ?>" size="25" maxlength="50" />
        <?php print $lNameError;?>        
        </td>
        </tr>
        
        <tr>
        <td><label for="eMail">E-Mail: <span class="red">*</span></label></td>
		<td><label for="telephone">Telephone: <span class="red">*</span></label></td>        
        </tr>
        <tr>
        <td>
        <input <?php echo $eMailError; ?> name="eMail" type="text" id="register"  
        value="<?php print $eMail;?>" size="25" maxlength="50" />
         <?php print $eMailError;?>         
        </td>
        <td>
        <input name="telephone" type="text" id="telephone"  
        value="<?php print  $telephone;?>" size="25" maxlength="50" /> 
         <?php print $telephoneError;?>         
        </td>
        </tr>
        
        <tr>
        <td><label for="outlet">Outlet:  <span class="red">*</span></label></td>
        <td></td>
        </tr>
         </table>
        
      <div>  
      
      <div class="col" style="width:185px;">
      <input name="outlet" type="text" id="outlet"  
        value="<?php print  $outlet ?>" size="25" maxlength="50" />
         <?php print $outletError;?>  
         </div>       
       
        <div id="submitStyle" class="col" 
        style="width:220px; 
        padding-top:0px;
        ">
            <span style="float:left;
            width:83px; 
            height:10px; 
            padding-bottom:20px;
            padding-top:0px;
            margin-left:10px;margin-top:3px;
            ">
            
                <span class="red" style="float:left;">*</span> 
                <span style="width:40px; margin-left:5px;  float:left;margin-top:2px; line-height:15px;">Required <br/> Fields</span> 
                
            </span>
                <span class="col">
                    <button type="submit" name="submit" id="submit">
                        <img src="img/submit_btn.jpg" alt="submit"/>
                    </button>
                </span>
        </div>
        </div>
        <div id="log" ><span style="color:red;"><?php echo $eMailDup; ?></span></div>
    </div>
</form>

</div>   
<div id="contact">
    <div class="col">
    While we will make every effort to accommodate your requests, all booth tour appointments will be individually confirmed via e-mail.
    </div>
    <div class="col50last" style="padding-left:24px;">
    <span class="block">
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
</div>

<div id="stayConnected">
<img src="img/stay_connected_white.png" class="first" />
<a href="http://www.youtube.com/sonyelectronics" ><img src="img/youtube.png" alt="You Tube"></a>
<a href="http://instagram.com/sony/"><img src="img/instagram.png"  alt="instagram"></a>
<a href="http://www.pinterest.com/sonyelectronics/"><img src="img/pinterest.png"  alt="Pininterest"></a>
<a href="https://www.facebook.com/Sony"><img src="img/facebook.png"  alt="Facebook"></a>
<a href="https://twitter.com/sonyelectronics" class="last"><img src="img/twitter.png"  alt="Twitter"></a>
<a href="http://blog.sony.com/"><img src="img/sony_electronic_blog.png" class="last"></a>
</div>
<div id="legal">
<span class="bold">About Sony Electronics</span>

<span>Headquartered in San Diego, Sony Electronics is a leading provider of audio/video electronics and information technology products for the consumer and professional markets. Operations include research and development, design, engineering, sales, marketing, distribution and customer service.</span>

<span>Sony is noted for a wide range of consumer audio-visual products, such as the BRAVIA<sup>®</sup> LCD and 4K Ultra high-definition televisions, Cyber-shot<sup>®</sup> digital camera, Alpha Digital SLR camera, Handycam<sup>®</sup> camcorder and Walkman<sup>®</sup> personal stereo. Sony is also an innovator in the IT arena with its VAIO<sup>®</sup> personal computers Reader devices and Sony Tablets; and in high-definition professional broadcast equipment, highlighted by the XDCAM<sup>®</sup> HD and CineAlta™ lines of cameras and camcorders, and the SXRD™ 4K digital projector. For more information, visit www.sony.com/news.</span>
</div>

</div> <!-- end of container-->

</body>
</html>
