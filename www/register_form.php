<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registration Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>
<h2>Please tell us a little bit about yourself:</h2>
<form id="RegistrationForm" name="RegistrationForm" method="post" action="register_exec.php">
  <table width="800" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
      <th align="left" width="40%">First Name:</th>
      <td width="60%"><input name="fname" type="text" size="30" maxlength="30" class="textfield" id="fname"/>*</td>
    </tr>
    <tr>
      <th align="left" width="40%">Last Name:</th>
      <td width="60%"><input name="lname" type="text" size="30" maxlength="50" class="textfield" id="lname"/>*</td>
    </tr>
    <tr>
      <th align="left" width="40%">Email:</th>
      <td width="60%"><input name="email" type="text" size="30" maxlength="255" class="textfield" id="email"/>*</td>
    </tr>
    <tr>
      <th align="left" width="40%">Password:</th>
      <td width="60%"><input name="password" type="password" size="30" maxlength="50" class="textfield" id="password"/>*</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" width="60%"><i>At least 8 characters please.</i></td>
    </tr>
    <tr>
      <th align="left" width="40%">Confirm Password:</th>
      <td width="60%"><input name="cpassword" type="password" size="30" maxlength="50" class="textfield" id="cpassword"/>*</td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Register"/></td>
    </tr>
    <tr>
      <th colspan="2">* Required fields</th>
    </tr>
  </table>
</form>
</body>
</html>
