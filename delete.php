



<?php
error_reporting(0);


$btn = $_REQUEST['submit'];

$con = mysqli_connect('localhost','root','','assignment_db');

	if(isset($_REQUEST['did']))
	{
		$did = $_REQUEST['did'];
		$query = "select * from form where ID = '$did'";
		$run = mysqli_query($con,$query);
		$row = mysqli_fetch_array($run);
		echo $row['FirstName']."<br />";
	    echo $row['LastName']."<br />";
		echo $row['Email']."<br />";
		echo $row['MobNo']."<br />";
	}
	
	if($btn == true){
		//$did = $_REQUEST['did'];
		$uquery = "DELETE from form where ID = '$did'";
		$cure = mysqli_query($con,$uquery);
		if($cure)
		{
			echo "Your records has deleted!";


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
<form method="post">


<input type="submit" name="submit" value="Delete"/><br />
</form>
</body>
</html>