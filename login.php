<?php

	if($_GET["logout"] == 1 and $_SESSION['id']) {
		session_destroy();
		$message = "You have been logged out.";
	}

	session_start();
	
	include("connection.php");
	

	$signUpEmail = $_POST['signUpEmail'];
	$signUpPassword = $_POST['signUpPassword'];
	$signUp = $_POST['signUpSubmit'];

	$logInEmail = $_POST['logInEmail'];
	$LogInpassword = $_POST['logInPassword'];
	$logIn = $_POST['logInSubmit'];


	if($signUp == "Sign Up") {

		if(!$signUpEmail) {
			$error .= "<br />Please enter your email address";
		} else if(!filter_var($signUpEmail, FILTER_VALIDATE_EMAIL)) {
			$error .= "<br />Please enter a valid email address";
		}

		if(!$signUpPassword) {
			$error .= "<br />Please enter your password";
		} else {
			if(strlen($signUpPassword) < 8) {
				$error .= "<br />Please enter a password with more than 8 characters";
			}
			if(!preg_match('`[A-Z]`', $signUpPassword)) {
				$error .= "<br />Please include at least one uppercase letter";
			}
		}

		if($error) {
			$error = "There were error(s) in your signup details:".$error;
		} else {

			$query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $signUpEmail)."'";

			$result = mysqli_query($link, $query);
			
			$results = mysqli_num_rows($result);

			if($results) {
				$error = "That email address is already registered. Do you want to log in?";
			} else {
				
				$query = "INSERT INTO `users` (`email`, `password`) VALUES " . "('" . mysqli_real_escape_string($link, $signUpEmail) . "'" . "," . "'" . md5(md5($signUpEmail).$signUpPassword) . "')";

				mysqli_query($link, $query);

				$_SESSION['id'] = mysqli_insert_id($link);

				header("Location:mainpage.php");

			}

		}

	}

	if($logIn == "Log In") {

		$query = "SELECT * FROM `users` WHERE `email` = '". mysqli_real_escape_string($link, $logInEmail). "' AND `password` = '". md5(md5($logInEmail).$LogInpassword)."' LIMIT 1";

		$result = mysqli_query($link, $query);

		$row = mysqli_fetch_array($result);

		if($row) {
			$_SESSION['id'] = $row['id'];

			header("Location:mainpage.php");

		} else {
			$error = "We could not find user or password in the database. Please try again.";
		}

	}

?>