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
    <form name="input" method="POST" action="addcomment.php">
        Input title of story you would like to comment on: <input type="text" name="storytitle" />
        My Comment: <input type="text" name="mycomment" />
        <input type="submit" name="submit" value="Submit">
    </form>

</body>

</html>