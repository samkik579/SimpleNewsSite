<?php
//this allows users to add a sotry to the database
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
    $title = $_POST['title'];
    $my_story = $_POST['mystory'];
    $links = $_POST['link'];
}

$stmt = $mysqli->prepare("insert into stories (title, story, username, link) values (?, ?, ?, ?) ");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('ssss', $title, $my_story, $_SESSION['username'], $links);



$stmt->execute();

$stmt->close();

header("Location: newsite.html");
exit;

?>