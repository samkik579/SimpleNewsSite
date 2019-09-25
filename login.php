<?php
// This is a *good* example of how you can implement password-based user authentication in your web application.

require 'database.php';
session_start();

if(!hash_equals($_SESSION['token'], $_POST['token'])){
	die("Request forgery detected");
} 
$mysqli->query(/* perform transfer */);

// Use a prepared statement
$stmt = $mysqli->prepare("SELECT COUNT(*), id, pass_word FROM users WHERE username=?");

// Bind the parameter
$stmt->bind_param('s', $user);
$user = $_POST['username'];
//$user = $_POST['username'];
$stmt->execute();

// Bind the results
$stmt->bind_result($cnt, $user_id, $pwd_hash);
$stmt->fetch();

   

$pwd_guess = $_POST['pass_word'];

//$pwd_guess = $_POST['pass_word'];
// Compare the submitted password to the actual password hash
//echo "$pwd_guess $pwd_hash";
//echo password_verify($pwd_guess, $pwd_hash);

if($cnt == 1 && password_verify($pwd_guess, $pwd_hash)){
	// Login succeeded!
	$_SESSION['username'] = $user;
	// Redirect to your target page
	header("Location: newsite.html");

} else{
    
	echo "Login failed: redirect back to the login screen";
	//header("Location: existinguserlogin.php");

}




?>