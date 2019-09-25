<!DOCTYPE html>
<html lang="en">
<title>Delete Comments</title>


<?php
//allows user to delete comments
require 'database.php';
session_start(); 

$comment = $_POST['comment'];

$cde = $mysqli->prepare("DELETE FROM comments WHERE comment='$comment'");

$cde->execute();

$cde->close();

echo "File Deleted";

exit;

?>

</html>