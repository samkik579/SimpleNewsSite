<?php
require 'database.php';
session_start(); 

    $updatecomment = $_POST['updatecomment'];
    $comment = $_POST['comment'];
    
$cde = $mysqli->prepare("UPDATE comments SET comment= ? WHERE comment=?");

$cde->bind_param("ss", $updatecomment, $comment);

$cde->execute();

$cde->close();

echo "Comment Edited";

exit;
?>