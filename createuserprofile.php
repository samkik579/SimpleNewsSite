<!DOCTYPE html>
<html lang="en">
<title>Create User Profile</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<!-- allows you to put in a your profile info and then submit and code takes you to the php
document that checks that the profile info has been added -->

<body>
    <form name="input" method="POST" action="addprofile.php">
        My Name: <input type="text" name="name" />
        My Birthday: <input type="text" name="birthday" />
        My Hometown: <input type="text" name="hometown" />
        About Me: <input type="text" name="summary" />
        Link to Picture: <input type="text" name="image" />
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>