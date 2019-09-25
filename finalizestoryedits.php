<?php
require 'database.php';
//this finalizes the edits to a story that a user does
session_start(); 
    $updatetitle = $_POST['updatetitle'];
    $updatestory = $_POST['updatestory'];
    $updatelink = $_POST['updatelink'];
    $title = $_POST['title'];
    $story = $_POST['story'];
    $link = $_POST['link'];
    
$cde = $mysqli->prepare("UPDATE stories SET story= ?, title = ?, link =? WHERE title=?");

$cde->bind_param("ssss", $updatetitle, $updatestory, $title, $link);

$cde->execute();

$cde->close();

echo "File Edited";

exit;
?>