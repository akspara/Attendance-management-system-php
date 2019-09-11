<?php
 include ('connection.php');
 session_start();
 $firstname="";
 $lastname="";
 $Email="";
 $password1="";
$password2="";
$gender="male";
$enddate="";  
$errors=array();

$_SESSION['firstname']="";



if (isset($_POST['signin'])) 

{

 $Email=mysql_real_escape_string($_POST['Email']);
   $password=mysql_real_escape_string($_POST['password']);

  if(empty($Email))
  {array_push($errors, "enter email");}

  if(empty($password))
  { array_push($errors, "enter password");}

    if(count($errors)==0)
      {   $password1=md5($password);

         $query="select firstname, username from attendance where username='$Email' and password='$password1'";
         $admin="select firstname, username from admin where username='$Email' and password='$password1'";
          $result=mysql_query($query);
          $resultadmin=mysql_query($admin);
 
          if(mysql_num_rows($result)==1)
             {       
                   while ($row=mysql_fetch_array($result)) 
                   {
                        $_SESSION['firstname']= $row['firstname'];
                         $_SESSION['Email']= $row['username'];
                 }

                   
                    $_SESSION['success']="you are now logged in";
                   header("location:index1.php");
             }

             

          else
             {
                 array_push($errors, "wrong username or password please try again");
             }

      }
    
  


}


if (isset($_POST['signup']))
{
   


   $firstname=mysql_real_escape_string($_POST['firstname']);
   $lastname=mysql_real_escape_string($_POST['lastname']);
   $Email=mysql_real_escape_string($_POST['Email']);

   $password1=mysql_real_escape_string($_POST['password1']);
   $password2=mysql_real_escape_string($_POST['password2']);
  $gender=mysql_real_escape_string($_POST['gender']);
   
    $enddate=mysql_real_escape_string($_POST['enddate']);


 
   
   //error check
  if(empty($firstname))
    {array_push($errors, "firstname is required");}
  if(empty($lastname))
    {array_push($errors, "lastname is required");}

   if (!isset($_POST['gender']))
  {array_push($errors, "no gender is checked!");}

 $check="select * from attendance where username='$Email'";
 $h=mysql_query($check); 
if(mysql_num_rows($h)==1)
    {array_push($errors, "this username is already taken");}


  if(empty($password1))
    {array_push($errors, "password is required");}

  
 if($password1!=$password2)
    {array_push($errors, "the two passwords doesn't match");}

  
  
 

 
 $startdate=date('Y-m-d');
  

if ($enddate<$startdate) {
 array_push($errors, "the date you want is in the past");
}

if (!isset($_POST['check']))
  {array_push($errors, "please check the checkbox!");}


//register
              if(count($errors)==0)
             {     
                   
                   $password=md5($password1);
                  $query="insert into attendance values('$firstname','$lastname','$password','$Email','$gender','$startdate','$enddate')";               

                   
                   $_SESSION['firstname']=$firstname;
                   $_SESSION['Email']=$Email;
                 
                    
                   
                  $query1="create table $Email(date1 date,value varchar(10))";
                  
                  
                 
                     if(mysql_query($query) && mysql_query($query1))
                       {  $_SESSION['success']="you are now logged in";
                         header("location:index1.php");
                        }
                    else
                    {
                      echo "could not create your table check urself".mysql_error();
                    }
             }


}

?>

