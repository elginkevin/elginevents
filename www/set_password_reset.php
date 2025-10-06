<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h2>Your email address please:</h2>
<form id="SetRessetForm" name="SetResetForm" method="post" action="set_password_reset_exec.php">
  <table width="500" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
      <td align="left" width="112"><b>Email:</b></td>
      <td width="188"><input name="email" type="text" maxlength="255" class="textfield" id="email" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Reset" /></td>
    </tr>
  </table>
</form>
</body>
</html>
