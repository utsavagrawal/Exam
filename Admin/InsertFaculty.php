<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$Name=$_POST['txtName'];
	$Email=$_POST['txtEmail'];
	$Mobile=$_POST['txtMobile'];
	$UserName=$_POST['txtUserName'];
	$Password=$_POST['txtPassword'];

	
	// Establish Connection with MYSQL
	$con = mysql_connect ("localhost","root");
	// Select Database
	mysql_select_db("QUIZ", $con);
	// Specify the query to Insert Record
	$sql = "insert into Faculty_Master 	(Faculty_Name,Faculty_Email,Faculty_Mobile,Faculty_User,Faculty_Password,Status) 	values('".$Name."','".$Email."','".$Mobile."','".$UserName."','".$Password."','Active')";
	// execute query
	mysql_query ($sql,$con);
	// Close The Connection
	mysql_close ($con);
	echo '<script type="text/javascript">alert("New Faculty Inserted Succesfully");window.location=\'Faculty.php\';</script>';

?>
</body>
</html>
