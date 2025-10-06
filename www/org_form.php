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
<h1>Tell us about it, <?php echo $_SESSION['SESS_FIRST_NAME'];?>!</h1>
<a href="user_index.php">Home</a> | <a href="user_profile.php">My Profile</a> | <a href="logout.php">Logout</a>
<br><br>
<form id="OrgForm" name="OrgForm" method="post" action="org_insert.php">
  <table width="800" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
      <th align="left" width="40%">Organization Name:</th>
      <td width="60%"><input name="oname" type="text" size="50" maxlength="100" class="textfield" id="oname"/>*</td>
    </tr>
    <tr>
      <th align="left" width="40%">Description:</th>
      <td width="60%"><input name="odescr" type="text" size="50" maxlength="255" class="textfield" id="odescr"/>*</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <th>* Required fields</th>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" width="40%">Email:</th>
      <td width="60%"><input name="email" type="text" size="50" maxlength="255" class="textfield" id="email"/>*</td>
    </tr>
    <tr>
      <th align="left" width="40%">Website:</th>
      <td width="60%"><input name="ourl" type="text" size="50" maxlength="2500" class="textfield" id="ourl"/>*</td>
    </tr>
    <tr>
      <th align="left" width="40%">Mailing Address:</th>
      <td width="60%"><input name="address" type="address" size="30" maxlength="50" class="textfield" id="address"/></td>
    </tr>
    <tr>
      <th align="left" width="40%">City:</th>
      <td width="60%"><input name="city" type="city" size="30" maxlength="50" class="textfield" id="city"/></td>
    </tr>
    <tr>
      <th align="left" width="40%">State:</th>
      <td width="60%"><input name="state" type="state" size="2" maxlength="2" class="textfield" id="state"/></td>
    </tr>
    <tr>
      <th align="left" width="40%">Zipcode:</th>
      <td width="60%"><input name="zipcode" type="zipcode" size="5" maxlength="5" class="textfield" id="zipcode"/></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th align="left" width="40%">Mobile Phone:</th>
      <td width="60%"><input name="mphone" type="mphone" size="20" class="textfield" id="mphone"/></td>
    </tr>
    <tr>
      <th align="left" width="40%">Other Phone:</th>
      <td width="60%"><input name="ophone" type="ophone" size="20" class="textfield" id="ophone"/></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit"/></td>
    </tr>
  </table>
</form>
</body>
</html>
