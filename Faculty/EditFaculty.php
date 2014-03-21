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
			
	        <table width="100%" height="209" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="33" bgcolor="#E3E5DB"><span class="style10 style11">Edit Faculty Information</span></td>
              </tr>
              <tr>
                <td><?php
$Id=$_GET['FacultyId'];
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("QUIZ", $con);
// Specify the query to execute
$sql = "select * from Faculty_Master where Faculty_Id=".$Id."";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['Faculty_Id'];
$Name=$row['Faculty_Name'];
$Email=$row['Faculty_Email'];
$Mobile=$row['Faculty_Mobile'];
$UserName=$row['Faculty_User'];
$Password=$row['Faculty_Password'];
}
?>
                    <form method="post" action="UpdateFaculty.php?Id=<?php echo $Id;?>">
                      <table width="100%" border="0">
                        <tr>
                          <td height="32"><span class="style8">Faculty Id:</span></td>
                          <td><?php echo $Id;?></td>
                        </tr>
                        <tr>
                          <td height="36"><span class="style8">Faculty Name:</span></td>
                          <td><span id="sprytextfield2">
                            <label>
                            <input name="txtName" type="text" id="txtName" value="<?php echo $Name;?>" />
                            </label>
                            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td height="36"><span class="style8">Email Id:</span></td>
                          <td><input type="text" name="txtEmail" id="txtEmail"  value="<?php echo $Email;?>" />
                              </label>
                              <span class="textfieldRequiredMsg">A value is required.</span></span></span></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>Mobile Number:</strong></td>
                          <td><span id="sprytextfield5">
                            <label>
                            <input type="text" name="txtMobile" id="txtMobile" value="<?php echo $Mobile;?>"/>
                            </label>
                            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td height="31"><strong>User Name:</strong></td>
                          <td><span id="sprytextfield6">
                            <label>
                            <input type="text" name="txtUserName" id="txtUserName" value="<?php echo $UserName;?>" />
                            </label>
                            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td height="33"><strong>Password:</strong></td>
                          <td><span id="sprytextfield7">
                            <label>
                            <input type="password" name="txtPassword" id="txtPassword"  value="<?php echo $Password;?>"/>
                            </label>
                            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
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
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
</body>
</html>