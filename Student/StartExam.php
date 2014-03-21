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
	<table width="100%" border="1" bordercolor="#85A157" >
                    <tr>
                      <th height="32" bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>Id</strong></div></th>
                      <th bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>QUIZ Type</strong></div></th>
                      <th bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>Semester</strong></div></th>
                      <th height="32" bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>Subject</strong></div></th>
                      <th bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>Date</strong></div></th>
                       <th bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>Time</strong></div></th>
                      <th bgcolor="#85A157" class="style13"><div align="left" class="style4">Start</div></th>
                    </tr>
                    <?php
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("QUIZ", $con);
// Specify the query to execute
$sql = "SELECT quiz_schedule.Schedule_Id, quiz_schedule.Semester, quiz_schedule.QuizDate, quiz_schedule.QuizTime, quiz_category.Quiz_Name, subject_master.Subject_Name
FROM quiz_schedule, quiz_category, subject_master
WHERE quiz_schedule.Quiz_Id=quiz_category.Quiz_Id AND quiz_schedule.Subject_Id=subject_master.Subject_Id AND quiz_schedule.QuizDate='".date("Y-m-d")."' AND quiz_schedule.Semester='".$_SESSION['Sem']."'";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['Schedule_Id'];
$Quiz=$row['Quiz_Name'];
$Sem=$row['Semester'];
$Subject=$row['Subject_Name'];
$Date=$row['QuizDate'];
$Time=$row['QuizTime'];


?>
                    <tr>
                      <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Id;?></strong></div></td>
                      <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Quiz;?></strong></div></td>
                      <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Sem;?></strong></div></td>
                      <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Subject;?></strong></div></td>
                      <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Date;?></strong></div></td>
                        <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Time;?></strong></div></td>
                      <td class="style13"><div align="left" class="style9 style6"><strong><a href="Exam.php?Id=<?php echo $Id;?>">Exam</a></strong></div></td>
                    </tr>
                    <?php
}
// Retrieve Number of records returned
$records = mysql_num_rows($result);
?>
                    <tr>
                      <td colspan="7" class="style13"><div align="left" class="style12"> </div></td>
                    </tr>
                    <?php
// Close the connection
mysql_close($con);
?>
                  </table>		
	<p>&nbsp;</p>
	
	<h1>&nbsp;</h1>
	  </div>
		
		<div id="footerline"></div>
	</div>
	
	<div id="footer">Copyright © 2013 Online Quiz.  All rights reserved.</div>	
</div>
</body>
</html>