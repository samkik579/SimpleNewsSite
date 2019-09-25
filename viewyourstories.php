<?php
require 'database.php';
session_start(); 

if (!isset($_SESSION['username'])){
    echo "sorry! you need to be logged in to use this function!";
    exit; 
}


    $user = $_SESSION['username'];
    
    $lsm = $mysqli->prepare("select title, story from stories where username = '$user'");
    

    if(!$lsm){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
    $lsm->execute(); 

    $lsm->bind_result($title, $userstories);
    echo "ALL MY STORIES";
    echo "<br><br>";
    while ($lsm->fetch()){
        echo $title;
        echo "<br><br>";
        echo $userstories; 
        echo "<br><br>";

    
    echo " <form action ='deletestory.php' method = 'POST'>
    <input type ='submit' value = 'Delete'/>
    <input type = 'hidden' name = 'title' value = '".$title."'/>
      </form> ";
    }


    $lsm->close();
    ?>