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
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$email = clean($_POST['email']);
	
	//Input Validations
	if($email == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errmsg_arr[] = 'Invalid email address';
                $errflag = true;
        }
	
        //Get userkeyid
	if($email != '') {
		$qry = "SELECT * FROM User WHERE email_primary='$email'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) == 1) {
                                $User = mysql_fetch_assoc($result);
                                $userkeyid = $User['userkeyid'];
			}
			@mysql_free_result($result);
		}
		else {
			die("Email lookup query failed");
		}
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: set_password_reset_form.php");
		exit();
	}

        //Do encryption
        $encrypt = new PS_Encrypt();

        //Generate resethash
        $resethash = md5($encrypt->randomString(32));

	//Create UPDATE query
	$qry = "UPDATE User SET resethash = '$resethash' WHERE userkeyid = '$userkeyid'";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result != 0) {
                $email_from = "info@elginevents.org";
                $subject = "Please reset your password at elginevents.org";
                $body = "Please copy and paste this URL to your browser address bar to reset your password at elginevents.org:\n\n";
                $urlverify = "http://www.elginevents.org/password_reset.php?email=$email&hash=$resethash";

                mail("$email", "$subject", "$body"."$urlverify", "From: $email_from");
		header("location: set_password_reset_success.php");
		exit();
	}else {
		die("Update query failed");
        }

?>
