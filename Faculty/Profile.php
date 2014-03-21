<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>QUIZ Management</title>
</head>

<body>
<div id="container">
	<?php
		include "Header.php";
		?>
	<div id="content">
		<div id="left">
			<h1>Welcome <?php echo $_SESSION['Name'];?></h1>
			
	<p>&nbsp;</p>
	<?php
$ID=$_SESSION['ID'];
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("QUIZ", $con);
// Specify the query to execute
$sql = "select * from Faculty_Master where Faculty_Id ='".$ID."'  ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
$row = mysql_fetch_array($result)
?>
                <table width="100%" height="183" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><strong>Faculty ID:</strong></td>
                    <td><?php echo $row['Faculty_Id'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Faculty Name:</strong></td>
                    <td><?php echo $row['Faculty_Name'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Email ID:</strong></td>
                    <td><?php echo $row['Faculty_Email'];?></td>
                  </tr>
                  <tr>
                    <td><strong>Mobile Number:</strong></td>
                    <td><?php echo $row['Faculty_Mobile'];?></td>
                  </tr>
                  
                  <tr>
                    <td>&nbsp;</td>
                    <td><a href="EditFaculty.php?FacultyId=<?php echo $row['Faculty_Id']; ?>">Edit Profile</a></td>
                  </tr>
                </table>
	<h1>&nbsp;</h1>
	  </div>
		
		<div id="footerline"></div>
	</div>
	
	<div id="footer">Copyright © 2013 Online Quiz.  All rights reserved.</div>	
</div>
</body>
</html>