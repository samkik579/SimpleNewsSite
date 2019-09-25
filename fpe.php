<!DOCTYPE html>
<html lang="en">
<title> Finalize profile edit </title>


<?php
require 'database.php';
session_start(); 
//this allows users to edit their profile
    $updatename = $_POST['updatename'];
    $updatebirthday = $_POST['updatebirthday'];
    $updatehometown = $_POST['updatehometown'];
    $updatesummary = $_POST['updatesummary'];
    $updateimage = $_POST['updateimage'];

    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $hometown = $_POST['hometown'];
    $summary = $_POST['summary'];
    $image = $_POST['image'];
    $user_name = $_POST['user_name'];

    
$cde = $mysqli->prepare("UPDATE profile SET name=?, birthday =?, hometown =?, summary=?, image=? WHERE user_name=?");

$cde->bind_param("ssssss", $updatename, $updatebirthday, $updatehometown, $updatesummary, $updateimage, $user_name);

$cde->execute();

$cde->close();
?>

<body>
    <?php echo "Comment Edited" ?>
    <br><br> <a href="viewprofile.php" class="btn view"> Return to profile </a> <br><br>
    <a href="logout.php" class="btn logout">Logout </a>

</body>

</html>