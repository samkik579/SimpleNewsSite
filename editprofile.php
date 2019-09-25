<?php
require 'database.php';
session_start(); 
//allows user to change things in their profile 
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$hometown = $_POST['hometown'];
$summary = $_POST['summary'];
$image = $_POST['image'];

?>

<!DOCTYPE html>
<html lang="en">

<h2>Update Profile </h2>
<form action='fpe.php' method='POST'>

    <tr>
        <td>Profile:</td>
        <td><input type="text" name="updatename" value="<?php echo $name; ?>"></td>
        <td><input type="text" name="updatebirthday" value="<?php echo $birthday; ?>"></td>
        <td><input type="text" name="updatehometown" value="<?php echo $hometown; ?>"></td>
        <td><input type="text" name="updatesummary" value="<?php echo $summary; ?>"></td>
        <td><input type="text" name="updateimage" value="<?php echo $image; ?>"></td>
    </tr>
    <tr>
        <td><INPUT TYPE="Submit" VALUE="Update your profile" NAME="Submit"></td>
    </tr>
    <input type='hidden' name='name' value="<?php echo $name ?>" />
    <input type='hidden' name='birthday' value="<?php echo $birthday ?>" />
    <input type='hidden' name='hometown' value="<?php echo $hometown ?>" />
    <input type='hidden' name='summary' value="<?php echo $summary ?>" />
    <input type='hidden' name='image' value="<?php echo $image ?>" />
    <input type='hidden' name='user_name' value="<?php echo $user_name ?>" />
</form>

</html>