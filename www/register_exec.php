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
	$fname = clean($_POST['fname']);
	$lname = clean($_POST['lname']);
	$email = clean($_POST['email']);
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	
	//Input Validations
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if($email == '') {
		$errmsg_arr[] = 'Email missing';
		$errflag = true;
	}
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errmsg_arr[] = 'Invalid email address';
                $errflag = true;
        }
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
        if(strlen($password) < 8) {
                $errmsg_arr[] = 'Password too short';
                $errflag = true;
        }
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if(strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	
	//Check for duplicate email
	if($email != '') {
		$qry = "SELECT * FROM User WHERE email_primary='$email'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Email already in use';
				$errflag = true;
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
		header("location: register_form.php");
		exit();
	}

        //Do encryption
        $encrypt = new PS_Encrypt();
        $passsalt = $encrypt->randomString(32);
	$passhash = bin2hex($encrypt->encrypt("$passalt","$password"));

        //Email validation
        $emailhash = md5($encrypt->randomString(32));

	//Create INSERT query
	$qry = "INSERT INTO User(first_name, last_name, email_primary, email_primary_hash, passhash, passsalt, create_date) VALUES('$fname','$lname','$email','$emailhash','$passhash','$passsalt',NOW())";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result != 0) {
                $email_from = "info@elginevents.org";
                $subject = "Please verify your registration at elginevents.org";
                $body = "Please copy and paste this URL to your browser address bar to verify your account with elginevents.org:\n\n";
                $urlverify = "http://www.elginevents.org/verify_user.php?email=$email&hash=$emailhash";

                mail("$email", "$subject", "$body"."$urlverify", "From: $email_from");
		header("location: register_success.php");
		exit();
	}else {
		die("Insert query failed");
        }

?>
