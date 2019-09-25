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
    <form name="input" method="POST" action="addprofile.php">
        My Name: <input type="text" name="name" />
        My Birthday: <input type="text" name="birthday" />
        My Hometown: <input type="text" name="hometown" />
        Fun Fact: <input type="text" name="funfact" />
        About Me: <input type="text" name="summary" />
        Link to Picture: <input type="text" name="image" />
        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>