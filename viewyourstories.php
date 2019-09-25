<!DOCTYPE html>
<html lang="en">

<title> View Your Stories </title>

<?php
//this allows users to view their own posted stories
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
    
    $lsm = $mysqli->prepare("select title, story, link from stories where username = '$user'");
    

    if(!$lsm){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
    $lsm->execute(); 

    $lsm->bind_result($title, $userstories, $link);
    echo "ALL MY STORIES";
    echo "<br><br>";
    while ($lsm->fetch()){
        echo $title;
        echo "<br><br>";
        echo $userstories; 
        echo "<br><br>";
        echo $link; 
        echo "<br><br>";

    
    echo " <form action ='deletestory.php' method = 'POST'>
    <input type ='submit' value = 'Delete'/>
    <input type = 'hidden' name = 'title' value = '".$title."'/>
      </form> ";

     echo " <form action ='editstory.php' method = 'POST'>
    <input type ='submit' value = 'Edit'/>
    <input type = 'hidden' name = 'title' value = '".$title."'/>
    <input type = 'hidden' name = 'story' value = '".$userstories."'/>
      <input type = 'hidden' name = 'link' value = '".$link."'/>
      </form> ";
    }


    $lsm->close();
    ?>

</html>