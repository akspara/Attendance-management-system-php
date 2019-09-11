<?php   





    $to = "akshittacker@gmail.com";
	$header ="From:".$POST_['email'];
	$message=$POST_['message'];
	$subject ="regarding your website";
$retval = mail($to,$subject,$message,$header);
header("location:index.html");


?>