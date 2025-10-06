<?php
  require_once('auth.php');

  //Include database connection details
  require_once('config.php');

  //Connect to mysql server
  $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
  if(!$link)
  {
    die('Failed to connect to server: ' . mysql_error());
  }

  //Select database
  $db = mysql_select_db(DB_DATABASE);
  if(!$db)
  {
    die("Unable to select database");
  }

  $userkeyid = $_SESSION['SESS_USER_ID'];

  //Get salt
  $qry="SELECT * FROM User WHERE userkeyid=$userkeyid";
  $result=mysql_query($qry);

  //Check whether the user was found
  if($result)
  {
    $User = mysql_fetch_assoc($result);
    $fname = $User['first_name'];
    $lname = $User['last_name'];
    $mphone = $User['phone_mobile'];
    $ophone = $User['phone_other'];
  }
  else
  {
    die("User lookup failed");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My Profile</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
  if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 )
  {
    echo '<ul class="err">';
    foreach($_SESSION['ERRMSG_ARR'] as $msg)
    {
      echo '<li>',$msg,'</li>';
    }
    echo '</ul>';
    unset($_SESSION['ERRMSG_ARR']);
  }
?>
<h1><?php echo $_SESSION['SESS_FIRST_NAME'];?>'s Profile </h1>
<a href="user_index.php">Home</a> | <a href="user_address.php">Update Address</a> | <a href="password_change.php">Change Password</a> | <a href="logout.php">Logout</a>
<br><br>
<form id="ProfileForm" name="ProfileForm" method="post" action="profile_update_exec.php">
  <table width="800" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
      <th align="left" width="40%">First Name:</th>
      <td width="60%"><input name="fname" type="text" size="30" maxlength="30" class="textfield" id="fname" value="<?php echo $fname; ?>"/>*</td>
    </tr>
    <tr>
      <th align="left" width="40%">Last Name:</th>
      <td width="60%"><input name="lname" type="text" size="30" maxlength="50" class="textfield" id="lname" value="<?php echo $lname; ?>"/>*</td>
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
      <th align="left" width="40%">Mobile Phone:</th>
      <td width="60%"><input name="mphone" type="mphone" size="20" maxlength="20" class="textfield" id="mphone" value="<?php echo $mphone; ?>"/></td>
    </tr>
    <tr>
      <th align="left" width="40%">Other Phone:</th>
      <td width="60%"><input name="ophone" type="ophone" size="20" maxlength="20" class="textfield" id="ophone" value="<?php echo $ophone; ?>"/></td>
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
