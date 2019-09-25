<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<!-- allows you to put in a username and then submit and code takes you to the php
document that checks that the username exists in the user.txt file -->

<body>
    <form name="input" method="POST" action="adduser.php">
        First Name: <input type="text" name="first_name" />
        Last Name: <input type="text" name="last_name" />
        Username: <input type="text" name="username" />
        Password: <input type="text" name="pass_word" />
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
        <input type="submit" name="submit" value="Submit">
    </form>

    <input type="button" name="option" value="WHOOPS! I'm a user!"
        onclick="document.location.href='existinguserlogin.php'" />

</body>

</html>