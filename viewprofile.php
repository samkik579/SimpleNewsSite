<?php
require 'database.php';
session_start(); 
$user = $_SESSION['username'];

$stmt = $mysqli->prepare("select name, birthday, hometown, summary, image, user_name from profile where user_name = '$user'");

if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}

$stmt->execute();

$stmt->bind_result($name, $birthday, $hometown, $summary, $image, $user_name);

//$stmt-> bind_result($link);

echo "USER PROFILE";

echo "<br><br>";
while ($stmt->fetch()){
        echo $name;
        echo "<br><br>";
        echo $birthday; 
        echo "<br><br>";
        echo $hometown; 
        echo "<br><br>";
        echo $summary; 
        echo "<br><br>";
        echo $image; 
        echo "<br><br>";
}

echo " <form action ='editprofile.php' method = 'POST'>
    <input type ='submit' value = 'Edit'/>
    <input type = 'hidden' name = 'name' value = '".$name."'/>
    <input type = 'hidden' name = 'birthday' value = '".$birthday."'/>
    <input type = 'hidden' name = 'hometown' value = '".$hometown."'/>
    <input type = 'hidden' name = 'summary' value = '".$summary."'/>
    <input type = 'hidden' name = 'image' value = '".$image."'/>
    <input type = 'hidden' name = 'user_name' value = '".$user_name."'/>
</form> ";


echo " <form action ='createuserprofile.php' method = 'POST'>
 <input type ='submit' value = 'Make a profile'/>
</form> ";

$stmt->close();
?>