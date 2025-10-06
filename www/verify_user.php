<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Form</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h2>Log in to complete your registration.</h2>
<form id="VerifyForm" name="VerifyForm" method="post" action="verify_exec.php">
  <table width="500" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
      <td align="left" width="112"><b>Email:</b></td>
      <td width="188"><input name="email" type="text" maxlength="255" class="textfield" id="email" value="<?php echo $_GET['email']; ?>"/></td>
    </tr>
    <tr>
      <td align="left"><b>Password:</b></td>
      <td><input name="password" type="password" maxlength="50" class="textfield" id="password" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="emailhash" type="hidden" maxlength="32" class="textfield" id="emailhash" value="<?php echo $_GET['hash']; ?>"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Verify" /></td>
    </tr>
  </table>
</form>
</body>
</html>
