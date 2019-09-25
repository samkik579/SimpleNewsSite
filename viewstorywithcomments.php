<?php
//this allows users to view a story with comments
require 'database.php';
session_start(); 

$title = $_POST['title'];
$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
    
    $abc = $mysqli->prepare("select comment, user_name from comments where comment_title = '$title'");
    

    if(!$abc){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
    $abc->execute(); 

    $abc->bind_result($comment, $username);
    echo "COMMENTS";
    echo "<br>";
    while ($abc->fetch()){
        echo $username;
        echo " said: ";
        echo $comment; 
        echo "<br>";
    }

    $abc->close();
    ?>