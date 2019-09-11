<?php session_start(); 
 include ('connection.php');
  $mail=$_SESSION['Email'];
  $end="";
  $startdat="";
  $important="9999-99-99";
  $query1="select * from $mail order by date1 desc ";
  
  if(mysql_query($query1))
  {$result1=mysql_query($query1);
   
    if(mysql_num_rows($result1)!=0)
    {
      $row=mysql_fetch_array($result1);
      $important= $row['date1'];
    }
  }
  $absent=array();
  $todaydate=date('Y-m-d');
  $input=date('d');
  $m=date('m');

 
  ?>

  <script type="text/javascript">
    function confirmation()
  {  var x=confirm("you sure want to leave?you will automatically logout");
    if (x==true) 
    {
      window.location="index.html";
      
    }
    
  }
  </script>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body background="images/round.png" >
    
	
  <link rel="stylesheet"  type="text/css" href="css/style.css" >
	<link rel="stylesheet" type="text/css" href="css/profile.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
	
    
<h1 id="heading" > 
 <div class="topnav">
        <img  id="logo" src="images\tomcat.ico" align="middle" height="82" width="82" > Attendance Management System* 
          <ul>
             <li> <a href="#" onclick="confirmation();">HOME</a></li>
       
            <li>
           <a href="profile.php" alt="logout">Logout</a></li>
       
      </ul>
 


  </div></h1>


  


 </h1></strong> </div>
  <br>
	
	
            <br><br><br><br>
		
   	<?php   

     $date=date('Y-m-d');

   	?>
   

   
          
    
  <?php 
        $query="select * from $mail where date1= '$date'";
        $result=mysql_query($query);
        
        ?>
		<center>
     
      
    <div class="first">
      <div class="myslides"><p>YOUR DETAILS(1/4)</p>
      <br>
      <?php  
        $que="select firstname,lastname,username,gender,startdat,endate from attendance where username='$mail'";
        $res=mysql_query($que);
        ?>

      <?php if (mysql_num_rows($res)==0)
      {
        echo "your table is not created!!!!!!";
      } ?>
      
      <?php if(mysql_num_rows($res)==1):?>
          
    
   	<?php  while($row=mysql_fetch_array($res)):?>
     <table >
     	
     	<th>firstname</th>
      <th>email id</th>
      <th>lastname</th>
      <th>gender</th>
      <th>date of joining</th>
      <th>date of ending</th>
      <tr>
      <td > <?php echo $row['firstname'] ;?></td> 
     	   		<td> <?php echo $row['lastname'] ;?></td> 
   	
   	
   		 <td ><?php echo $row['username']; ?> </td>
   		

   	
   			 <td ><?php echo $row['gender']; ?></td>
   	
   	
   		 	<td ><?php $startdat= $row['startdat'];echo $row['startdat']; ?></td>
   	
   		
   		 	<td><?php $end= $row['endate']; echo $row['endate']; ?></td>
         </tr>
   		 </table>
   <?php endwhile ;?>

   <?php endif ;?>        

 <br><br><br>

             </div>

  

              <div class="myslides"><p>today's attendance(2/4)</p><br>
     
     
      <?php if((mysql_num_rows($result)==1)&&($date<=$end)):?>
             
             <div id="submitted">
              <?php echo "your attendance is submitted for today.Slide to check your attendance details"; ?>
             </div>
        <?php endif; ?>

          <?php    if ($date>$end) :?>
      <div class="error">
        <?php echo "your internship has ended";?>
      </div>


    <?php endif; ?>
     <?php    if ($date<$startdat) :?>
      <div class="error">
        <?php echo "your internship has not started yet.There is some error in your PC's date and time";?>
      </div>

      
    <?php endif; ?>

            <?php if((mysql_num_rows($result)==0) &&($date<=$end)&&($date>=$startdat)):?>
              <form action="" method="post">
                
              <input type="checkbox"  name="check1">Mark Your Attendance<br>
              
              <input type="submit" id="sub" name="submit">


              </form>
          <?php endif; ?>     
<?php    
      if (isset($_POST['submit'])) 
      {
     if (isset($_POST['check1'])) 
 {   
      
      $val="insert into $mail values('$todaydate','present')";
        $important=date('Y-m-d');
      array_push($absent, $input);
     
        if (!mysql_query($val))
            {
            echo "nope not done";
            }

      else  {
             header('location:myinfo.php');
            }
} 
}

 ?>


 <br><br><br>

      </div>


      <div class="myslides"><p>(3/4)</p><br><br>“Wisdom is not a product of schooling but of the lifelong attempt to acquire it.”<br> 
           ― Albert Einstein  <br><br>
           “Time, as it grows old, teaches all things.”<br> 
                  ― Aeschylus, Prometheus Bound<br><br>
                  “If knowledge is not put into practice, it does not benefit one.” 
                       <br>― Muhammad Tahir-ul-Qadri<br><br>

                       “Knowledge is power? No. Knowledge on its own is nothing, but the application of useful knowledge, now that is powerful.” <br>
                           ― Rob Liano
                           <br><br>
      	<?php if ($date>=$end): ?> 
          <div id="submitted"> 

      		<?php echo "YOUR INTERSHIP IS NOW ENDED .WE HOPE YOU ENJOYED AND LEARNED SOMETHING OF VALUE.'please remember to delete your database and good luck for future'"; ?>
          </div>
          <form action="" method="post">
            <input type="submit" id="sub" name="delete" value="delete data">
          	  </form>


      	 <?php endif; ?>
     <?php if (isset($_POST['delete'])) {
     	$del="drop table $mail";
     	mysql_query($del);
     	$del1="delete from attendance where username='$mail'";
     	mysql_query($del1);
     	header("location:profile.php");
     }  ?>


     <br><br><br> 

      	</div>

         

<?php
        
         $e=strtotime($end);
         $date1=date('d',strtotime($startdat));
         $date=intval($date1);
        $endd=intval($input);
           $year1=date('Y',strtotime($todaydate));
           $year=intval($year1);
         $stmonth1=date('m',strtotime($startdat));
         $stmonth=intval($stmonth1);
         $edmonth1=date("m",strtotime($end));
        $edmonth=intval($m);
          $diff=$edmonth-$stmonth;
          $k=0;
          $j=0;

 if(date('Y-m-d')>=$important)
{

        if($diff==0)
    {
           $k=0;
           for ($i=$date; $i<$endd ; $i++) 
          { 
                  if($k>=count($absent))
                                {
                                     $i=49;
                                     $stmonth=69;
                                }


                 else if($i!=$absent[$k])
               {    
                      
                 $xa=$year."-".$stmonth."-".$i;
                 
                                   $qu="select * from $mail where date1= '$xa'";
                                   $m=mysql_query($qu);

                                   if(mysql_num_rows($m)==0)
                                   {  $v="insert into $mail values('$xa','absent')";
                                     mysql_query($v);
                                    }
                                 
                        
                }               
             else
             {
              $k++;
             }
          }
    }

              if($diff!=0)
    {    
    $k=0;
        while($j<=$diff)
        {


               if($j!=0)
               {
                 $date=1;
               }
              if($stmonth==1||$stmonth==3||$stmonth==5||$stmonth==7||$stmonth==8||$stmonth==10||$stmonth==12)
             {

                  for( $i=$date;$i<=31;$i++)
               {     

                        

                        if($k>=count($absent))
                                {
                                     $i=49;
                                     $stmonth=69;
                                     break;
                                }


                       if($i!=$absent[$k])
                   {   $xa=$year."-".$stmonth."-".$i;
                     

                            $qu="select * from $mail where date1= '$xa'";
                                   $m=mysql_query($qu);

                                   if(mysql_num_rows($m)==0)
                                   {  $v="insert into $mail values('$xa','absent')";
                                     mysql_query($v);
                                    }
                   
                    }
                       else{$k++;}


                         
                }
             }
             else if($stmonth==4||$stmonth==6||$stmonth==9||$stmonth==11)
                {
                  for( $i=$date;$i<=30;$i++)
                   {
                       
                          if($k>=count($absent))
                                {
                                     $i=49;
                                     $stmonth=69;
                                     break;
                                }


                       if($i!=$absent[$k])
                        { 
                              $xa=$year."-".$stmonth."-".$i;
                                      
                                  $qu="select * from $mail where date1= '$xa'";
                                   $m=mysql_query($qu);

                                   if(mysql_num_rows($m)==0)
                                   {  $v="insert into $mail values('$xa','absent')";
                                     mysql_query($v);
                                    }
                                      
                       }
                       else{$k++;}


                    }
                 }
                else if($stmonth==2)
                    {
                   for( $i=$date;$i<=28;$i++)
                      {
                          
                          if($k>=count($absent))
                                {
                                     $i=49;
                                     $stmonth=69;
                                     break;
                                }      
                
                       if($i!=$absent[$k])
                      { $xa=$year."-".$stmonth."-".$i;

                          
                                  $qu="select * from $mail where date1= '$xa'";
                                   $m=mysql_query($qu);

                                   if(mysql_num_rows($m)==0)
                                   {  $v="insert into $mail values('$xa','absent')";
                                     mysql_query($v);
                                    }
                        }
                       else{$k++;}


                          

                                
                  }
                    }
                    $j++;
                    $stmonth+=1;
        }
    }
}



?>
   

   
      <div class="myslides"><p>ATTENDANCE DETAILS(4/4)</p><br>
      	<?php  
        $query1="select * from $mail order by date1";
        $result1=mysql_query($query1);
        ?>
        <?php if (mysql_num_rows($result1)==0) {
        echo "no values inserted";
        }?>
        <?php if(mysql_num_rows($result1)>0):?>
        	 
            <table >
          <th >date</th>
          <th>attendance</th>
   	       <?php  while($row=mysql_fetch_array($result1)):?>
        
          <tr>
        		<td ><?php echo $row['date1']; ?></td>
            <td><?php echo $row['value']; ?></td>
        	</tr>
        
    <?php endwhile;?>
    </table>
    </div>
      <?php endif ;?> 
        <br><br><br>
      </div>
     
     <div class="prev" onclick="plusDivs(-1)">&#10094</div>
     <div class="next" onclick="plusDivs(+1)">&#10095</div>
     </center>
      
    </div>

   
  

<br><br><br><br>
<br><br><br><br>

             
<footer>
      <p> Akshit Tiwari/Dehradun</p>
      <a href="https://www.facebook.com"><img src="images/fb.ico" height="40" width="40"></a>
      <a href="https://www.linkedin.com"><img src="images/linked.png" height="40" width="40"></a><p>
        &#169; copyright. All rights reserved
    </footer>


</body>
</html>
<script src="js/slide2.js"></script>
<style type="text/css">
	



  .error
{ font-size: 20px;
  width: 50%;
  margin:0px auto;
  padding:10px;
  border:1px solid #a94442;
  color:#ff0000;
  background: #f2dede;
  border-radius: 5px;
  text-align: center;
}

.prev,.next
{
  top: 60%;
  color: gray;
}



  #submitted
{ 

font-size: 20px;
  width: 50%;
  margin:0px auto;
  padding:10px;
  border:1px solid rgb(125,215,45);
  color:rgb(125,215,45);
  background: rgb(0,64,0);
  border-radius: 5px;
  text-align: center;
 
 
}




#sub
{
  padding:10px;
  font-size: 15px;
  color:white;
  background: #5F9EA0;
  border:none;
  border-radius: 5px;
}


table,th,td
{
  width: 80%;
  margin: auto;
  border:1px solid white;
  border-collapse: collapse;
  text-align: center;
  font-size: 30px;
  table-layout: fixed;
  background:blue;
  opacity: 0.5;
  color: white;
  margin-top: 100px;
}

th,td
{
  padding: 20px;
  opacity: 0.9;
}


.myslides{
  color: white;
  font-size: 30px;
  text-align: center;
  height: 100%;
 }


  .first
 { 
  background-image: url("images/bg2.jpg");
  background-size: cover;
  background-attachment: fixed;
  margin-top: -26px;
  margin-right:-10px;
  margin-left: -10px; 

 }

 body{
  min-height: 100%;
}
p{
  font-style: italic;
  font-size: 30px;
  font-family: 'poppins',sans-serif;
}


</style>
