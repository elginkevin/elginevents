<?php
  //Start session
  session_start();
  
  //Include database connection details
  require_once('config.php');

  //Include encryption library
  require_once('ps_encrypt.php');
  
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
  $userkeyid = clean($_POST['userkeyid']);
  $password = clean($_POST['password']);
  $emailhash = clean($_POST['emailhash']);
  
  //Input Validations
  if($userkeyid == '')
  {
    $errmsg_arr[] = 'Key missing';
    $errflag = true;
  }
  if($password == '')
  {
    $errmsg_arr[] = 'Password missing';
    $errflag = true;
  }
  if($emailhash == '')
  {
    $errmsg_arr[] = 'Hash missing';
    $errflag = true;
  }
  
  //If there are input validations, redirect back to the login form
  if($errflag)
  {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: login_form.php");
    exit();
  }

  //Get salt
  $qry="SELECT * FROM User WHERE userkeyid=$userkeyid AND email_primary_v = 'N' AND email_primary_hash = '$emailhash'";
  $result=mysql_query($qry);

  //Check whether the user was found
  if($result)
  {
    if(mysql_num_rows($result) == 1)
    {
      $User = mysql_fetch_assoc($result);
      $passsalt = $User['passsalt'];
    }
    else
    {
      header("location: verify_failed.php");
      exit();
    }
  }
  else
  {
    die("Query failed");
  }

  //Do encryption
  $encrypt = new PS_Encrypt();
  $passhash = bin2hex($encrypt->encrypt("$passalt","$password"));

  //Create query
  $qry="SELECT * FROM User WHERE userkeyid=$userkeyid AND passhash='$passhash'";
  $result=mysql_query($qry);
  
  //Check whether the query was successful or not
  if($result)
  {
    if(mysql_num_rows($result) == 1)
    {
      //Login Successful
      $User = mysql_fetch_assoc($result);
      $_SESSION['SESS_USER_ID'] = $User['userkeyid'];
      $_SESSION['SESS_FIRST_NAME'] = $User['first_name'];
      $_SESSION['SESS_LAST_NAME'] = $User['last_name'];

      //Update email validation flag
      $qry="UPDATE User SET email_primary_v = 'Y', email_primary_hash = NULL WHERE userkeyid = $userkeyid";
      $result=mysql_query($qry);

      if($result)
      {
        session_regenerate_id();
        session_write_close();
        header("location: user_index.php");
        exit();
      }
      else
      {
        die("Trouble updating verification flag");
      }
    }
    else
    {
      //Login failed
      header("location: login_failed.php");
      exit();
    }
  } 
  else
  {
    die("Query failed");
  }
?>
