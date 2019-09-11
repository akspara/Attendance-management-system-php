


<?php
session_start();
if(!isset($_SESSION['firstname']))
{
	$_SESSION['msg']= "log in first";
	header("location:profile.php");

}
if(isset($_GET['logout']))
{
	session_destroy();
	unset($_SESSION['firstname']);
	header("location:profile.php");

}

?>



<?php if (isset($_SESSION['success'])) 
 
 	
 	{	
 		 header("location:myinfo.php");
 		unset($_SESSION['success']);
  }
          
  
  
   


   
?>

