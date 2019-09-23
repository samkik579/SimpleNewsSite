<?php
require 'database.php';

$sql = "CREATE TABLE users(
id TINYINT unsigned  not null auto_increment primary key, 
first_name VARCHAR(30) not null, 
last_name VARCHAR(30) not null, 
username VARCHAR(30) not null unique, 
pass_word VARCHAR(30) not null, 
primary key (id))";

?>