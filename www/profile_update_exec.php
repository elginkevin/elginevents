<?php
  //Start session
  session_start();
  
  //Include database connection details
  require_once('config.php');
  
  //Array to store validation errors
  $errmsg_arr = array();
  
  //Validation error flag
  $errflag = false;
  
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
  
  //Function to sanitize values received from the form. Prevents SQL injection
  require_once('ps_clean.php');
  
  //Sanitize the POST values
  $fname = clean($_POST['fname']);
  $lname = clean($_POST['lname']);
  $mphone = clean($_POST['mphone']);
  $ophone = clean($_POST['ophone']);
  
  //Input Validations
  if($fname == '')
  {
    $errmsg_arr[] = 'First name missing';
    $errflag = true;
  }
  if($lname == '')
  {
    $errmsg_arr[] = 'Last name missing';
    $errflag = true;
  }
  if(strlen($mphone) > 0 and strlen($mphone) < 10)
  {
    $errmsg_arr[] = 'Mobile phone should be 10 digits';
    $errflag = true;
  }
  if(strlen($ophone) > 0 and strlen($ophone) < 10)
  {
    $errmsg_arr[] = 'Other phone should be 10 digits';
    $errflag = true;
  }

  //If there are input validations, redirect back to the profile form
  if($errflag)
  {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: user_profile.php");
    exit();
  }

  //If there are input validations, redirect back to the registration form
  if($errflag)
  {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: user_profile.php");
    exit();
  }

  $userkeyid = $_SESSION['SESS_USER_ID'];
 
  //Create UPDATE query
  $qry = "UPDATE User set first_name='$fname', last_name='$lname', phone_mobile='$mphone', phone_other='$ophone', maint_date=NOW() WHERE userkeyid=$userkeyid";
  $result = @mysql_query($qry);
  
  //Check whether the query was successful or not
  if($result)
  {
    header("location: user_profile.php");
    exit();
  }
  else
  {
    die("Insert query failed");
  }
?>
