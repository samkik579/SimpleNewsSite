<?php
require 'database.php';
session_start(); 
//allows used to edit a sotry they posted
$title = $_POST['title'];
$story = $_POST['story'];
$link = $_POST['link'];

?>

<!DOCTYPE html>
<html lang="en">

<h2>Update Record </h2>
<form action='finalizestoryedits.php' method='POST'>

    <tr>
        <td>Title:</td>
        <td><input type="text" name="updatetitle" value="<?php echo $title; ?>"></td>
    </tr>
    <tr>
        <td>Story:</td>
        <td><input type="text" name="updatestory" value="<?php echo $story; ?>"></td>
    </tr>
    <tr>
        <td>Link:</td>
        <td><input type="text" name="updatelink" value="<?php echo $link; ?>"></td>
    </tr>
    <tr>
        <td><INPUT TYPE="Submit" VALUE="Update the Record" NAME="Submit"></td>
    </tr>
    <input type='hidden' name='title' value="<?php echo $title ?>" />
    <input type='hidden' name='story' value="<?php echo $userstories ?> " />
    <input type='hidden' name='link' value="<?php echo $link ?> " />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
</form>

</html>