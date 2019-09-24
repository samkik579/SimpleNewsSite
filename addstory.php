<?php
session_start();
require 'database.php';

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $my_story = $_POST['mystory'];
}

$stmt = $mysqli->prepare("insert into stories (title, story, username) values (?, ?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('sss', $title, $my_story, $username);



$stmt->execute();

$stmt->close();

header("Location: newsite.html");
exit;

?>