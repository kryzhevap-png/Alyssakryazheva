<?php
$servername = "localhost";
$username = "root";
$password_db = "";
$db_name = "voditrf";

$con = new mysqli ($servername, $username, $password_db, $db_name);

if($con->connect_error){
    header("Location:register.php?error=Ошибка в соединении");
    exit;
}
$con->set_charset("utf8");

