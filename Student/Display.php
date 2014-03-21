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
.style1 {color: #FFFFFF}
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
			
	<p>
	
	<table width="100%" height="66" border="1" cellpadding="0" cellspacing="0" bordercolor="#A6BF79">
      <tr>
        <th height="33" bgcolor="#85A157"><span class="style1">No</span></th>
        <th bgcolor="#85A157"><span class="style1">Question</span></th>
        <th bgcolor="#85A157"><span class="style1">Your Answer</span></th>
        <th bgcolor="#85A157"><span class="style1">Correct Answer</span></th>
        <th bgcolor="#85A157"><span class="style1">Score</span></th>
      </tr>
    
      <?php 
	  
	  $SID=$_GET['Id'];
// Establish Connection with Database
$con1 = mysql_connect("localhost","root");
// Select Database
mysql_select_db("QUIZ", $con1);
// Specify the query to execute
$sql1 = "SELECT * from quiz_schedule where Schedule_Id='".$SID."'";
// Execute query
$result1 = mysql_query($sql1,$con1);
// Loop through each records 
while($row1 = mysql_fetch_array($result1))
{
$Quiz_Id=$row1['Quiz_Id'];
$Semester=$row1['Semester'];
$Subject_Id=$row1['Subject_Id'];
}
mysql_close($con1);
	  
	  
	  
	  
     		 $Exam=$Quiz_Id;
			 $Sem=$Semester;
			 $Subject=$Subject_Id;
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("QUIZ", $con);
// Specify the query to execute
$sql = "SELECT * from question_master where Quiz_Id='".$Exam."' and Semester='".$Sem."' and Subject_Id='".$Subject."'";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
$i=1;
$Score=0;
$Correct=0;
$Wrong=0;
while($row = mysql_fetch_array($result))
{
$Id=$row['Question_Id'];
$Question=$row['Question'];
$Answer=$row['Answer'];

if (!isset($_POST['RadioGroup'.$i]))
$ans1="Skip";
else
$ans1 = $_POST['RadioGroup'.$i];

?>
          </p>
	
      <tr height="30">
        <td><?php echo $i;?></td>
        <td><?php echo $Question;?></td>
        <td><?php echo $ans1;?></td>
        <td><?php echo $Answer;?></td>
        <td> 
		<?php
						  if ($ans1==$Answer)
						  {
						  echo "5 Points";
						  $Score=$Score+5;
						  $Correct=$Correct+1;
						  }
						  else
						  {
						  echo "0 Points"; 
						  $Wrong=$Wrong+1;
						  }
						  ?>          </td>
      </tr>
    
	
                           <p>
                             <?php
$i=$i+1;						   
}
// Retrieve Number of records returned
$records = mysql_num_rows($result);
// Close the connection
mysql_close($con);
?>
</p>
</table>
    <p>&nbsp;</p>
    <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#A6BF79">
      <tr height="30">
        <td height="24" bgcolor="#85A157"><div align="center"><span class="style1"><strong>Total Question</strong></span></div></td>
        <td bgcolor="#85A157"><div align="center"><span class="style1"><strong>Correct Answer</strong></span></div></td>
        <td bgcolor="#85A157"><div align="center"><span class="style1"><strong>Wrong Answer</strong></span></div></td>
        <td bgcolor="#85A157"><div align="center"><span class="style1"><strong>Total Score</strong></span></div></td>
      </tr>
      <tr height="30">
        <td>
		  <div align="center"><strong>
		    <?php
		$i=$i-1;
		echo $i; 
		?>
	        </strong></div></td>
        <td><div align="center"><strong><?php echo $Correct;?></strong></div></td>
        <td><div align="center"><strong><?php echo $Wrong;?></strong></div></td>
        <td><div align="center"><strong><?php echo $Score;?></strong></div></td>
      </tr>
    </table>
    <?php 
		$con = mysql_connect ("localhost","root");
	// Select Database
	mysql_select_db("QUIZ", $con);
	// Specify the query to Insert Record
	$sql = "insert into result_master (Exam_Id,Subject_Id,Student_Id,Total,Correct,Wrong,Result) values('".$Exam."','".$Subject."','".$_SESSION['ID']."','".$i."','".$Correct."','".$Wrong."','".$Score."')";
	// execute query
	mysql_query ($sql,$con);
	// Close The Connection
	mysql_close ($con);
	?>
	  </div>
		
		<div id="footerline"></div>
	</div>
	
	<div id="footer">Copyright © 2013 Online Quiz.  All rights reserved.</div>	
</div>
</body>
</html>