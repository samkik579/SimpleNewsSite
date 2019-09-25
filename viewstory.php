<?php
require 'database.php';
session_start(); 

$stmt = $mysqli->prepare("select title, story, link from stories order by id");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$stmt->bind_result($title, $story, $link);
//$stmt-> bind_result($link);

echo "STORIES";

echo "<br><br>";
while($stmt->fetch()){
    echo $title; 
    echo "<br>";
    echo $story; 
    echo "<br>";
    echo $link;
    echo "<a href ='".$link."'>LINK</a>"; 
    echo "<br><br>";

}
echo "</ul>\n";

$stmt->close();
?>