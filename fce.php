<!DOCTYPE html>
<html lang="en">
<title> Finalize comment edit </title>

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


<body>
    <?php echo "Comment Edited" ?>
    <br><br> <a href="newsite.html" class="btn view"> Return to homepage </a> <br><br>
    <a href="logout.php" class="btn logout">Logout </a>

</body>

</html>