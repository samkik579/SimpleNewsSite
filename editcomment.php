<?php
require 'database.php';
session_start(); 

$comment = $_POST['comment'];

?>

<!DOCTYPE html>
<html lang="en">

<h2>Update Record </h2>
<form action='finalizecommentedits.php' method='POST'>

    <tr>
        <td>Comment:</td>
        <td><input type="text" name="updatecomment" value="<?php echo $comment; ?>"></td>
    </tr>
    <tr>
        <td><INPUT TYPE="Submit" VALUE="Update the Comment" NAME="Submit"></td>
    </tr>
    <input type='hidden' name='comment' value="<?php echo $comment ?>" />
</form>

</html>