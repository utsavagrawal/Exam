<?php
echo "<h1>Hello World</h1>";
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
.style12 {font-size: small; font-weight: bold; }
.style13 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
	font-weight: bold;
	color: #000000;
}
.style4 {font-size: small;
	font-weight: bold;
	color: #FFFFFF;
}
.style5 {color: #FFFFFF}
.style6 {color: #000000}
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
			
	        <table width="100%" border="1" bordercolor="#85A157" >
              <tr>
                            <th bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>QUIZ Type</strong></div></th>
                <th bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>Semester</strong></div></th>
                <th height="32" bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>Subject</strong></div></th>
                <th bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>Total</strong></div></th>
                <th bgcolor="#85A157" class="style13"><div align="left" class="style9 style5"><strong>Correct</strong></div></th>
                <th bgcolor="#85A157" class="style13"><div align="left" class="style4">Wrong</div></th>
                <th bgcolor="#85A157" class="style13"><div align="left" class="style4">Score</div></th>
              </tr>
              <?php
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("QUIZ", $con);
// Specify the query to execute
$sql = "SELECT result_master.Result_Id, quiz_category.Quiz_Name, 

subject_master.Subject_Name, result_master.Student_Id, 

student_registration.RollNumber, student_registration.Name, 

student_registration.Semester, result_master.Total, result_master.Correct, 

result_master.Wrong, result_master.`Result`
FROM result_master, quiz_category, subject_master, student_registration
WHERE result_master.Exam_Id=quiz_category.Quiz_Id AND 

result_master.Subject_Id=subject_master.Subject_Id AND 

result_master.Student_Id=student_registration.Student_Id AND result_master.Student_Id='".$_SESSION['ID']."' order by quiz_category.Quiz_Name ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Quiz=$row['Quiz_Name'];
$Sem=$row['Semester'];
$Subject=$row['Subject_Name'];
$Total=$row['Total'];
$Correct=$row['Correct'];
$Wrong=$row['Wrong'];
$Score=$row['Result'];

?>
              <tr>
               
                <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Quiz;?></strong></div></td>
                <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Sem;?></strong></div></td>
                <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Subject;?></strong></div></td>
                <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Total;?></strong></div></td>
                <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Correct;?></strong></div></td>
                <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Wrong;?></strong></div></td>
                <td class="style13"><div align="left" class="style9 style6"><strong><?php echo $Score;?></strong></div></td>
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