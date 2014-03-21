<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: small;
	color: #003300;
}
-->
</style>
<div id="right">
  <h2>&nbsp;</h2>
			<div class="login">
			  <form name="form1" method="post" action="login.php">
			    <table width="100%" height="276" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td bgcolor="#85A157">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="23"><span class="style1">User Name:</span></td>
                  </tr>
                  <tr>
                  <td height="30"><span id="sprytextfield1">
              <label>
                      <input type="text" name="txtUserName" id="txtUserName">
                      </label>
                    <span class="textfieldRequiredMsg">*</span></span></td>
                  </tr>
                  <tr>
                    <td height="26"><span class="style1">Password:</span></td>
                  </tr>
                  <tr>
                    <td height="31"><span id="sprytextfield2">
                  <label>
                      <input type="password" name="txtPassword" id="txtPassword">
                      </label>
                    <span class="textfieldRequiredMsg">*</span></span></td>
                  </tr>
                  <tr>
                    <td height="27"><span class="style1">Select User:</span></td>
                  </tr>
                  <tr>
                    <td height="33"><label>
                      <select name="cmbType" id="cmbType">
                        <option>Student</option>
                        <option>Faculty</option>
                        <option>Admin</option>
                      </select>
                    </label></td>
                  </tr>
                  <tr>
                    <td><label>
                      <div align="center">
                        <input type="submit" name="button" id="button" value="   Login   ">
                        </div>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="25">&nbsp;</td>
                  </tr>
                  <tr>
                    <td bgcolor="#85A157">&nbsp;</td>
                  </tr>
                </table>
              </form>
		    </div>
		</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
//-->
</script>
