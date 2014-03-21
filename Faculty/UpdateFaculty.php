<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$Id = $_GET['Id'];
$Name=$_POST['txtName'];
$Email=$_POST['txtEmail'];
$Mobile = $_POST['txtMobile'];
$UserName=$_POST['txtUserName'];
$Password=$_POST['txtPassword'];


// Establish Connection with MYSQL
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("QUIZ", $con);
// Specify the query to Update Record
$sql = "Update Faculty_Master set Faculty_Name='".$Name."',Faculty_Email='".$Email."',Faculty_Mobile='".$Mobile."',Faculty_User='".$UserName."',Faculty_Password='".$Password."' where Faculty_Id=".$Id."";
// Execute query
mysql_query($sql,$con);
// Close The Connection
mysql_close($con);
echo '<script type="text/javascript">alert("Faculty Updated Succesfully");window.location=\'Profile.php\';</script>';
?>
</body>
</html>
