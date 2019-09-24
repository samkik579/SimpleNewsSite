<?php
require 'database.php';
session_start(); 

$stmt = $mysqli->prepare("select title, story from stories order by id");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$stmt->bind_result($title, $story);

echo "TITLE \t STORY";

echo "\n";
while($stmt->fetch()){
    printf("\t<li>%s %s</li>\n",
        htmlspecialchars($title),
        htmlspecialchars($story)
        
	);
}
echo "</ul>\n";

$stmt->close();
?>