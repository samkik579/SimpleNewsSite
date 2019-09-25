<?php
//this allows users to view their own posted comments
require 'database.php';
session_start(); 

if (!isset($_SESSION['username'])){
    echo "sorry! you need to be logged in to use this function!";
    exit; 
}
$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
if(!hash_equals($_SESSION['token'], $_POST['token'])){
	die("Request forgery detected");
}
$mysqli->query(/* perform transfer */);
    $user = $_SESSION['username'];
    
    $lsm = $mysqli->prepare("select comment, comment_title from comments where user_name = '$user'");
    

    if(!$lsm){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
    $lsm->execute(); 

    $lsm->bind_result($comment, $story_title);
    echo "ALL MY COMMENTS";
    echo "<br><br>";
    while ($lsm->fetch()){
        echo "Story title :     ";
        echo $story_title;
        echo "<br><br>";
        echo "My comment:     ";
        echo $comment; 
        echo "<br><br>";

    
    echo " <form action ='deletecomments.php' method = 'POST'>
    <input type ='submit' value = 'Delete'/>
    <input type = 'hidden' name = 'comment' value = '".$comment."'/>
      </form> ";

       echo " <form action ='editcomment.php' method = 'POST'>
    <input type ='submit' value = 'Edit'/>
    <input type = 'hidden' name = 'comment' value = '".$comment."'/>
      </form> ";
    }


    $lsm->close();
    ?>