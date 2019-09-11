<html>
<head>
<title>signup</title>
</head>

<body background="images/back.jpg">
		 <style type="text/css">
    body{
      
       background-repeat: repeat;
      background-attachment: fixed; 
    }
  </style>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/profile.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<h1  id="heading"> <div class="topnav">
        <img  id="logo" src="images\tomcat.ico" align="middle" height="82" width="82" > Attendance Management System* 
          <ul>
            <li> <a  href="index.html" >Home</a></li>
            <li>
          <a class="active" href="#">Signin</a></li>
         
          
      </ul>
 
  

  </div></h1>
  
	
	

 <br><br>


<h2 id="login11">
registration form<br>
</h2>
<br>

<form name="form2" action="" method="POST">
	
<?php include('database.php') ?>

	
	<div id="signup">
		<?php include('errors.php') ?>
<p class="inputgroup"><label>First Name:</label><input type="text"  name= "firstname" ></p><br>

<p class="inputgroup">
<label>last Name:</label><input type="text" name="lastname" ></p><br>



<p class="inputgroup"><label>gender:</label></p>
<input type="radio" name ="gender" value="male">male<br>
<input type="radio" name ="gender" value="female">female<br>
<input type="radio" name ="gender" value="other">others
<br><br>

<p class="inputgroup"><label>enter your Username:</label><input type="text" required="required" name="Email"></p><br>
<p class="inputgroup"><label>password:</label><input type="password" required="required" name="password1"></p><br>
<p class="inputgroup"><label>re-enter password:</label><input type="password" required="required" name="password2"></p><br>




<p class="inputgroup"><label>select intern period from today to:</label></p><input type="date" name="enddate" required="required"><br><br>

<p> i agree to the terms and conditions of the Factory<input type="checkbox" name="check" >




<p><input type="submit" id="sub" value="proceed" name="signup"  ></p><br><br><br>
already a member? <a href="profile.php">sign in</a>
</div>

</form>
<br><br><br><br>

<footer>
      <p> Akshit Tiwari/Dehradun</p>
      <a href="https://www.facebook.com
"><img src="images/fb.ico" height="40" width="40"></a>
      <a href="https://www.linkedin.com"><img src="images/linked.png" height="40" width="40"></a><p>
        &#169; copyright. All rights reserved
    </footer>
</body>

</html>   



	

