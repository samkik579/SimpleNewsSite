<?php
session_start();
require 'database.php';

if (!isset($_SESSION['username'])){
    // Username already taken
    echo "sorry! you need to be logged in to post!";
    exit; 
}

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

header("Location: viewstory.php");
exit;

?>