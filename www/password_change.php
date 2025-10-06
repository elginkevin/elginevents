<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My Profile</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>Change password?</h1>
<a href="user_index.php">Home</a> | <a href="user_profile.php">My Profile</a> | <a href="logout.php">Logout</a>
<br><br>
<form id="PasswordForm" name="PasswordForm" method="post" action="password_exec.php">
  <table width="800" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
      <th align="left" width="40%">Password:</th>
      <td width="60%"><input name="password" type="password" size="30" maxlength="50" class="textfield" id="password"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left" width="60%"><i>At least 8 characters please.</i></td>
    </tr>
    <tr>
      <th align="left" width="40%">Confirm Password:</th>
      <td width="60%"><input name="cpassword" type="password" size="30" maxlength="50" class="textfield" id="cpassword"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Change" value="Change"/></td>
    </tr>
  </table>
</form>
</body>
</html>
