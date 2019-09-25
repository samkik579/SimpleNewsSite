<?php
//this allows a new user to make an account
session_start();
require 'database.php';

$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
if(!hash_equals($_SESSION['token'], $_POST['token'])){
	die("Request forgery detected");
}
$mysqli->query(/* perform transfer */);
    
if(isset($_POST['submit'])){
    //echo 'hello';
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $pass_word = $_POST['pass_word'];
    $hashed_password = password_hash($pass_word, PASSWORD_DEFAULT);
}


$_SESSION['pass_word'] =$pass_word;
$_SESSION['username'] =$username;

$stmt = $mysqli->prepare("insert into users (first_name, last_name, username, pass_word) values (?, ?, ?, ?)");


if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('ssss', $first_name, $last_name, $username, $hashed_password);
echo $first_name, $last_name, $username, $hashed_password;


$stmt->execute();

$stmt->close();

header("Location: newsite.html");
exit;

?>