<?php
session_start();
require 'database.php';

if (!isset($_SESSION['username'])){
    // Username already taken
    echo "sorry! you need to be logged in to post!";
    exit; 
}

if(isset($_POST['submit'])){
    $commenttitle = $_POST['title'];
    $my_comment = $_POST['mycomment'];
}

$stmt = $mysqli->prepare("insert into comments (title, mycomment, user_name) values (?, ?, ?) ");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('sss', $commenttitle, $my_comment, $_SESSION['username']);


$stmt->execute();

$stmt->close();

header("Location: newsite.html");
exit;

?>