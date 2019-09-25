<?php
session_start();
require 'database.php';

if (!isset($_SESSION['username'])){
    // Username already taken
    echo "sorry! you need to be logged in to post!";
    exit; 
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $hometown = $_POST['hometown'];
    $funfact = $_POST['funfact'];
    $summary = $_POST['summary'];
    $image = $_POST['image'];
}

$stmt = $mysqli->prepare("insert into profile (name, birthday, hometown, funfact, summary, image) values (?, ?, ?, ?, ?, ?) ");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('sssssss', $name, $birthday, $hometown, $funfact, $summary, $image, $_SESSION['username']);



$stmt->execute();

$stmt->close();

header("Location: viewprofile.php");
exit;

?>