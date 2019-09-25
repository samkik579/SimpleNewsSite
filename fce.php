<?php
//allows used to edit comments;
require 'database.php';
session_start(); 

    $updatecomment = $_POST['updatecomment'];
    $comment = $_POST['comment'];
    
$cde = $mysqli->prepare("UPDATE comments SET comment= ? WHERE comment=?");

$cde->bind_param("ss", $updatecomment, $comment);

$cde->execute();

$cde->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <?php echo "Comment Edited" ?>
    <br><br> <a href="newsite.html" class="btn view"> Return to homepage </a> <br><br>
    <a href="logout.php" class="btn logout">Logout </a>

</body>

</html>