<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<!-- allows you to put in a new story-->

<body>
    <form name="input" method="POST" action="addstory.php">
        My Title: <input type="text" name="title" />
        My Story: <input type="text" name="mystory" />
        My Link: <input type="text" name="link" />
        <input type="submit" name="submit" value="Submit">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>" />
    </form>

</body>

</html>