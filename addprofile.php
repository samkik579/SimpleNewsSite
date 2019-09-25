<!DOCTYPE html>
<html lang="en">
<title> Add Profile </title>
<?php
//this code allows users to add a profile to their account
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
    echo "hello";
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $hometown = $_POST['hometown'];
    $summary = $_POST['summary'];
    $image = $_POST['image'];
}

$stmt = $mysqli->prepare("insert into profile (name, birthday, hometown, summary, image, user_name) values (?, ?, ?, ?, ?, ?) ");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('ssssss', $name, $birthday, $hometown, $summary, $image, $_SESSION['username']);



$stmt->execute();

$stmt->close();

header("Location: viewprofile.php");
exit;

?>

</html>