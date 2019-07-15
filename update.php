



<?php
error_reporting(0);




$con = mysqli_connect('localhost','root','','assignment_db');

	if(isset($_REQUEST['uid']))
	{
		$uid = $_REQUEST['uid'];
		$query = "select * from form where ID = '$uid'";
		$run = mysqli_query($con,$query);
		$row = mysqli_fetch_array($run);
	}
	
	if(isset($_REQUEST['submit'])){
		$uid = $_REQUEST['uid'];
		$name = $_REQUEST['fname'];
$lastname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$mnum = $_REQUEST['mno'];
		$uquery = "UPDATE  form SET FirstName = '$name' , LastName = '$lastname' , Email = '$email' , MobNo = '$mnum' where ID = '$uid'";
		
		if( mysqli_query($con,$uquery))
		{
			echo "Your records has updated";


		}
	}
			

	

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" >
First Name:<input type="text" name="fname" value="<?php  echo $row['FirstName']; ?>" /><br />

Last Name: <input type="text" name="lname" value="<?php echo $row['LastName']; ?>" /><br />

Email: <input type="email" name="email" value="<?php echo $row['Email']; ?>" /><br />

Mobile No: <input type="number" name="mno" value="<?php echo $row['MobNo']; ?>" /><br />

<input type="submit" name="submit" /><br />
</form>
</body>
</html>