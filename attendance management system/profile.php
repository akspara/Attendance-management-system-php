<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
</head>
<body background="images/back.jpg">
	 <style type="text/css">
    body{
      
       background-repeat: repeat;
      background-attachment: fixed; 
    }
  </style>
	<link href="css/style.css" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	
  <h1 id="heading">
 <div class="topnav">
        <img  id="logo" src="images\tomcat.ico" align="middle" height="82" width="82" > Attendance Management System* 
          <ul>
          	
           <li> <a  href="index.html">Home</a></li>
           
            <li>
          <a class="active" href="#">Signin</a></li>
        
          
      </ul>
 
  

  </div></h1>
	
 <br><br>
	
<form action="" method="POST">
<h3 id="login">LOGIN  </h3>
 
<?php include('database.php') ?>
  
	
	
	<div id="log">
   <?php include('errors.php') ?>
 


		<p class="inputgroup"><label>USERNAME:</label>
			<input type="text"  name="Email" ></p>
			<br>
	
	<p class="inputgroup"><label>PASSWORD:</label>
		<input type="password"  name="password" id="pass"  ></p>
		<br>
		<input type="checkbox"  onclick="show();">show password
		
	<p><input type="submit" id="sub" name="signin" value="signin" ></p><br><br>

	new intern? <a href="signup.php">sign up</a>
	<br><br><br><br>


	</div>
	<br><br><br><br>

</form>
<footer>
      <p> Akshit Tiwari/Dehradun</p>
      <a href="https://www.facebook.com"><img src="images/fb.ico" height="40" width="40"></a>
      <a href="https://www.linkedin.com"><img src="images/linked.png" height="40" width="40"></a><p>
        &#169; copyright. All rights reserved
    </footer>
<script src="js/showpass.js"></script>


</body>
</html>


	
