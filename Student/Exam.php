
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
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>
<script type="text/javascript">
var flag=5;//1minx60sec
function disco()
{
setInterval(function(){dispDT()},1000);
if (flag==0)
{
//redirect to page
window.location.href = '../Student/Result.php';//Target Page
}
else
{
//countdown!
flag--;
}
setTimeout('disco()',1000);
}

function dispDT()
{
var obj=document.getElementById("demo");
var current=new Date();
obj.innerHTML="Time left : "+flag+" seconds\t\t<br/>Current Date and Time: "+current+"<br />";

}
</script>
<body onload=disco()>
<div id="times">
<p id="demo" align="center">Time</p>
</div>
<div id="container">
	<?php
		include "Header.php";
		?>
	<div id="content">
		<div id="left">
			<h1>Welcome <?php echo $_SESSION['Name'];?></h1>
			
	                <p>
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
		
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("QUIZ", $con);
// Specify the query to execute
$sql = "SELECT * from question_master where Quiz_Id='".$Quiz_Id."' and Semester='".$Semester."' and Subject_Id='".$Subject_Id."'";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
$i=1;
while($row = mysql_fetch_array($result))
{
$Id=$row['Question_Id'];
$Question=$row['Question'];
$OptionA=$row['Option1'];
$OptionB=$row['Option2'];
$OptionC=$row['Option3'];
$OptionD=$row['Option4'];
?>
</p>
<form id="form2" name="form2" method="post" action="Display.php?Id=<?php echo $SID;?>">
                       <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    
                    
                    <tr>
                      <td height="36" colspan="2" bgcolor="#85A157"><span class="style1">(<?php echo $i;?>)<?php echo $Question;?></span></td>
          </tr>
                    <tr>
                      <td  colspan="2"><table width="100%" height="64" border="2" cellpadding="0" cellspacing="0" bordercolor="#A6BF79">
                        <tr>
                          <td height="32" width="50%"><input type="radio" name="RadioGroup<?php echo $i;?>" value="<?php echo $OptionA;?>" id="OptionA" />
                          <?php echo $OptionA;?></td>
                          <td width="50%"><input type="radio" name="RadioGroup<?php echo $i;?>" value="<?php echo $OptionC;?>" id="OptionC" />
                              <?php echo $OptionC;?></td>
                        </tr>
                        <tr>
                          <td height="32" width="50%"><input type="radio" name="RadioGroup<?php echo $i;?>" value="<?php echo $OptionB;?>" id="OptionB" />
                              <?php echo $OptionB;?></td>
                          <td width="50%"><input type="radio" name="RadioGroup<?php echo $i;?>" value="<?php echo $OptionD;?>" id="OptionD" />
                              <?php echo $OptionD;?></td>
                        </tr>
                      </table></td>
          </tr>
                
                  </table>
                           <p>
                             <?php
$i=$i+1;						   
}
?>

                           </p>
                           <p align="center">
                             
</p>
<div align="center">
  <?php
// Retrieve Number of records returned
$records = mysql_num_rows($result);
if($records!=0)
{
?>
  <input type="submit" name="button" id="button" value="Submit" />
  <?php
}
// Close the connection
mysql_close($con);
?>
                             
                           </div>
          </form>
          <p>&nbsp;</p>
          <h1>&nbsp;</h1>
	  </div>
		
		<div id="footerline"></div>
	</div>
	
	<div id="footer"></div>	
</div>
</body>
</html>
