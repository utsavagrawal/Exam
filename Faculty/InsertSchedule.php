<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$cmbExam=$_POST['cmbExam'];
	$cmbSem=$_POST['cmbSem'];
	$cmbSubject=$_POST['cmbSubject'];
	$txtDate=$_POST['txtDate'];
	$txtTime=$_POST['txtTime'];
	
	// Establish Connection with MYSQL
	$con = mysql_connect ("localhost","root");
	// Select Database
	mysql_select_db("QUIZ", $con);
	// Specify the query to Insert Record
	$sql = "insert into Quiz_Schedule 	(Quiz_Id,Semester,Subject_Id,QuizDate,QuizTime) 	values('".$cmbExam."','".$cmbSem."','".$cmbSubject."','".$txtDate."','".$txtTime."')";
	// execute query
	mysql_query ($sql,$con);
	// Close The Connection
	mysql_close ($con);
	echo '<script type="text/javascript">alert("Exam Schedule Inserted Succesfully");window.location=\'Schedule.php\';</script>';

?>
</body>
</html>
