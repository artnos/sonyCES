<?php 
/*
session_start();
session_unset();
session_destroy();
$_SESSION = array();
*/
include '../connectToDB.php';

	//Extracting the data
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	 $pageValid = true;
	 
	
	}; //<!-- end of ($_SERVER['REQUEST_METHOD'] == 'POST')
	
	//validate lastName
	if (isset($_REQUEST['pw'] ) )	{
		$pw =$_REQUEST['pw'];
		if ($pw == 'sony'){
			
		} else {  $pageValid = false; }
		
	} else { $pageValid = false;};

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registered List Sort By Appointment</title>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
<div class="container">

<header>
<div class="row">
	<div class="col-md-12">
    	<h1>Registered</h1>
</div></div>
</header>
<div class="row col-md-12" >
	<form id="form1" name="form1"  method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <table cellpadding="0" cellspacing="0" border="0">
        <tr>
        <td width="250"><label for="pw">Password:</label></td><td></td>
        </tr>
        <tr>
        <td>
        <input name="pw" type="text" id="register" 
        value="<?php print  $lName; ?>" size="25" maxlength="50" />
        <?php print $lNameError;?>        
        </td>
        <td><input type="submit" value="Submit"></td>
        </tr>
    </table>
    </form>
    <?php echo $pw?>
</div>
<div class="row col-md-12" >

<?php
//id, firstName, lastName, eMail, telephone, outlet, comfirm, boothTour //  WHERE eMail = 'artnos@gmail.com'
//original grab all data order by ID
//$data = $mysqli -> prepare("SELECT * FROM  `registration` GROUP BY eMail ORDER BY ID ") or die(mysqli_error());		  
							//boothTour   

//original grab all ignore duplicates and count
$data = $mysqli -> prepare("SELECT  id, firstName, lastName, eMail, telephone, outlet, comfirm, boothTour,  COUNT(*)  FROM (SELECT * FROM `registration` ORDER BY ID DESC ) AS alias GROUP BY eMail ORDER BY ID ") or die(mysqli_error());


//only show duplicates
//$data = $mysqli -> prepare("SELECT id, firstName, lastName, eMail, telephone, outlet, comfirm, boothTour,  COUNT(*) FROM `registration` GROUP BY email HAVING COUNT(*) > 1 ") or die(mysqli_error());	
	
									
						
$data-> execute();
$data-> bind_result($id,$firstName,$lastName,$eMail, $telephone,$outlet,$comfirm,$boothTour,$count);

echo '<br/><table class="table table-hover">
<tr>
<td>id</td>
<td>First Name</td>
<td>Last Name</td>
<td>E-Mail</td>
<td>Telephone</td>
<td>Outlet</td>
<td>Wants Tour</td>
<td>Booth Tour Appointment</td>
<td>Count</td>
</tr>';

while($data->fetch()){
echo "
<tr>
<td>{$id}</td>
<td>{$firstName}</td>
<td>{$lastName}</td>
<td>{$eMail}</td>
<td>{$telephone}</td>
<td>{$outlet}</td>
<td>{$comfirm}</td>
<td>";

if($comfirm == 'yes' & $boothTour != '' ){
	
	echo date("l, F j, Y, g:i A",strtotime($boothTour) );
	
	}

echo "</td>
<td>{$count}</td>

</tr>
";
};

echo '</table><br/>';
$data ->close(); //for previous prepare statement


?>
</div>
</div><!-- end of container-->
</body>
</html>
<?php
createExcel.php

?>


      