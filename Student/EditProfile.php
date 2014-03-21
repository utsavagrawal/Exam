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
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
	<?php
		include "Header.php";
		?>
	<div id="content">
		<div id="left">
			<h1>Welcome <?php echo $_SESSION['Name'];?></h1>
			<?php
$Id=$_GET['Id'];
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
          <form method="post" action="UpdateProfile.php?Id=<?php echo $Id;?>">
                      <table width="100%" border="0">
                        <tr>
                          <td height="32"><span class="style8"><strong>Student Id</strong></span></td>
                          <td><?php echo $Id;?></td>
                        </tr>
                        <tr>
                          <td height="36"><span class="style8"><strong>Roll Number:</strong></span></td>
                          <td><?php echo $RollNumber;?></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>Name:</strong></td>
            <td><span id="sprytextfield1">
                            <label>
                            <input type="text" name="txtName" id="txtName" value="<?php echo $Name;?>" />
                            </label>
                        <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>Semester:</strong></td>
                          <td><?php echo $Semester;?></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>Mobile:</strong></td>
                        <td><span id="sprytextfield2">
                            <label>
                            <input type="text" name="txtMobile" id="txtMobile" value="<?php echo $Mobile;?>" />
                            </label>
                          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td height="33"><strong>Email:</strong></td>
                          <td><span id="sprytextfield3">
                            <label>
                            <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $Email;?>" />
                            </label>
                          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td height="34"><strong>Status:</strong></td>
                          <td><?php echo $Status;?></td>
                        </tr>
                        <tr>
                          <td height="28"><strong>User Name:</strong></td>
                          <td><span id="sprytextfield4">
                            <label>
                            <input type="text" name="txtUser" id="txtUser" value="<?php echo $UserName;?>" />
                            </label>
                          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td height="28"><strong>Password:</strong></td>
                          <td><span id="sprytextfield5">
                            <label>
                            <input type="password" name="txtPass" id="txtPass" value="<?php echo $Password;?>" />
                            </label>
                          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td height="28"></td>
                          <td><label>
                            <input type="submit" name="button" id="button" value="Update Profile" />
                          </label></td>
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
	
	<div id="footer">Copyright © 2013 Online Quiz.  All rights reserved.</div>	
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
//-->
</script>
</body>
</html>