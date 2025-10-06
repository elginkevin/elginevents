<?php
  require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Member Index</title>
<link href="loginmodule.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>Go on, <?php echo $_SESSION['SESS_FIRST_NAME'];?>, put it out there!</h1>
<a href="user_index.php">Home</a> | <a href="user_profile.php">My Profile</a> | <a href="logout.php">Logout</a>
<br><br>
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
<h2>Please tell us a little bit about yourself:</h2>
<form id="CreateEventForm" name="CreateEventForm" method="post" action="create_event_exec.php">
  <table width="800" border="0" align="left" cellpadding="2" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
      <td width="188"><input name="userkeyid" type="hidden" maxlength="50" class="textfield" id="userkeyid" value="<?php echo $_GET['key']; ?>"/></td>
    </tr>
    <tr>
      <th align="left" width="40%">Event Name:</th>
      <td width="60%"><input name="event_name" type="text" size="50" maxlength="50" class="textfield" id="event_name"/>*</td>
    </tr>
    <tr>
      <th align="left" width="40%">Description:</th>
      <td width="60%"><textarea name="event_descr" cols="50" rows="5" wrap="virtual"></textarea>*</td>
    </tr>
    <tr>
      <th align="left" width="40%">Event Email:</th>
      <td width="60%"><input name="email" type="text" size="55" maxlength="55" class="textfield" id="email"/></td>
    </tr>
    <tr>
      <th align="left" width="40%">Event Phone:</th>
      <td width="60%"><input name="phone" type="phone" size="20" maxlength="20" class="textfield" id="phone"/></td>
    </tr>
    <tr>
      <th align="left" width="40%">Event Web Site:</th>
      <td width="60%"><input name="event_url" type="text" size="100" maxlength="100" class="textfield" id="event_url"/></td>
    </tr>
    <tr>
      <th align="left" width="40%">Event Start:</th>
      <td width="60%"><input name="event_start" type="text" size="50" maxlength="50" class="textfield" id="event_start" value="MM/DD/YYYY HH:MM"/></td>
    </tr>
    <tr>
      <th align="left" width="40%">Event End:</th>
      <td width="60%"><input name="event_end" type="text" size="50" maxlength="50" class="textfield" id="event_end" value="MM/DD/YYYY HH:MM"/></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit"/></td>
    </tr>
    <tr>
      <th colspan="2">* Required fields</th>
    </tr>
  </table>
</form>
</body>
</html>
