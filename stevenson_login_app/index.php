<?php
/**
 * Author : Stevenson Thaveethu
 * Date : February 27 2019
 * Version : 1.0.0
 */
 
 // Start of output buffering
 ob_start();
 
 require_once dirname(__FILE__)
	. DIRECTORY_SEPARATOR
	. 'include'
	. DIRECTORY_SEPARATOR
	. 'stevenson_mysql.inc.php';
	
 require_once dirname(__FILE__)
	. DIRECTORY_SEPARATOR
	. 'include'
	. DIRECTORY_SEPARATOR
	. 'stevenson_session.inc.php';
	
// Flags
$checkLogin = FALSE;
$validSession = FALSE;
$postLoginForm = TRUE;

// Initialize app business and frontend messages
$errorMsg = 0;
$userMsg = '';

// Check if user is already logged on
if (isset($_COOKIE['loggedin'])) {
	
	if($validSession === FALSE) {
		
		$validSession = session_secure_init();
		
	}
	
	// Check for cookie tampering
	if ($validSession === TRUE && isset($_SESSION['LOGGEDIN'])) {
		
		$postLoginForm = FALSE;
		
	} else {
		
		$validSession = session_obliterate();
		$errorMsg = 3;
		$postLoginForm = TRUE;
		
	}
	
	// Cookie login check done.
	$checkLogin = TRUE;
	
}

// Login verification.
if (isset($_POST['submit'])
	&& $_POST['submit'] == 1
	&& !empty($_POST['username'])
	&& !empty($_POST['password'])) {
		
		if ($validSession === FALSE) {
			
			$validSession = session_secure_init();
			
		}
		
		$userName = (string) $_POST['usernmae'];
		$passWord = (string) $_POST['password'];
		
		if (!ctype_alpha($userName)) {
			
			$userName = preg_replace("/[^a-zA-Z]+/", "", $userName);
			
		}
		
		if (strlen($userName) > 40) {
			
			$userName = substr($userName, 0, 39);
			
		}
		
		$passWord = preg_replace("/[^_a-zA-Z0-9]+/", "", $password);
		
		if (strlen($passWord) > 40) {
			
			$passWord = substr($password, 0, 39);
			
		}
		
		// Check credentials
		if(checkLogin($userName, $passWord)) {
			
			if ($validSession === TRUE) {
				
				// Check for cookie tampering
				if (isset($_SESSION['LOGGEDIN'])) {
					
					$validSession = session_obliterate();
					$errorMsg = 3;
					$postLoginForm = TRUE;
					
				} else {
					
					setcookie('loggedin', TRUE, time()+ 4200, '/');
					$_SESSION['LOGGEDIN'] = TRUE;
					$_SESSION['REMOTE_USER'] = $userName;
					$postLoginForm = FALSE;
					
				}
				
			} else {

				$validSession = session_obliterate();
				$errorMsg = 3;
				$postLoginForm = TRUE;
				
			}
			
		} else {
			
			$validSession = session_obliterate();
			$errorMsg = 1;
			$postLoginForm = TRUE;
			
		}
		
		//Username-password login check done.
		$checkLogin = TRUE;
	}
	
// Intercept logout POST.
if (isset($_POST['logout'])) {
	
	if ($validSession === FALSE) {
		
		session_secure_init();
		
	}
	
	$validSession = session_obliterate();
	$errorMsg = 2;
	$postLoginForm = TRUE;
	
}

// Intercept invalid sessions and redirect to login page.
if ($checkLogin === TRUE && $validSession === FALSE && $errorMsg === 0) {
	
	if ($validSession === FALSE) {
		
		$validSession = session_secure_init();
		$validSession = session_obliterate();
		
	}
	
	$errorMsg = 3;
	$postLoginForm = TRUE;

}

// Prepare view output.
if ($postLoginForm === TRUE) {
	
	switch ($errorMsg) {
		
		case 0: 
			$userMsg = 'Please sign in.';
			break;
		case 1:
			$userMsg = 'Wrong credentials.  <a href="index.php"Please try again</a>.';
			break;
		case 2:
			$userMsg = 'You are logged out!  <a href="index.php">Click here to login again</a>.';
			break;
		case 3:
			$userMsg = 'Invalid session. <a href="index.php">Please login again</a>.';
			break;
	
	}
	
	// Webpage look section
	
	$htmlOut = "<!DOCTYPE html>\n\n";
	$htmlOut .= "<html lan
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	$htmlOut .=
	
	