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
<h1><?php echo $_SESSION['SESS_FIRST_NAME'];?>'s Address </h1>
<a href="user_index.php">Home</a> | <a href="user_profile.php">Update Profile</a> | <a href="password_change.php">Change Password</a> | <a href="logout.php">Logout</a>
<br><br>
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
<form id="UserAddressForm" name="UserAddressForm" method="post" action="user_address_update_exec.php">
  <table width="800" border="0" align="left" cellpadding="2" cellspacing="0">
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
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Update"/></td>
    </tr>
  </table>
</form>
</body>
</html>
