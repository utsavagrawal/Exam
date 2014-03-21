<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$UserName=$_POST['txtUserName'];
$Password=$_POST['txtPassword'];
$UserType=$_POST['cmbType'];

if($UserType=="Admin")
{
$con = mysql_connect("localhost","root");
mysql_select_db("QUIZ", $con);
$sql = "select * from User_Master where User_Name='".$UserName."' and User_Password='".$Password."'";
$result = mysql_query($sql,$con);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
echo $records;
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");';
echo "window.location='index.php';</script>";
//header("location:index.php");
}
else
{
session_start();
header("location:Admin\index.php");
} 
mysql_close($con);
}
else if ($UserType=="Faculty")
{
$con = mysql_connect("localhost","root");
mysql_select_db("QUIZ", $con);
$sql = "select * from Faculty_Master where Faculty_User='".$UserName."' and Faculty_Password='".$Password."' and Status='Active'";
$result = mysql_query($sql,$con);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
}
else
{
session_start();
$_SESSION['ID']=$row['Faculty_Id'];
$_SESSION['Name']=$row['Faculty_Name'];
header("location:Faculty\index.php");
} 
mysql_close($con);
}
else if ($UserType=="Student")
{

$con = mysql_connect("localhost","root");
mysql_select_db("QUIZ", $con);
$sql = "select * from student_registration where UserName='".$UserName."' and Password='".$Password."' and Status='Active'";
$result = mysql_query($sql,$con);
$records = mysql_num_rows($result);
$row = mysql_fetch_array($result);
if ($records==0)
{
echo '<script type="text/javascript">alert("Wrong UserName or Password");window.location=\'index.php\';</script>';
}
else
{
session_start();
$_SESSION['ID']=$row['Student_Id'];
$_SESSION['Name']=$row['Name'];
$_SESSION['Sem']=$row['Semester'];
header("location:Student\index.php");
} 
mysql_close($con);

}

?>
</body>
</html>
