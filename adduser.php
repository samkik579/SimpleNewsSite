<?php
require 'database.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$pass_word = $_POST['pass_word'];

$_SESSION["pass_word"] =$pass_word;
$_SESSION["username"] =$username;

echo password_hash($pass_word, PASSWORD_BCRYPT);


$stmt = $mysqli->prepare("insert into users (first_name, last_name, username, pass_word) values (?, ?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('sss', $first_name, $last_name, $username, $pass_word);

$stmt->execute();

$stmt->close();

?>