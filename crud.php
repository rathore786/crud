

<?php
error_reporting(0);

$name = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$mnum = $_POST['mno'];
$btn = $_POST['submit'];

if($btn == true)
{
if($name == "")
{
	echo "<p style='color:red;'>please fill the name</p>";	
}
 if($lastname == "")
{
	echo "<p style='color:red;'>please fill the last name</p>";	
}
 if($email == "")
{
	echo "<p style='color:red;'>please fill the Email</p>";	
}
 if($mnum == "")
{
	echo "<p style='color:red;'>please fill the Mobile Number</p>";	
}
if(!$name == "" && !$lname = "" && !$email == "" && !$mnum ="")
{
	$con = mysqli_connect('localhost','root','','assignment_db');
	if(!$con)
	{
	echo "not connected";
	}
	
	$sql = "insert into form(FirstName,LastName,Email,MobNo) values('$name','$lastname','$email','$mnum')";
	$query = mysqli_query($con ,$sql);
	if($query)
	{
		echo "values added successfully!";
	}
	
	$sql2 = "select * from form";
	$query2 = mysqli_query($con,$sql2);
?>	
	 <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
		 <th>Mobile Number</th>
      </tr>
    </thead>
    <tbody>
      
	<?php while($row = mysqli_fetch_array($query2))
	{ ?>
	<tr>
        <td><?php  echo $row['FirstName'] ?></td>
        <td><?php echo  $row['LastName'] ?></td>
         <td><?php echo $row['Email'] ?></td>  
         <td><?php echo $row['MobNo'] ?></td>   
		 <td><a href="update.php?uid=<?php echo $row['ID'] ?>">Edit</a></td>
         <td><a href="delete.php?did=<?php echo $row['ID'] ?>">Delete</a></td>
     </tr>
		<?php echo  "<br />" ;
		
	}?>
     
	 </tbody>
  </table>
<?php }



}

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>
<form method="post" action="crud.php">
First Name:<input type="text" name="fname" value="<?php  if (
isset($_POST['fname'])) echo $_POST['fname'];  
?> " /><br />

Last Name: <input type="text" name="lname" value="<?php if (
isset($_POST['lname'])) echo $_POST['lname']; ?>" /><br />

Email: <input type="email" name="email" value="<?php if (
isset($_POST['email'])) echo $_POST['email']; ?>" /><br />

Mobile No: <input type="number" name="mno" value="<?php if (
isset($_POST['mno'])) echo $_POST['mno']; ?>" /><br />

<input type="submit" name="submit" /><br />
</form>
</body>
</html>
