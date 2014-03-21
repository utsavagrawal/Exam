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
<style type="text/css">
<!--
.style10 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; color: #FFFFFF; }
.style11 {color: #000000}
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; }
-->
</style>
</head>

<body>
<div id="container">
	<?php
		include "Header.php";
		?>
	<div id="content">
		<div id="left">
			<h1>Welcome <?php echo $_SESSION['Name'];?></h1>
			
	        <table width="100%" height="209" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="33" bgcolor="#E3E5DB"><span class="style10 style11">Edit Student Information</span></td>
              </tr>
              <tr>
                <td><?php
$Id=$_GET['StuId'];
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("QUIZ", $con);
// Specify the query to execute
$sql = "select * from student_registration where Student_Id=".$Id."";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['Student_Id'];
$RollNumber=$row['RollNumber'];
$Name=$row['Name'];
$Semester=$row['Semester'];
$Email=$row['Email'];
$Mobile=$row['Mobile'];
$UserName =$row['UserName'];
$Password=$row['Password'];
$Status=$row['Status'];
}
?>
                    <form method="post" action="UpdateStudent.php?Id=<?php echo $Id;?>">
                      <table width="100%" border="0">
                        <tr>
                          <td height="32"><span class="style8">Student Id</span></td>
                          <td><?php echo $Id;?></td>
                        </tr>
                        <tr>
                          <td height="36"><span class="style8">Roll Number:</span></td>
                          <td><?php echo $RollNumber;?></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>Name:</strong></td>
                          <td><?php echo $Name;?></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>Semester:</strong></td>
                          <td><select name="cmbSem" id="cmbSem">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                              <option>6</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>Mobile:</strong></td>
                          <td><?php echo $Mobile;?></td>
                        </tr>
                        <tr>
                          <td height="33"><strong>Email:</strong></td>
                          <td><?php echo $Email;?></td>
                        </tr>
                        <tr>
                          <td height="34"><strong>Status:</strong></td>
                          <td><label>
                            <select name="cmbStatus" id="cmbStatus">
                              <option>Active</option>
                              <option>InActive</option>
                            </select>
                          </label></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><input type="submit" name="submit" value="Update Record" /></td>
                        </tr>
                      </table>
                    </form>
                  <?php
// Close the connection
mysql_close($con);
?></td>
              </tr>
            </table>
          <p>&nbsp;</p>
	
	<h1>&nbsp;</h1>
	  </div>
		
		<div id="footerline"></div>
	</div>
	
	<div id="footer"><strong>Copyright © 2013 Online Quiz.  All rights reserved.</strong></div>	
</div>
</body>
</html>