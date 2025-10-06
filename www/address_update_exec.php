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
  $address = clean($_POST['address']);
  $city = clean($_POST['city']);
  $state = clean($_POST['state']);
  $zipcode = clean($_POST['zipcode']);
  
  //Input Validations
  if($address == '')
  {
    $errmsg_arr[] = 'Address missing';
    $errflag = true;
  }
  if($city == '')
  {
    $errmsg_arr[] = 'City missing';
    $errflag = true;
  }
  if($state == '')
  {
    $errmsg_arr[] = 'State missing';
    $errflag = true;
  }
  if($zipcode == '')
  {
    $errmsg_arr[] = 'Zipcode missing';
    $errflag = true;
  }

  //If there are input validations, redirect back to the address form
  if($errflag)
  {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: user_address.php");
    exit();
  }

  //If there are input validations, redirect back to the registration form
  if($errflag)
  {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: user_address.php");
    exit();
  }

  $userkeyid = $_SESSION['SESS_USER_ID'];

  //Create SELECT query
  $qry = "SELECT * FROM UserAddress WHERE userkeyid=$userkeyid and typekeyid=1";
  $result = @mysql_query($qry);
  if($result)
  {
    if(mysql_num_rows($result) == 1)
    {
      $UserAddress = mysql_fetch_assoc($result);
      $addresskeyid = $UserAddress['addresskeyid'];
    }
    else
    {
      die("Multiple rows returned from lookup");
    }

    header("location: user_address.php");
    exit();
  }
  else
  {
    die("Lookup query failed");
  }

  //Create UPDATE query
  $qry = "UPDATE Address set address_street='$address', address_city='$city', address_status='$state', address_zip='$zipcode', statuskeyid=1, maint_date=NOW() where addresskeyid=$addresskeyid";
  $result = @mysql_query($qry);
  
  //Check whether the query was successful or not
  if($result)
  {
    if(mysql_num_rows($result) == 1)
    {
      $UserAddress = mysql_fetch_assoc($result);
      $addresskeyid = $UserAddress['addresskeyid'];
    }
    else
    {
      header("location: login_failed.php");
      exit();
    }
    header("location: user_address.php");
    exit();
  }
  else
  {
    die("Update query failed");
  }
?>
