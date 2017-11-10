<?php
include 'connect.php';
session_start();
if ( isset($_POST['checkstatus']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['fullname']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  $_SESSION['name']=$name;
  header("Location:status4.php");
 }  
?>
<html>
	<head>
		
	</head>

	<body background="123.jpg" background-repeat: no-repeat
    background-attachment: fixed>
    <br>
    <br>
    <br>
    <br>
    <form name="fullname" onsubmit="return validateForm()" action="status4.php" method="post">
		<center><h4>Registration Number:  <input type="text" placeholder="Enter your registration number" name="fullname"><br></h4> </center>

		<center><input type="submit"  name="checkstatus"></center>
	</form>
	</body>

</html>