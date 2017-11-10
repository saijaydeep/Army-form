<?php
include 'connect.php';
ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: airfwe.php");
 }

 $error = false;

 if ( isset($_POST['submit']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  $name1=$_POST['name1'];
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  $gender=$_POST['gender'];
  $add = $_POST['address'];
  $reg=$_POST['reg'];
  $phone=$_POST['phone'];
     //$name=".$row['name'].";
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  echo $nameError;
   
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  echo $nameError;
   
  }
   else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
   echo $nameError;
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
   echo $emailError;
  } else {
   // check email exist or not
   $query = "SELECT email FROM coast1 WHERE email='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
  echo $emailError;
    }
  }
   if( !$error ) {
   
   $query = "INSERT INTO airforce1(name,name1,reg,gender,address,email,phone) VALUES('$name','$name1','$reg','$gender','$add','$email','$phone')";
       //$query = "INSERT INTO airforce1(name) VALUES('$name')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered";
      header("Location: airfwe.php");
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
 }
?>
<html>
<head>
<title>Application Form</title>
<style>
h1   {
       color: black;
       text-align: center;
       border-style:double;
     } 
h2{
	text-align:center;
	 }

</style>
</head>

<body background="HDPackSuperiorWallpapers307_007.jpg" background-repeat:no-repeat>
<script> 
		function validateForm()
		{
			if(regForm.gender[0].checked==false && regForm.gender[1].checked==false)
			{
				alert("Please specify gender");
				return false;
			}

			var num=document.forms["regForm"]["phone"].value;
			if(num=="")
			{
				alert("please enter the number");
				return false;
				
			}
			else if(num.length!=10)
			{
				alert("number length should be 10");
				return false;
			}
			alert("Air Force Aplication submitted successfully");
		}
</script>
<h1>Air Force Application Form</h1>
<br/>
<h2 style="background-color:#e5ed80"><font color:"white">Registration form</font></h2>
<center>
    <form name="regForm" onsubmit="return validateForm()" action="" method="post">
<table>
<tr>
<td>First name:</td>
<td><input type="text" placeholder="enter firstname" name="name" required></td>
</tr>
<tr>
<td>Second name:</td>
<td><input type="text" placeholder="enter second name" name="name1" required></td> 
</tr>
<tr>
<td>Reg No:</td>
<td><input type="text and number" placeholder="enter your reg no" name="reg" pattern="STUD-[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}" required></td> 
</tr>
<tr>
<td>Gender:</td>
<td><input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female</td>
</tr>
<tr>
<td>Date of birth</td>
<td>
<select>
<option>01</option>
<option>02</option>
<option>03</option>
<option>04</option>
<option>05</option>
<option>06</option>
<option>07</option>
<option>08</option>
<option>09</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
<option>19</option>
<option>20</option>
<option>21</option>
<option>22</option>
<option>23</option>
<option>24</option>
<option>25</option>
<option>26</option>
<option>27</option>
<option>28</option>
<option>29</option>
<option>30</option>
</select>
<select>
<option>JAN</option>
<option>FEB</option>
<option>MAR</option>
<option>APR</option>
<option>MAY</option>
<option>JUNE</option>
<option>JULY</option>
<option>AUGUST</option>
<option>SEPTEMBER</option>
<option>OCTOBER</option>
<option>NOVEMBER</option>
<option>DECEMBER</option>
</select>
<select>
<option>1995</option>
<option>1996</option>
<option>1997</option>
<option>1998</option>
<option>1999</option>
</select>
</td>
</tr>
<tr>
<td>Course:</td>
<td>
<select>
<option>B.Tech</option>
<option>M.Tech</option>
<option>MBA</option>
<option>Ph.D</option>
</select>
<select>
<option>CSE</option>
<option>ECE</option>
<option>MEE</option>
<option>EEE</option>
<option>EIE</option>
</select>
</td>
</tr>
<tr>
<td>
Address:
</td>
<td><input type="address" placeholder="enter your address" min="15" name="address" required</td>
</tr>
<tr>
<td>Email:</td>
<td><input type="email" placeholder="abc@gmail.com" name="email" required></td>
</tr>
<tr>
<td>Phone number:</td>
<td><select>
<option>+91</option>
<option>998</option>
<option>997</option>
<option>996</option>
<option>080</option>
</select>
<input type="number" placeholder="enter your number" name="phone" maxlength="10" >
</td>
</tr>
<tr>
<td>Technical skills:</td>
<td>
<input type="checkbox" name="technical" value="c">:C<br>
<input type="checkbox" name="technical" value="c++">:C++<br>
<input type="checkbox" name="technical" value="java">:JAVA<br>
<input type="checkbox" name="technical" value="html">:HTML<br>
<input type="checkbox" name="technical" value="others">:others<br></td>
</tr>
<tr>

<td><input type="submit" name="submit"></td>
<td><input type="reset" name="reset"></td>

</tr>
</table>
</form>
</center>
</body>
</html>