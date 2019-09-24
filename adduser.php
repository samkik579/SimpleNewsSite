<?php
require 'database.php';
session_start();

//if(isset($_GET['username']) && isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['pass_word'])){
       //$username = $_GET['username'];
      // $


    //   $_SESSION['username'] = $username;
   //}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$pass_word = $_POST['pass_word'];
$hashed_password = password_hash($pass_word, PASSWORD_BCRYPT);

echo $hashed_password;

//$_SESSION['pass_word'] =$pass_word;
//$_SESSION['username'] =$username;

$stmt = $mysqli->prepare("insert into users (first_name, last_name, username, pass_word) values (?, ?, ?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('ssss', $first_name, $last_name, $username, $hashed_password);

$stmt->execute();

header("Location: newsite.html");

$stmt->close();



?>