<!DOCTYPE html>
<html lang="en">

<title> View Story </title>

<?php
//this allows users to view a story
require 'database.php';
session_start(); 

$stmt = $mysqli->prepare("select title, story, username, link from stories order by id");

$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
if(!hash_equals($_SESSION['token'], $_POST['token'])){
	die("Request forgery detected");
}
$mysqli->query(/* perform transfer */);
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$stmt->bind_result($title, $story, $username, $link);

//$stmt-> bind_result($link);

echo "STORIES";

echo "<br><br>";
while($stmt->fetch()){
    echo "This story is by:     ";
    echo $username;
    echo "<br>";
    echo "The title is:        ";
    echo $title; 
    echo "<br><br>";
    echo $story; 
    echo "<br><br>";
    echo "If you would like to learn more please click the following link:";
    echo "<br>";
    //echo $link;
    echo "<a href ='".$link."'>LINK</a>"; 
    echo "<br>";

    echo " <form action ='viewstorywithcomments.php' method = 'POST'>
     <input type ='submit' value = 'Click here to see all comments'/>
      <input type = 'hidden' name = 'title' value = '".$title."'/>
      </form> ";
      
    echo "<br><br>";

}
echo "</ul>\n";

$stmt->close();
?>

</html>