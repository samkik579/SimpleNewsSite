<?php
require 'database.php';
session_start(); 

if (!isset($_SESSION['username'])){
    echo "sorry! you need to be logged in to use this function!";
    exit; 
}
    $user = $_SESSION['username'];
    
    $lsm = $mysqli->prepare("select comment, comment_title from comments where user_name = '$user'");
    

    if(!$lsm){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
    $lsm->execute(); 

    $lsm->bind_result($comment, $story_title);
    echo "ALL MY STORIES";
    echo "<br><br>";
    while ($lsm->fetch()){
        echo $story_title;
        echo "<br><br>";
        echo $comment; 
        echo "<br><br>";

    
    echo " <form action ='deletecomments.php' method = 'POST'>
    <input type ='submit' value = 'Delete'/>
    <input type = 'hidden' name = 'title' value = '".$comment."'/>
      </form> ";
    }


    $lsm->close();
    ?>