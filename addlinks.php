<?php
session_start();
require 'database.php';

if (!isset($POST['mylink'])){
    // Username already taken
    echo "no link";
    exit; 
}

    $link = $_POST['mylink'];

$stmt = $mysqli->prepare("insert into link (link) values (?) ");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->bind_param('s', $link);



$stmt->execute();

$stmt->close();

header("Location: newssite.php");
exit;

?>