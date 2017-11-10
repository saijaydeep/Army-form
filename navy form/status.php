

<?php 
ob_start();
 session_start();
 include 'connect.php';
 
 /*$n=$_SESSION['name'];
            $query = "SELECT name,name1,email,phone FROM coast1 WHERE reg='$n'";
   $res = mysql_query($query);
            if ($res) {
      while($row = mysql_fetch_assoc($res)) {
        echo( 'name:'.$row["name"].' lastname: '.$row['name1'].'email:'.$row['email'].'phone:'.$row['phone'].'<br>' );    
    }
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   }*/ 
 $cname=$_POST['fullname'];
 $query="SELECT * FROM coast1 where reg='$cname'";
 $qresult=mysql_query($query);
 $count=  mysql_num_rows($qresult);
 if($count>0)
 {

     /*$fname=$_POST['name'];
     $lname=$_POST['name1'];
     $reg=$_POST['reg'];
     $gender=$_POST['gender'];
     $email=$_POST['email'];*/
     $dispquery="SELECT name,name1,reg,gender,email,phone FROM coast1 where reg='$cname'";
     $result=mysql_query($dispquery);
     
     if($result)
     {
      /*if(mysqli_num_rows($result))*/
     
        while($row=mysql_fetch_array($result))
        {
         echo  '<b>name:</b>'.$row["name"].'<br>';
         echo  '<b>second name:</b>'.$row["name1"].'<br>';
         echo  '<b>Registration Number:</b>'.$row["reg"].'<br>';
         echo  '<b>gender:</b>'.$row["gender"].'<br>';
         echo  '<b>email:</b>'.$row["email"].'<br>';
        }  
      
     echo "Application registered successfully<br>";          
     
     }
     
 }
 else
     {
         echo "Application not registered";
     }
     
   ?>
<html>
<head>
	<title>Status</title>
</head>
<body background="123.jpg" background-repeat: no-repeat
    background-attachment: fixed>
	
	<p>Coast Application 
            
            </p>
</body>
</html>