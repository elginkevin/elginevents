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
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	
	//Input Validations
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
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
        if(strlen($password) < 8) {
                $errmsg_arr[] = 'Password too short';
                $errflag = true;
        }

        $userkeyid = $_SESSION['SESS_USER_ID'];

        //Get salt
        $qry="SELECT * FROM User WHERE userkeyid='$userkeyid'";
        $result=mysql_query($qry);

        //Check whether the user was found
        if($result) {
                if(mysql_num_rows($result) == 1) {
                        $User = mysql_fetch_assoc($result);
                        $passsalt = $User['passsalt'];
                }else {
                        die("User not found!");
                }
        }else {
                die("User lookup failed!");
        }

        //Do encryption
        $encrypt = new PS_Encrypt();
        $passhash = bin2hex($encrypt->encrypt("$passalt","$password"));

	//Update password
	$qry = "UPDATE User SET passhash = '$passhash', resethash = NULL WHERE userkeyid = $userkeyid";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result != 0) {
		header("location: user_profile.php");
		exit();
	}else {
		die("Password change failed!");
        }

?>
