<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
		/*
		$day = 'January 8th 2014';
		$preferTime  = '9:00am';
		
		 $dateFormatted = date("l, M j \a\\t g:i a", strtotime($day .' '. $preferTime )      );
		 
		 $dateFormatted = str_replace('am','a.m.', $dateFormatted);
		 $dateFormatted = str_replace('pm','p.m.', $dateFormatted);

		 echo $dateFormatted ;
		 */
		 
		$day = 'January 8th 2014';
		$preferTime  = '9:00am';
				 
		
		//$dateFormatted = date("d_hia", strtotime($day .' '. $preferTime )      ) . '.jpg';
		//$dateFormatted = date("l,Y-m-d H:i", strtotime($day .' '. $preferTime )      );
		$dateFormatted = date("Y-m-d H:i", strtotime($day .' '. $preferTime )      );
		 

		 echo $dateFormatted  ;
?>
</body>
</html>