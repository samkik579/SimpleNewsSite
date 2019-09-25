<?php
require 'database.php';
session_start(); 
$user = $_SESSION['username'];

$stmt = $mysqli->prepare("select name, birthday, hometown, funfact, summary, image from profile where user_name = $user");


if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$stmt->bind_result($name, $birthday, $hometown, $funfact, $summary, $image);

//$stmt-> bind_result($link);

echo "USER PROFILE";

echo "<br><br>";
while ($stmt->fetch()){
        echo $name;
        echo "<br><br>";
        echo $birthday; 
        echo "<br><br>";
        echo $hometown; 
        echo "<br><br>";
        echo $funfact; 
        echo "<br><br>";
        echo $summary; 
        echo "<br><br>";
        echo $image; 
        echo "<br><br>";
}

$stmt->close();
?>