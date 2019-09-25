<?php
//This code allows users to add comments to the stories as long as they are a user and are logged in

session_start();
require 'database.php';

if (!isset($_SESSION['username'])){
    // Username already taken
    echo "sorry! you need to be logged in to post!";
    exit; 
}
$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
if(!hash_equals($_SESSION['token'], $_POST['token'])){
	die("Request forgery detected");
}
$mysqli->query(/* perform transfer */);

if(isset($_POST['submit'])){
    $my_comment = $_POST['mycomment'];
    $story_title = $_POST['storytitle'];
}

$stmt = $mysqli->prepare("insert into comments (comment, user_name, comment_title) values (?, ?, ?) ");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('sss', $my_comment, $_SESSION['username'], $story_title);


$stmt->execute();

$stmt->close();

header("Location: newsite.html");
exit;

?>